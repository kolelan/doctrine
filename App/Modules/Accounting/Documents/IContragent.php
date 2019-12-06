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
     * У контрагента как минимум название должно быть.
     * @param $name
     */
    public function __construct($name);

    /**
     * ИНН (Идентификационный Номер Налогоплательщика) — ITN (Individual Taxpayer Number) — для физических лиц и
     * TIN (Taxpayer Identification Number — для юридических лиц;
     * @return mixed
     */
    public function getTIN();

    /**
     * @param $tin - ИНН
     * @return mixed
     */
    public function setTIN($tin);

    /**
     * IEC Industrial Enterprises Classifier (КПП - Классификатор Промышленных Предприятий)
     * @return mixed
     */
    public function getIEC();

    /**
     * IEC Industrial Enterprises Classifier (КПП)
     * @param $iec - КПП
     * @return mixed
     */
    public function setIEC($iec);

    /**
     * БИК (Банковский Идентификационный Код) — BIC (Bank Identification Code)
     * @return mixed
     */
    public function getBIC();

    /**
     * БИК (Банковский Идентификационный Код) — BIC (Bank Identification Code)
     * @param $bic
     * @return mixed
     */
    public function setBIC($bic);

    /**
     * Расчётный счет (или р/с, в значении «текущего счета») — Current account (Британия)/Checking account (США)
     * @return mixed
     */
    public function getCheckAccount();

    /**
     * Расчётный счет (или р/с, в значении «текущего счета») — Current account (Британия)/Checking account (США)
     * @param $checkAccount
     * @return mixed
     */
    public function setCheckAccount($checkAccount);

    /**
     * Корреспондирующий счёт — Corresponding account
     * @return mixed
     */
    public function getCorrAccount();

    /**
     * Корреспондирующий счёт — Corresponding account
     * @param $corrAccount
     * @return mixed
     */
    public function setCorrAccount($corrAccount);

    /**
     * Банк продавца|покупателя
     * @return mixed
     */
    public function getBankName();

    /**
     * Банк продавца|покупателя
     * @param $bankName
     * @return mixed
     */
    public function setBankName($bankName);

    /**
     * Возвращает полное название контрагента
     * @return mixed
     */
    public function getFullName();

    /**
     * Устанавливает полное название контрагента
     * @param $name
     * @return mixed
     */
    public function setFullName($name);

    /**
     * Возвращает короткое название контрагента
     * @return mixed
     */
    public function getShortName();

    /**
     * Устанавливает короткое название контрагента
     * @param $name
     * @return mixed
     */
    public function setShortName($name);

    /**
     * Возвращает адрес контрагента
     * @return mixed
     */
    public function getAddress();

    /**
     * Устанавливает адрес контрагента
     * @param $address
     * @return mixed
     */
    public function setAddress($address);

    /**
     * Возвращает информацию о контрагенте Название, инн/кпп, адрес
     * @return mixed
     */
    public function getInfo();

    /**
     * Возвращает сотрудников
     * @return mixed
     */
    public function  getPersons();

    /**
     * Устанавливает сотрудников;
     * @param Persons $persons
     * @return mixed
     */
    public function setPersons(Persons $persons);
}