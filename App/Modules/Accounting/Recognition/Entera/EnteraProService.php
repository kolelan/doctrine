<?php


namespace App\Modules\Accounting\Recognition\Entera;

use App\Modules\Accounting\Recognition\IRecognize;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;


/**
 * EnteraProService
 *
 * Service class to communicate with entera.pro API
 *
 * Usage example:
 * try {
 *     $api = new EnteraProService("ivanov@mail.com", "P@ssw0rd");
 *     $recognitionTaskId = $api->createRecognitionTask($filepath, $api->getDefaultSpaceId());
 *     ...
 *     if ('RECOGNIZED' === $api->getRecognitionTaskState($recognitionTaskId)) {
 *        $docIds = $api->getRecognitionTaskDocumentIds($recognitionTaskId);
 *        foreach($docIds as $docId) {
 *            $document = $api->getDocument($docId);
 *            ...
 *        }
 *     }
 * }
 * catch(\Exception $e) {
 *     ...
 * }
 *
 * @version 0.1
 * @depends php 5.6 or higher
 * @author Serg N. Kalachev <serg@kalachev.ru>
 * @redactor Grigory S. Stepenko <kolelan@yandex.ru> - adapted to php 5.6
 * @link https://app.entera.pro/api/specification API docs
 * @license https://tldrlegal.com/license/mit-license MIT
 */
class EnteraProService extends Client implements IRecognize
{
    /** Constants */
    const BASE_URI = 'https://app.entera.pro/api/v1/';
    const AUTH_URI = 'https://id.entera.pro/api/v1/login';
    const MIN_BALANCE = 10;
    /** @var string default space id */
    private $defaultSpaceId = null;
    /**
     * Constructor
     * @param string $login
     * @param string $password
     * @param integer $minBalance check for minimum balance before continue
     */
    public function __construct($login, $password, $minBalance = self::MIN_BALANCE)
    {
        parent::__construct([
            'cookies'  => true,
            'base_uri' => self::BASE_URI,
            'timeout'  => 2.0,
        ]);
        // get coookie ENTERA_JWT and put it in jar
        $this->checkResponse($this->post(self::AUTH_URI, [
            'json' => [
                "login"    => $login,
                "password" => $password
            ]
        ]));
        // get user info and set default spaceId
        $answer = $this->checkResponse($this->get('currentUser'));
        if(isset($answer['user']['spaces'][0]['id']))
            $this->defaultSpaceId = $answer['user']['spaces'][0]['id'];
        else
            $this->defaultSpaceId = null;

        if(isset($answer['user']['spaces'][0]['balance']))
            $balance = $answer['user']['spaces'][0]['balance'];
        else
            $balance = 0;

        if ($balance < $minBalance) {
            throw new \LogicException("Not enough balance (< $minBalance) to continue");
        }
    }
    /**
     * Check response for validity
     * @param  \Psr\Http\Message\ResponseInterface $response
     * @throws \LogicException if smth wrong
     * @return array json response
     */
    public function checkResponse(ResponseInterface $response) {
        if ($response->getStatusCode() != 200) {
            throw new \LogicException('Wrong response status code, must be 200');
        }
        $answer = json_decode((string)$response->getBody(), true);
        if (!$answer) {
            throw new \LogicException('Can not decode response body, must be json string');
        }
        if(isset($answer['result']))
            $flag = $answer['result'];
        else
            $flag = false;
        if (!$flag) {
            throw new \LogicException('Wrong response body result attribute, must be true');
        }
        return $answer;
    }
    /**
     * Создаёт новую задачу на распознавание Create new recognition task
     * @param  string $filepath existing file to upload and recognize on server
     * @param  string $spaceId  optional, by default used first space in user profile
     * @throws \LogicException  if smth wrong
     * @return string           guid of task
     */
    public function createRecognitionTask($filepath, $spaceId = null)
    {
        if (!file_exists($filepath) || !is_readable($filepath)) {
            throw new \LogicException("Can't open file '$filepath'");
        }
        if (!$spaceId) $spaceId = $this->defaultSpaceId;
        if (!$spaceId) {
            throw new \LogicException("You must specify spaceId");
        }
        $answer = $this->checkResponse($this->post('recognitionTasks', [
            'query' => ['spaceId' => $spaceId ?: $this->defaultSpaceId],
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($filepath, 'r')
                ],
            ]
        ]));
        if(isset($answer['recognitionTask']['id']))
            return $answer['recognitionTask']['id'];
        else
            return null;
    }
    /**
     * Получает задание распознавания по guid с сервера
     * Get recognition task itself by guid from server
     * @param  string $recognitionTaskId guid of task
     * @throws \LogicException           if smth wrong
     * @return array                     task
     */
    public function getRecognitionTask($recognitionTaskId)
    {
        return $this->checkResponse($this->get("recognitionTasks/$recognitionTaskId"));
    }
    /**
     * Get recognition task state by guid from server
     * @param  string $recognitionTaskId guid of task
     * @throws \LogicException           if smth wrong
     * @return string                    state
     */
    public function getRecognitionTaskState($recognitionTaskId)
    {
        $answer = $this->getRecognitionTask($recognitionTaskId);
        if(isset($answer['recognitionTask']['state']))
            return $answer['recognitionTask']['state'];
        else
            return 'ERROR';
    }
    /**
     * Get recognition task itself by guid from server
     * @param  string $recognitionTaskId guid of task
     * @throws \LogicException           if smth wrong
     * @return array                     task
     */
    public function getRecognitionTaskDocuments($recognitionTaskId)
    {
        $answer = $this->getRecognitionTask($recognitionTaskId);
        if(isset($answer['recognitionTask']['state']))
            $state = $answer['recognitionTask']['state'];
        else
            $state = 'ERROR';
        if ($state!= 'RECOGNIZED') return [];
        if (isset($answer['recognitionTask']['documents']))
            return $answer['recognitionTask']['documents'];
        else
            return [];
    }
    /**
     * Get recognition task recognized documents ids
     * @param  string $recognitionTaskId guid of task
     * @throws \LogicException           if smth wrong
     * @return array                     list of document ids
     */
    public function getRecognitionTaskDocumentIds($recognitionTaskId)
    {
        $answer = $this->getRecognitionTask($recognitionTaskId);
        if(isset($answer['recognitionTask']['state']))
            $state=$answer['recognitionTask']['state'];
        else
            $state= 'ERROR';
        if ($state != 'RECOGNIZED')
            return [];

        if(isset($answer['recognitionTask']['documents']))
            $documents = $answer['recognitionTask']['documents'];
        else
            $documents = [];

        return
            array_filter(
                array_map(
                    function($data) {
                        if(isset($data['id']))
                            return $data['id'];
                        else
                            return null; },
                    $documents
                )
            );
    }
    /**
     * Get recognized document by guid
     * @param  string $documentId guid of document
     * @throws \LogicException    if smth wrong
     * @return array              document
     */
    public function getDocument($documentId)
    {
        return $this->checkResponse($this->get("documents/$documentId"));
    }
    /**
     * Get default space Id
     * @return string
     */
    public function getDefaultSpaceId()
    {
        return $this->defaultSpaceId;
    }

    public function getRecognizer()
    {
        return $this;
    }

    public function getResult()
    {

    }
}