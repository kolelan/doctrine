<?php
namespace App\Modules\Accounting\Common;


class Month
{
    public static $mos = [
        1 => '€нвар€',
        2 => 'феврал€',
        3 => 'марта',
        4 => 'апрел€',
        5 => 'ма€',
        6 => 'июн€',
        7 => 'июл€',
        8 => 'августа',
        9 => 'сент€бр€',
        10 => 'окт€бр€',
        11 => 'но€бр€',
        12 => 'декабр€',
    ];

    public static function getGenitive($monthNum,$short=false)
    {
        return $short?substr(self::$mos[(int)$monthNum],0,3):self::$mos[(int)$monthNum];
    }
}