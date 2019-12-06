<?php


namespace App\Modules\Accounting\Recognition;


use App\Modules\Accounting\Recognition\Entera\EnteraProService;

class RecognitionProvider
{
    static private $filepath;
    static public function get($filepath='')
    {
        self::$filepath = $filepath;
        return new EnteraProService("stepenko@action-media.ru", "379295");
    }

}