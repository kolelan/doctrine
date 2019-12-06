<?php


namespace App\Modules\Accounting\Documents;

use App\Modules\Accounting\Documents\Country;
use App\Modules\Accounting\Documents\Measure;
use App\Modules\Accounting\Documents\Price;
use App\Modules\Accounting\Documents\IRecognizedItem;
use App\Modules\Accounting\Documents\ISum;


class RecognizedItem extends Item implements IRecognizedItem, ISum
{
    private $recognizedPriceWithVAT = null;
    private $recognizedPriceWithoutVAT = null;
    private $recognizedVAT = null;
    private $recognizedSum = null;

    /**
     * @return mixed|void
     */
    public function getRecognizedPriceWithVAT()
    {
        return $this->recognizedPriceWithVAT;
    }

    /**
     * @param string $price
     * @return mixed|void
     */
    public function setRecognizedPriceWithVAT($price)
    {
        $this->recognizedPriceWithVAT = $price;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getRecognizedPriceWithoutVAT()
    {
        return $this->recognizedPriceWithoutVAT;
    }

    /**
     * @param string $price
     * @return mixed|void
     */
    public function setRecognizedPriceWithoutVAT($price)
    {
        $this->recognizedPriceWithoutVAT = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecognizedSum()
    {
        return $this->recognizedSum;
    }

    /**
     * @param string $sum
     * @return mixed
     */
    public function setRecognizedSum($sum)
    {
        $this->recognizedSum = $sum;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecognizedVat()
    {
        return $this->recognizedVAT;
    }

    /**
     * @param $vat
     * @return mixed
     */
    public function setRecognizedVat($vat)
    {
        $this->recognizedVAT = $vat;
        return $this;
    }
}