<?php


namespace App\Modules\Accounting\Documents;

use App\Modules\Accounting\Documents\Persons;

/**
 * Class Contragent описывает универсального участника сделки, это продавец или покупатель
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
     * У контрагента как минимум название должно быть.
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
     * ИНН (Идентификационный Номер Налогоплательщика) — ITN (Individual Taxpayer Number) — для физических лиц и
     * TIN (Taxpayer Identification Number — для юридических лиц;
     * @return mixed
     */
    public function getTIN()
    {
        return $this->tin;
    }

    /**
     * @param $tin - ИНН
     * @return mixed
     */
    public function setTIN($tin)
    {
        $this->tin = $tin;
        return $this;
    }

    /**
     * IEC Industrial Enterprises Classifier (КПП - Классификатор Промышленных Предприятий)
     * @return mixed
     */
    public function getIEC()
    {
        return $this->iec;
    }

    /**
     * IEC Industrial Enterprises Classifier (КПП)
     * @param $iec - КПП
     * @return mixed
     */
    public function setIEC($iec)
    {
        $this->iec = $iec;
        return $this;
    }

    /**
     * БИК (Банковский Идентификационный Код) — BIC (Bank Identification Code)
     * @return mixed
     */
    public function getBIC()
    {
        return $this->bic;
    }

    /**
     * БИК (Банковский Идентификационный Код) — BIC (Bank Identification Code)
     * @param $bic
     * @return mixed
     */
    public function setBIC($bic)
    {
        $this->big = $bic;
        return $this;
    }

    /**
     * Расчётный счет (или р/с, в значении «текущего счета») — Current account (Британия)/Checking account (США)
     * @return mixed
     */
    public function getCheckAccount()
    {
        return $this->checkAccount;
    }

    /**
     * Расчётный счет (или р/с, в значении «текущего счета») — Current account (Британия)/Checking account (США)
     * @param $checkAccount
     * @return mixed
     */
    public function setCheckAccount($checkAccount)
    {
        $this->checkAccount = $checkAccount;
        return $this;
    }

    /**
     * Корреспондирующий счёт — Corresponding account
     * @return mixed
     */
    public function getCorrAccount()
    {
        return $this->corrAccount;
    }

    /**
     * Корреспондирующий счёт — Corresponding account
     * @param $corrAccount
     * @return mixed
     */
    public function setCorrAccount($corrAccount)
    {
        $this->corrAccount = $corrAccount;
        return $this;
    }

    /**
     * Банк продавца|покупателя
     * @return mixed
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * Банк продавца|покупателя
     * @param $bankName
     * @return mixed
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
        return $this;
    }

    /**
     * Возвращает полное название контрагента
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Устанавливает полное название контрагента
     * @param $name
     * @return mixed
     */
    public function setFullName($name)
    {
        $this->fullName = $name;
        return $this;
    }

    /**
     * Возвращает короткое название контрагента
     * @return mixed
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Устанавливает короткое название контрагента
     * @param $name
     * @return mixed
     */
    public function setShortName($name)
    {
        $this->shortName = $name;
        return $this;
    }

    /**
     * Возвращает адрес контрагента
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Устанавливает адрес контрагента
     * @param $address
     * @return mixed
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Возвращает информацию о контрагенте Название, инн/кпп, адрес
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
        $out .= ' ИНН:' . $this->tin;

        if ($this->iec != null) ;
        $out .= ' КПП:' . $this->iec;

        if ($this->address != null)
            $out .= ' ' . $this->address;

        return $out;

    }

    /**
     * Возвращает сотрудников
     * @return mixed
     */
    public function getPersons()
    {
        return $this->persons;
    }
    /**
     * Устанавливает сотрудников;
     * @param Persons $persons
     * @return mixed
     */
    public function setPersons(Persons $persons)
    {
        $this->persons = $persons;
        return $this;
    }
}