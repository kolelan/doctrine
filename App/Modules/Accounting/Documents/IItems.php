<?php


namespace App\Modules\Accounting\Documents;

use App\Modules\Accounting\Documents\Item;

interface IItems extends ISum
{
    public function __construct(array $items);
    public function addItem(Item $item);
    public function removeItem($itemId);
    public function getItems();

}