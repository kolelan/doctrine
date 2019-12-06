<?php


namespace App\Modules\Accounting\Recognition;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Modules\Accounting\Recognition\src\ScansEntera;


class FileStorage
{
    private $_id;
    private $_userId;
    private $_rawdoc_id;
    private $_file_original_name;
    private $_file_server_name;
    private $_file_type;
    private $_file_state;
    private $_raw_data;
    private $_created_date;
    private $_updated_date;

    public $entityManager;


    public function __construct($userId)
    {
        $isDevMode = true;
        $paths = array("/var/www/vhosts/online.buhsoft.ru/2019/buh_nd/Recognition/src"); // Путь до каталога, где находятся классы сущностей, проецируемые на БД
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        $parameters=[
            'driver'=>'pdo_mysql',
            'user'=>'stepenko',
            'password'=>'7o274iKIs2f7',
            'dbname'=>'pu2019',
            'host'=>'10.5.201.133'
        ];
        $dbParams = array(
            'driver'   => $parameters['driver'],
            'host'   => $parameters['host'],
            'user'     => $parameters['user'],
            'password' => $parameters['password'],
            'dbname'   => $parameters['dbname'],
        );

        $this->_userId = $userId;
        $this->entityManager = EntityManager::create($dbParams, $config);

    }
    private function _getDocumentData($userId,$rawdoc_id)
    {


    }
    public function getManager()
    {
        return $this->entityManager;
    }
}