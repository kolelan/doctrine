<?php


namespace App\Modules\Accounting\Documents;

use Money\Money;
use App\Modules\Accounting\Documents\Measure;
use App\Modules\Accounting\Documents\Country;
use App\Modules\Accounting\Common\IdBehavior;

class Item implements IItem
{
    use IdBehavior;
    private $code = null;
    private $name = null;
    private $quantity = null;
    private $measure = null;
    private $vat = null;
    private $price = null;
    private $ccdNumber = null;
    private $country = null;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Устанавливает Название товарной позиции
     * @param $name
     * @return mixed
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Возвращает Название товарной позиции
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Устанавливает количество единиц товарной позиции
     * @param $quantity
     * @return mixed
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Возвращает количество
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Устанавливает единицу измерения
     * @param Measure $measure
     * @return mixed
     */
    public function setMeasure(Measure $measure)
    {
        $this->measure = $measure;
        return $this;
    }

    /**
     * Возвращает единицу измерения
     * @return mixed
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * Устанавливает НДС (Value-added tax)
     * @param $vat
     * @return mixed
     */
    public function setVAT($vat)
    {
        if (is_numeric($vat))
            if ($vat > 0 and $vat < 100) {
                $this->vat = $vat;
            }

        return $this;
    }

    /**
     * Возвращает НДС (Value-added tax)
     * @return mixed
     */
    public function getVAT()
    {
        return $this->vat;
    }

    /**
     * Устанавливает цену с НДС
     * @param Money $price
     * @return mixed
     */
    public function setPriceWithVAT(Money $price)
    {
        if (null !== $this->vat)
            $this->price = $price->divide(1 + $this->vat / 100);
        else
            $this->setPriceWithoutVAT($price)->setVAT(0);
        return $this;
    }

    /**
     * Возвращает цену с НДС
     * @return mixed
     */
    public function getPriceWithVAT()
    {
        if ($this->price instanceof Money and null !== $this->vat)
            return $this->price->multiply(1 + $this->vat / 100);
        elseif ($this->price instanceof Money)
            return $this->price;
        else
            return null;
    }

    /**
     * Устанавливает цену без НДС
     * @param $price
     * @return mixed
     */
    public function setPriceWithoutVAT(Money $price)
    {
        $this->price = $price;
        return $this;

    }

    /**
     * Возвращает цену без НДС
     * @return mixed
     */
    public function getPriceWithoutVAT()
    {
        if ($this->price instanceof Money)
            return $this->price;
        else
            return null;
    }

    /**
     * Устанавливает итоговую сумму
     * @param $price
     * @return mixed
     */
    public function setSum(Money $price)
    {
        if ($this->quantity > 0) {
            $this->setPriceWithVAT($price->divide($this->quantity));
        } else {
            $this->setQuantity(1)->setPriceWithVAT($price);
        }
        return $this;
    }

    /**
     * Возвращает итоговую сумму
     * @return mixed
     */
    public function getSum()
    {
        if ($this->price instanceof Money and $this->quantity)
            return $this->price->mulptiple($this->quantity);
        else
            return null;
    }

    /**
     * Устанавливает номер ГТД (Cargo customs declaration)
     * @param $ccdNumber
     * @return mixed
     */
    public function setCCDNumber($ccdNumber)
    {
        $this->ccdNumber = (string)$ccdNumber;
        return $this;
    }

    /**
     * Возвращает номер ГТД (Cargo customs declaration)
     * @return mixed
     */
    public function getCCDNumber()
    {
        return $this->ccdNumber;
    }

    /**
     * Устанавливает страну происхождения
     * @param Country $country
     * @return mixed
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Возвращает страну происхождения
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Возвращает код товара
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Устанавливает код товара
     * @param $code код товара
     * @return mixed
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getTax()
    {
        if ($this->price instanceof Money and $this->vat and $this->quantity)
            return $this->price->multiple($this->vat / 100)->multiple($this->quantity);
        else
            return null;
    }

    public function getSumWithTax()
    {
        if ($this->price instanceof Money and $this->quantity and $this->vat)
            return $this->getPriceWithVAT()->multiple($this->quantity);
        else
            return null;
    }
}