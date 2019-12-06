<?php
namespace App\Modules\Accounting\Recognition\src;

use Doctrine\ORM\Mapping as ORM;

/**
 * Необходимо определить репозиторий, без него ORM не будет работать.
 * ORM\Entity(repositoryClass="App\Modules\Accounting\Recognition\src\ScansEnteraRepository")
 * @ORM\Table(names="pu2019.tr_scans_entera")
 **/

class ScansEntera
{
    /**
     * Идентификатор
     * @ORM\id
     * @ORM\Column(name="id" type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * Идентификатор пользователя
     * @ORM\Column(type="integer" name="userId")
     */
    protected $userId;

    /**
     * Идентификатор для связи с сохранённым документом в таблице tr_scans_import
     * Нужен для реализации интеграции с ExtJs возможно от него можно будет отказаться
     * @ORM\Column(type="integer" name="rawdoc_id")
     */
    protected $rawdoc_id;

    /**
     * @ORM\Column(type="string" length=50)
     */
    protected $document_guid;

    /**
     * @ORM\Column(type="text")
     */
    protected $file_original_name;

    /**
     * @ORM\Column(type="text")
     */
    protected $file_server_name;

    /**
     * @ORM\Column(type="string" length=50)
     */
    protected $file_type;

    /**
     * @ORM\Column(type="string" length=50)
     */
    protected $file_state;

    /**
     * @ORM\Column(type="text")
     */
    protected $raw_data;

    /**
     * @ORM\Column(type="datetime") *
     */
    protected $created_date;

    /**@ORM\Column(type="datetime") **/
    protected $updated_date;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

//    /**
//     * @param mixed $id
//     */
//    public function setId($id)
//    {
//        $this->id = $id;
//    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = (int)$userId;
    }

    /**
     * @return mixed
     */
    public function getRawdocId()
    {
        return $this->rawdoc_id;
    }

    /**
     * @param mixed $rawdoc_id
     */
    public function setRawdocId($rawdoc_id)
    {
        $this->rawdoc_id = $rawdoc_id;
    }

    /**
     * @return mixed
     */
    public function getDocumentGuid()
    {
        return $this->document_guid;
    }

    /**
     * @param mixed $document_guid
     */
    public function setDocumentGuid($document_guid)
    {
        $this->document_guid = $document_guid;
    }

    /**
     * @return mixed
     */
    public function getFileOriginalName()
    {
        return $this->file_original_name;
    }

    /**
     * @param mixed $file_original_name
     */
    public function setFileOriginalName($file_original_name)
    {
        $this->file_original_name = $file_original_name;
    }

    /**
     * @return mixed
     */
    public function getFileServerName()
    {
        return $this->file_server_name;
    }

    /**
     * @param mixed $file_server_name
     */
    public function setFileServerName($file_server_name)
    {
        $this->file_server_name = $file_server_name;
    }

    /**
     * @return mixed
     */
    public function getFileType()
    {
        return $this->file_type;
    }

    /**
     * @param mixed $file_type
     */
    public function setFileType($file_type)
    {
        $this->file_type = $file_type;
    }

    /**
     * @return mixed
     */
    public function getFileState()
    {
        return $this->file_state;
    }

    /**
     * @param mixed $file_state
     */
    public function setFileState($file_state)
    {
        $this->file_state = $file_state;
    }

    /**
     * @return mixed
     */
    public function getRawData()
    {
        return $this->raw_data;
    }

    /**
     * @param mixed $raw_data
     */
    public function setRawData($raw_data)
    {
        $this->raw_data = $raw_data;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * @param mixed $created_date
     */
    public function setCreatedDate($created_date)
    {
        $this->created_date = $created_date;
    }

    /**
     * @return mixed
     */
    public function getUpdatedDate()
    {
        return $this->updated_date;
    }

    /**
     * @param mixed $updated_date
     */
    public function setUpdatedDate($updated_date)
    {
        $this->updated_date = $updated_date;
    }

}