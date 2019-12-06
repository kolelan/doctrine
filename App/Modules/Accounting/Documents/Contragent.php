<?php


namespace App\Modules\Accounting\Documents;

use App\Modules\Accounting\Documents\Persons;

/**
 * Class Contragent ��������� �������������� ��������� ������, ��� �������� ��� ����������
 * @package App\Modules\Accounting\Documents
 */
class Contragent implements IContragent
{
    private $fullName = null;
    private $shortName = null;
    private $tin = null;
    private $iec = null;
    private $bic = null;
    private $checkAccount = null;
    private $corrAccount = null;
    private $bankName = null;
    private $address = null;
    private $persons = null;

    /**
     * IContragent constructor.
     * � ����������� ��� ������� �������� ������ ����.
     * @param $name
     * @param bool $shortName
     */
    public function __construct($name, $shortName = false)
    {
        if ($shortName)
            $this->shortName = $name;
        else
            $this->fullName = $name;
    }

    /**
     * ��� (����������������� ����� �����������������) � ITN (Individual Taxpayer Number) � ��� ���������� ��� �
     * TIN (Taxpayer Identification Number � ��� ����������� ���;
     * @return mixed
     */
    public function getTIN()
    {
        return $this->tin;
    }

    /**
     * @param $tin - ���
     * @return mixed
     */
    public function setTIN($tin)
    {
        $this->tin = $tin;
        return $this;
    }

    /**
     * IEC Industrial Enterprises Classifier (��� - ������������� ������������ �����������)
     * @return mixed
     */
    public function getIEC()
    {
        return $this->iec;
    }

    /**
     * IEC Industrial Enterprises Classifier (���)
     * @param $iec - ���
     * @return mixed
     */
    public function setIEC($iec)
    {
        $this->iec = $iec;
        return $this;
    }

    /**
     * ��� (���������� ����������������� ���) � BIC (Bank Identification Code)
     * @return mixed
     */
    public function getBIC()
    {
        return $this->bic;
    }

    /**
     * ��� (���������� ����������������� ���) � BIC (Bank Identification Code)
     * @param $bic
     * @return mixed
     */
    public function setBIC($bic)
    {
        $this->big = $bic;
        return $this;
    }

    /**
     * ��������� ���� (��� �/�, � �������� ��������� �����) � Current account (��������)/Checking account (���)
     * @return mixed
     */
    public function getCheckAccount()
    {
        return $this->checkAccount;
    }

    /**
     * ��������� ���� (��� �/�, � �������� ��������� �����) � Current account (��������)/Checking account (���)
     * @param $checkAccount
     * @return mixed
     */
    public function setCheckAccount($checkAccount)
    {
        $this->checkAccount = $checkAccount;
        return $this;
    }

    /**
     * ����������������� ���� � Corresponding account
     * @return mixed
     */
    public function getCorrAccount()
    {
        return $this->corrAccount;
    }

    /**
     * ����������������� ���� � Corresponding account
     * @param $corrAccount
     * @return mixed
     */
    public function setCorrAccount($corrAccount)
    {
        $this->corrAccount = $corrAccount;
        return $this;
    }

    /**
     * ���� ��������|����������
     * @return mixed
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * ���� ��������|����������
     * @param $bankName
     * @return mixed
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
        return $this;
    }

    /**
     * ���������� ������ �������� �����������
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * ������������� ������ �������� �����������
     * @param $name
     * @return mixed
     */
    public function setFullName($name)
    {
        $this->fullName = $name;
        return $this;
    }

    /**
     * ���������� �������� �������� �����������
     * @return mixed
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * ������������� �������� �������� �����������
     * @param $name
     * @return mixed
     */
    public function setShortName($name)
    {
        $this->shortName = $name;
        return $this;
    }

    /**
     * ���������� ����� �����������
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * ������������� ����� �����������
     * @param $address
     * @return mixed
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * ���������� ���������� � ����������� ��������, ���/���, �����
     * @return mixed
     */
    public function getInfo()
    {
        $out = '';
        if ($this->fullName != null)
            $out .= $this->fullName;
        else
            $out .= $this->shortName;

        if ($this->tin != null) ;
        $out .= ' ���:' . $this->tin;

        if ($this->iec != null) ;
        $out .= ' ���:' . $this->iec;

        if ($this->address != null)
            $out .= ' ' . $this->address;

        return $out;

    }

    /**
     * ���������� �����������
     * @return mixed
     */
    public function getPersons()
    {
        return $this->persons;
    }
    /**
     * ������������� �����������;
     * @param Persons $persons
     * @return mixed
     */
    public function setPersons(Persons $persons)
    {
        $this->persons = $persons;
        return $this;
    }
}