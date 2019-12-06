<?php


namespace App\Modules\Accounting\Documents;

use App\Modules\Accounting\Documents\Persons;

/**
 * Interface IContragent
 * @package App\Modules\Accounting\Documents
 */
interface IContragent
{

    /**
     * IContragent constructor.
     * � ����������� ��� ������� �������� ������ ����.
     * @param $name
     */
    public function __construct($name);

    /**
     * ��� (����������������� ����� �����������������) � ITN (Individual Taxpayer Number) � ��� ���������� ��� �
     * TIN (Taxpayer Identification Number � ��� ����������� ���;
     * @return mixed
     */
    public function getTIN();

    /**
     * @param $tin - ���
     * @return mixed
     */
    public function setTIN($tin);

    /**
     * IEC Industrial Enterprises Classifier (��� - ������������� ������������ �����������)
     * @return mixed
     */
    public function getIEC();

    /**
     * IEC Industrial Enterprises Classifier (���)
     * @param $iec - ���
     * @return mixed
     */
    public function setIEC($iec);

    /**
     * ��� (���������� ����������������� ���) � BIC (Bank Identification Code)
     * @return mixed
     */
    public function getBIC();

    /**
     * ��� (���������� ����������������� ���) � BIC (Bank Identification Code)
     * @param $bic
     * @return mixed
     */
    public function setBIC($bic);

    /**
     * ��������� ���� (��� �/�, � �������� ��������� �����) � Current account (��������)/Checking account (���)
     * @return mixed
     */
    public function getCheckAccount();

    /**
     * ��������� ���� (��� �/�, � �������� ��������� �����) � Current account (��������)/Checking account (���)
     * @param $checkAccount
     * @return mixed
     */
    public function setCheckAccount($checkAccount);

    /**
     * ����������������� ���� � Corresponding account
     * @return mixed
     */
    public function getCorrAccount();

    /**
     * ����������������� ���� � Corresponding account
     * @param $corrAccount
     * @return mixed
     */
    public function setCorrAccount($corrAccount);

    /**
     * ���� ��������|����������
     * @return mixed
     */
    public function getBankName();

    /**
     * ���� ��������|����������
     * @param $bankName
     * @return mixed
     */
    public function setBankName($bankName);

    /**
     * ���������� ������ �������� �����������
     * @return mixed
     */
    public function getFullName();

    /**
     * ������������� ������ �������� �����������
     * @param $name
     * @return mixed
     */
    public function setFullName($name);

    /**
     * ���������� �������� �������� �����������
     * @return mixed
     */
    public function getShortName();

    /**
     * ������������� �������� �������� �����������
     * @param $name
     * @return mixed
     */
    public function setShortName($name);

    /**
     * ���������� ����� �����������
     * @return mixed
     */
    public function getAddress();

    /**
     * ������������� ����� �����������
     * @param $address
     * @return mixed
     */
    public function setAddress($address);

    /**
     * ���������� ���������� � ����������� ��������, ���/���, �����
     * @return mixed
     */
    public function getInfo();

    /**
     * ���������� �����������
     * @return mixed
     */
    public function  getPersons();

    /**
     * ������������� �����������;
     * @param Persons $persons
     * @return mixed
     */
    public function setPersons(Persons $persons);
}