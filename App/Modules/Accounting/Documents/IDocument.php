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
     * Документ должен быть определённого типа
     * IDocument constructor.
     * @param $type
     */
    public function __construct($type);

    /**
     * Возвращает продавца
     * @return mixed
     */
    public function getVendor();

    /**
     * Устанавливает продавца
     * @param Contragent $vendor
     * @return mixed
     */
    public function setVendor(Contragent $vendor);

    /**
     * Возвращает покупателя
     * @return mixed
     */
    public function getCustomer();

    /**
     * Устанавливает покупателя
     * @param Contragent $customer
     * @return mixed
     */
    public function setCustomer(Contragent $customer);

    /**
     * Возвращает тип документа
     * @return mixed
     */
    public function getType();

    /**
     * Устанавливает тип документа
     * @param $type
     * @return mixed
     */
    public function setType($type);

    /**
     * Возвращает название документа
     * @return mixed
     */
    public function getName();

    /**
     * Устанавливает название документа
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * Вовзращает номер документа
     * @return mixed
     */
    public function getNumber();

    /**
     * Устанавливает номер документа
     * @param $number
     * @return mixed
     */
    public function setNumber($number);

    /**
     * Возвращает дату документа
     * @return mixed
     */
    public function getDate();

    /**
     * Устанавливает дату документа
     * @param Date $createdDate
     * @return mixed
     */
    public function setDate(Date $createdDate);

    /**
     * Вовращает элементы документа (товарные позиции)
     * @return mixed
     */
    public function getItems();

    /**
     * Устанавливает товарные позиции документа
     * @param Items $items
     * @return mixed
     */
    public function setItems(Items $items);
}