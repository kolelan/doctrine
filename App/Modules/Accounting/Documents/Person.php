<?php


namespace App\Modules\Accounting\Documents;

use  App\Modules\Accounting\Documents\IPerson;

class Person implements IPerson
{
    private $name;
    private $middleName;
    private $surname;
    private $status;

    /**
     * IPerson constructor.
     * @param string $name
     * @param string $middleName
     * @param string $surname
     */
    public function __construct($name = '', $middleName = '', $surname = '',$status=4)
    {
        $this->name = $name;
        $this->middleName = $middleName;
        $this->surname = $surname;
        $this->status = (int)$status;
    }

    /**
     * ���������� ���
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * ������������� ���
     * @param $name
     * @return mixed
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * ���������� ��������
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * ������������� ��������
     * @param $middleName
     * @return mixed
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
        return $this;
    }

    /**
     * ���������� �������
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * ������������� �������
     * @param $surname
     * @return mixed
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * ���������� ��������
     * @param bool $short
     * @return mixed
     */
    public function getInitials($short = false)
    {
        if($short){
            return $this->surname.' '.substr($this->name,0,1).'. '.substr($this->middleName,0,1).'.';
        }else{
            return $this->surname.' '.$this->name.' '.$this->middleName;
        }

    }

    /**
     * �� ������������?
     * @return mixed
     */
    public function isHeadOfOrg()
    {
        if($this->status === self::PERSON_HEAD_OF_ORG)
            return true;
        else
            return false;
    }

    /**
     * �� ������� ���������?
     * @return mixed
     */
    public function isChiefAccountant()
    {
        if($this->status === self::PERSON_CHIEF_ACCOUNTANT)
            return true;
        else
            return false;
    }

    /**
     * �� �������������� ���������������?
     * @return mixed
     */
    public function isSoleProp()
    {
        if($this->status === self::PERSON_SOLE_PROP)
            return true;
        else
            return false;
    }

    /**
     * �� ���������?
     * @return mixed
     */
    public function isEmployee()
    {
        if($this->status === self::PERSON_EMPLOYEE)
            return true;
        else
            return false;
    }

    /**
     * ����������
     * @param bool $short
     * @return mixed
     */
    public function getSignature($short = false)
    {
        // TODO: Implement getSignature() method.
    }

    /**
     * ���������� ������ ����������
     * @param int $status
     * @return mixed
     */
    public function setStatus($status)
    {
        switch ((int) $status){
            case self::PERSON_HEAD_OF_ORG:
                $this->status = self::PERSON_HEAD_OF_ORG;
                break;
            case self::PERSON_CHIEF_ACCOUNTANT:
                $this->status = self::PERSON_CHIEF_ACCOUNTANT;
                break;
            case self::PERSON_SOLE_PROP:
                $this->status = self::PERSON_SOLE_PROP;
                break;
            default:
                $this->status = self::PERSON_EMPLOYEE;
                break;
        }
    }
}