<?php


namespace App\Modules\Accounting\Documents;


interface IPerson
{
    const PERSON_HEAD_OF_ORG = 1; // Руководитель организации
    const PERSON_CHIEF_ACCOUNTANT = 2; // Главный бухгалтер
    const PERSON_SOLE_PROP = 3; // ИП Индивидуальный предприниматель — SP Sole Proprietor/ST Sole Trader
    const PERSON_EMPLOYEE = 4; // Сотрудник организации

    /**
     * IPerson constructor.
     * @param string $name
     * @param string $middleName
     * @param string $surname
     */
    public function __construct($name = '', $middleName = '', $surname = '');

    /**
     * Возвращает имя
     * @return mixed
     */
    public function getName();

    /**
     * Устанавливает имя
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * Возвращает отчество
     * @return mixed
     */
    public function getMiddleName();

    /**
     * Устанавливает отчество
     * @param $middleName
     * @return mixed
     */
    public function setMiddleName($middleName);

    /**
     * Возвращает фамилию
     * @return mixed
     */
    public function getSurname();

    /**
     * Устанавливает фамилию
     * @param $surname
     * @return mixed
     */
    public function setSurname($surname);

    /**
     * Возвращает инициалы
     * @param bool $short
     * @return mixed
     */
    public function getInitials($short = false);

    /**
     * Он руководитель?
     * @return mixed
     */
    public function isHeadOfOrg();

    /**
     * Он главный бухгалтер?
     * @return mixed
     */
    public function isChiefAccountant();

    /**
     * Он индивидуальный предпрениматель?
     * @return mixed
     */
    public function isSoleProp();

    /**
     * Он сотрудник?
     * @return mixed
     */
    public function isEmployee();

    /**
     * Установить статус сотрудника
     * @param $status
     * @return mixed
     */
    public function setStatus($status);


}