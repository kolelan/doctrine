<?php


namespace App\Modules\Accounting\Documents;

use App\Modules\Accounting\Common\Date;
use App\Modules\Accounting\Documents\Items;
use App\Modules\Accounting\Documents\Contragent;

interface IDocument
{
    const DOCUMENT_TYPE_UTD = 'UTD';
    const DOCUMENT_TYPE_TORG12 = 'TORG12';
    const DOCUMENT_TYPE_OFFER = 'OFFER';
    const DOCUMENT_TYPE_VAT_INVOICE = 'VAT_INVOICE';
    const DOCUMENT_TYPE_RECEIPT = 'RECEIPT';

    /**
     * �������� ������ ���� ������������ ����
     * IDocument constructor.
     * @param $type
     */
    public function __construct($type);

    /**
     * ���������� ��������
     * @return mixed
     */
    public function getVendor();

    /**
     * ������������� ��������
     * @param Contragent $vendor
     * @return mixed
     */
    public function setVendor(Contragent $vendor);

    /**
     * ���������� ����������
     * @return mixed
     */
    public function getCustomer();

    /**
     * ������������� ����������
     * @param Contragent $customer
     * @return mixed
     */
    public function setCustomer(Contragent $customer);

    /**
     * ���������� ��� ���������
     * @return mixed
     */
    public function getType();

    /**
     * ������������� ��� ���������
     * @param $type
     * @return mixed
     */
    public function setType($type);

    /**
     * ���������� �������� ���������
     * @return mixed
     */
    public function getName();

    /**
     * ������������� �������� ���������
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * ���������� ����� ���������
     * @return mixed
     */
    public function getNumber();

    /**
     * ������������� ����� ���������
     * @param $number
     * @return mixed
     */
    public function setNumber($number);

    /**
     * ���������� ���� ���������
     * @return mixed
     */
    public function getDate();

    /**
     * ������������� ���� ���������
     * @param Date $createdDate
     * @return mixed
     */
    public function setDate(Date $createdDate);

    /**
     * ��������� �������� ��������� (�������� �������)
     * @return mixed
     */
    public function getItems();

    /**
     * ������������� �������� ������� ���������
     * @param Items $items
     * @return mixed
     */
    public function setItems(Items $items);
}