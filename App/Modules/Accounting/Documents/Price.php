<?php


namespace App\Modules\Accounting\Documents;


class Price
{
    private $currencyCode = null;
    private $price = null;

    public function __construct($price, $currencyCode = 'RUB')
    {
        if (is_numeric($price))
            $this->price = $price;
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->get($this->currencyCode);
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param mixed $currencyCode
     * @return mixed
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * Используется для проверок и получения хранимого значения
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Price
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Используется для реальных расчётов и вывода
     * @param string $currencyCode
     * @return int|string|null
     */
    public function get($currencyCode='RUB'){
        return $this->price;
    }

}