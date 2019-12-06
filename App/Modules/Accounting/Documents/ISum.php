<?php


namespace App\Modules\Accounting\Documents;


/**
 * Interface ISum ��������� ������ ��� ��������� ���� ���������, ������, � �������� ��������� � �������
 * @package App\Modules\Accounting\Documents
 */
interface ISum
{
    public function getSum();
    public function getTax();
    public function getSumWithTax();

}