<?php


namespace App\Modules\Accounting\Documents;

use App\Modules\Accounting\Documents\Item;
use Money\Money;

class Items implements IItems
{
    private $sum = null;
    private $tax = null;
    private $sumWithTax = null;
    private $items = [];

    public function __construct(array $items)
    {
        foreach ($items as $item) {
            if ($item instanceof Item) {
                $this->item[] = $item;
                $this->parseSumsAndTax($item,true);
            }
        }
    }

    public function addItem(Item $item)
    {
        $this->items[] = $item;
        $this->parseSumsAndTax($item,true);
        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    public function getSum()
    {
        return $this->sum;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function getSumWithTax()
    {
        return $this->sumWithTax;
    }

    public function removeItem($itemId)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getId == $itemId) {
                $this->parseSumsAndTax($item,false);
                unset($this->items[$key]);
            }
        }
    }

    /**
     * Обрабатывает сумму и разность по трём полям
     * @param Money $item
     * @param bool $sign true is add, false is subtract
     */
    private function parseSumsAndTax(Item $item, $sign = true)
    {
        if ($this->sum instanceof Money)
            $sign ? $this->sum->add($item->getSum()) : $this->sum->subtract($item->getSum());
        else
            $sign ? $this->sum = $item->getSum() : $this->sum = $item->getSum()->multiple(-1);
        if ($this->tax instanceof Money)
            $sign ? $this->tax->add($item->getTax()): $this->tax->subtract($item->getTax());
        else
            $sign ? $this->tax = $item->getTax(): $this->tax = $item->getTax()->multiple(-1);
        if ($this->sumWithTax instanceof Money)
            $sign ? $this->sumWithTax->add($item->getSumWithTax()): $this->sumWithTax->subtract($item->getSumWithTax());
        else
            $sign ? $this->sumWithTax = $item->getSumWithTax():$this->sumWithTax = $item->getSumWithTax()->multiple(-1);
    }
}