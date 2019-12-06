<?php


namespace App\Modules\Accounting\Documents;


/**
 * Interface ISum описывает методы для получения сумм стоимости, налога, и конечной стоимости с налогом
 * @package App\Modules\Accounting\Documents
 */
interface ISum
{
    public function getSum();
    public function getTax();
    public function getSumWithTax();

}