<?php


namespace App\Modules\Accounting\Documents;


class Country
{
    private $code;
    private $name;

    public function __construct($name)
    {
        $this->name = (string) $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

}