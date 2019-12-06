<?php


namespace App\Modules\Accounting\Documents;


interface IPerson
{
    const PERSON_HEAD_OF_ORG = 1; // ������������ �����������
    const PERSON_CHIEF_ACCOUNTANT = 2; // ������� ���������
    const PERSON_SOLE_PROP = 3; // �� �������������� ��������������� � SP Sole Proprietor/ST Sole Trader
    const PERSON_EMPLOYEE = 4; // ��������� �����������

    /**
     * IPerson constructor.
     * @param string $name
     * @param string $middleName
     * @param string $surname
     */
    public function __construct($name = '', $middleName = '', $surname = '');

    /**
     * ���������� ���
     * @return mixed
     */
    public function getName();

    /**
     * ������������� ���
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * ���������� ��������
     * @return mixed
     */
    public function getMiddleName();

    /**
     * ������������� ��������
     * @param $middleName
     * @return mixed
     */
    public function setMiddleName($middleName);

    /**
     * ���������� �������
     * @return mixed
     */
    public function getSurname();

    /**
     * ������������� �������
     * @param $surname
     * @return mixed
     */
    public function setSurname($surname);

    /**
     * ���������� ��������
     * @param bool $short
     * @return mixed
     */
    public function getInitials($short = false);

    /**
     * �� ������������?
     * @return mixed
     */
    public function isHeadOfOrg();

    /**
     * �� ������� ���������?
     * @return mixed
     */
    public function isChiefAccountant();

    /**
     * �� �������������� ���������������?
     * @return mixed
     */
    public function isSoleProp();

    /**
     * �� ���������?
     * @return mixed
     */
    public function isEmployee();

    /**
     * ���������� ������ ����������
     * @param $status
     * @return mixed
     */
    public function setStatus($status);


}