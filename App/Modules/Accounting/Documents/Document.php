<?php


namespace App\Modules\Accounting\Documents;


use App\Modules\Accounting\Common\Date;
use App\Modules\Accounting\Common\IdBehavior;
use App\Modules\Accounting\Documents\Contragent;
use App\Modules\Accounting\Documents\Items;

class Document implements IDocument
{
    use IdBehavior;
    private $name = null;
    private $number = null;
    private $date = null;
    private $type = null;
    private $vendor = null; // продавец
    private $customer = null; // покупатель

    private $state;
    private $warning;
    private $error;
    private $items;


    /**
     * Документ должен быть определённого типа
     * IDocument constructor.
     * @param $type
     */
    public function __construct($type)
    {
    }

    /**
     * Возвращает продавца
     * @return mixed
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Устанавливает продавца
     * @param Contragent $vendor
     * @return mixed
     */
    public function setVendor(Contragent $vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }

    /**
     * Возвращает покупателя
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Устанавливает покупателя
     * @param Contragent $customer
     * @return mixed
     */
    public function setCustomer(Contragent $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Возвращает тип документа
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Устанавливает тип документа
     * @param $type
     * @return mixed
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Возвращает название документа
     * @return mixed
     */
    public function getName($withName = true, $withNumber = true, $withDate = true)
    {
        $out = '';
        if ($withName and $this->name != null) {
            $out .= $this->name;
        }
        if ($withName and $this->number != null) {
            $out .= ' №' . $this->number;
        }
        /**
         * @var $this->date Date
         */
        if ($withDate and $this->date instanceof Date) {
            $out.= ' от '.$this->date->getLocalDate();
        }
        return $out;

    }

    /**
     * Устанавливает название документа
     * @param $name
     * @return mixed
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Вовзращает номер документа
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Устанавливает номер документа
     * @param $number
     * @return mixed
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Возвращает дату документа
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Устанавливает дату документа
     * @param Date $createdDate
     * @return mixed
     */
    public function setDate(Date $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Вовращает элементы документа (товарные позиции)
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Устанавливает товарные позиции документа
     * @param Items $items
     * @return mixed
     */
    public function setItems(Items $items)
    {
        $this->items = $items;
        return $this;
    }
}