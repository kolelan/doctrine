<?php


namespace App\Modules\Accounting\Documents;


class Measure
{
    private $measureCode;
    private $measure;
    
    public function __construct($measure,$measureCode=null)
    {
        $this->measure = $measure;
        $this->measureCode = $measureCode;
    }
    
    public function __toString()
    {
        return $this->measure;
    }

    /**
     * @return mixed
     */
    public function getMeasureCode()
    {
        return $this->measureCode;
    }

    /**
     * @param mixed $measureCode
     * @return mixed
     */
    public function setMeasureCode($measureCode)
    {
        $this->measureCode = $measureCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * @param mixed $measure
     * @return Measure
     */
    public function setMeasure($measure)
    {
        $this->measure = $measure;
        return $this;
    }

}