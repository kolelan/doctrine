<?php


namespace App\Modules\Accounting\Documents;

use  App\Modules\Accounting\Documents\IItem;

/**
 * Interface IItem определяет общие методы товарных позиций
 * @package App\Modules\Accounting\Documents
 */
interface IRecognizedItem extends IItem
{
    /**
     * @return mixed
     */
    public function getRecognizedPriceWithVAT();

    /**
     * @param string $price
     * @return mixed
     */
    public function setRecognizedPriceWithVAT($price);

    /**
     * @return mixed
     */
    public function getRecognizedPriceWithoutVAT();

    /**
     * @param string $price
     * @return mixed
     */
    public function setRecognizedPriceWithoutVAT($price);

    /**
     * @return mixed
     */
    public function getRecognizedSum();

    /**
     * @param string $sum
     * @return mixed
     */
    public function setRecognizedSum($sum);

    /**
     * @return mixed
     */
    public function getRecognizedVat();

    /**
     * @param $vat
     * @return mixed
     */
    public function setRecognizedVat($vat);

}