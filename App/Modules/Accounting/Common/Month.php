<?php
namespace App\Modules\Accounting\Common;


class Month
{
    public static $mos = [
        1 => '������',
        2 => '�������',
        3 => '�����',
        4 => '������',
        5 => '���',
        6 => '����',
        7 => '����',
        8 => '�������',
        9 => '��������',
        10 => '�������',
        11 => '������',
        12 => '�������',
    ];

    public static function getGenitive($monthNum,$short=false)
    {
        return $short?substr(self::$mos[(int)$monthNum],0,3):self::$mos[(int)$monthNum];
    }
}