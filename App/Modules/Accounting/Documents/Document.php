<?php


namespace App\Modules\Accounting\Documents;


use App\Modules\Accounting\Common\Date;
use App\Modules\Accounting\Common\IdBehavior;
use App\Modules\Accounting\Documents\Contragent;
use App\Modules\Accounting\Documents\Items;

class Document implements IDocument
{
    use IdBehavior;
    private $name = null;
    private $number = null;
    private $date = null;
    private $type = null;
    private $vendor = null; // ��������
    private $customer = null; // ����������

    private $state;
    private $warning;
    private $error;
    private $items;


    /**
     * �������� ������ ���� ������������ ����
     * IDocument constructor.
     * @param $type
     */
    public function __construct($type)
    {
    }

    /**
     * ���������� ��������
     * @return mixed
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * ������������� ��������
     * @param Contragent $vendor
     * @return mixed
     */
    public function setVendor(Contragent $vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }

    /**
     * ���������� ����������
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * ������������� ����������
     * @param Contragent $customer
     * @return mixed
     */
    public function setCustomer(Contragent $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * ���������� ��� ���������
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * ������������� ��� ���������
     * @param $type
     * @return mixed
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * ���������� �������� ���������
     * @return mixed
     */
    public function getName($withName = true, $withNumber = true, $withDate = true)
    {
        $out = '';
        if ($withName and $this->name != null) {
            $out .= $this->name;
        }
        if ($withName and $this->number != null) {
            $out .= ' �' . $this->number;
        }
        /**
         * @var $this->date Date
         */
        if ($withDate and $this->date instanceof Date) {
            $out.= ' �� '.$this->date->getLocalDate();
        }
        return $out;

    }

    /**
     * ������������� �������� ���������
     * @param $name
     * @return mixed
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * ���������� ����� ���������
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * ������������� ����� ���������
     * @param $number
     * @return mixed
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * ���������� ���� ���������
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * ������������� ���� ���������
     * @param Date $createdDate
     * @return mixed
     */
    public function setDate(Date $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * ��������� �������� ��������� (�������� �������)
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * ������������� �������� ������� ���������
     * @param Items $items
     * @return mixed
     */
    public function setItems(Items $items)
    {
        $this->items = $items;
        return $this;
    }
}