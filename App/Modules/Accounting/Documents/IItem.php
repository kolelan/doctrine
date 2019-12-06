<?php


namespace App\Modules\Accounting\Documents;

use  Money\Money;
use  App\Modules\Accounting\Documents\Measure;
use  App\Modules\Accounting\Documents\Country;

/**
 * Interface IItem определяет общие методы товарных позиций
 * @package App\Modules\Accounting\Documents
 */
interface IItem extends ISum
{
    /**
     * Возвращает код товара
     * @return mixed
     */
    public function getCode();

    /**
     * Устанавливает код товара
     * @param $code код товара
     * @return mixed
     */
    public function setCode($code);

    /**
     * Устанавливает Название товарной позиции
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * Возвращает Название товарной позиции
     * @return mixed
     */
    public function getName();

    /**
     * Устанавливает количество единиц товарной позиции
     * @param $quantity
     * @return mixed
     */
    public function setQuantity($quantity);

    /**
     * Возвращает количество
     * @return mixed
     */
    public function getQuantity();

    /**
     * Устанавливает единицу измерения
     * @param Measure $measure
     * @return mixed
     */
    public function setMeasure(Measure $measure);

    /**
     * Возвращает единицу измерения
     * @return mixed
     */
    public function getMeasure();

    /**
     * Устанавливает НДС (Value-added tax) в %
     * @param $vat
     * @return mixed
     */
    public function setVAT($vat);

    /**
     * Возвращает НДС (Value-added tax) в %
     * @return mixed
     */
    public function getVAT();

    /**
     * Устанавливает цену с НДС
     * @param Price $price
     * @return mixed
     */
    public function setPriceWithVAT(Money $price);

    /**
     * Возвращает цену с НДС
     * @return mixed
     */
    public function getPriceWithVAT();

    /**
     * Устанавливает цену без НДС
     * @param Price $price
     * @return mixed
     */
    public function setPriceWithoutVAT(Money $price);

    /**
     * Возвращает цену без НДС
     * @return mixed
     */
    public function getPriceWithoutVAT();

    /**
     * Устанавливает итоговую сумму
     * @param Price $price
     * @return mixed
     */
    public function setSum(Money $price);

    /**
     * Возвращает итоговую сумму
     * @return mixed
     */
    public function getSum();

    /**
     * Устанавливает номер ГТД (Cargo customs declaration)
     * @param $ccdNumber
     * @return mixed
     */
    public function setCCDNumber($ccdNumber);

    /**
     * Возвращает номер ГТД (Cargo customs declaration)
     * @return mixed
     */
    public function getCCDNumber();

    /**
     * Устанавливает страну происхождения
     * @param Country $country
     * @return mixed
     */
    public function setCountry(Country $country);

    /**
     * Возвращает страну происхождения
     * @return mixed
     */
    public function getCountry();
}