<?php


namespace App\Modules\Accounting\Common;


trait IdBehavior
{
    private $id;
    public function  getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}