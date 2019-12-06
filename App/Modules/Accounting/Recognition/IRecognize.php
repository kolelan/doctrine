<?php


namespace App\Modules\Accounting\Recognition;


interface IRecognize
{
    public function getRecognizer();
    public function getResult();

}