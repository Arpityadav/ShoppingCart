<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items;
    public $totalCost;
    public $totalQuantity;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalCost = $oldCart->totalCost;
            $this->totalQuantity = $oldCart->totalQuantity;
        }
    }

    public function add($item)
    {
        $currentItem = [
            'id' => $item->id,
            'quantity' => 0,
            'price' => $item->price,
            'item' => $item
        ];

        if ($this->items) {
            if (array_key_exists($item->id, $this->items)) {
                $currentItem = $this->items[$item->id];
            }
        }

        $currentItem['quantity']++;
        $currentItem['price'] = $item->price * $currentItem['quantity'];

        $this->items[$item->id] = $currentItem;
        $this->totalQuantity++;
        $this->totalCost += $item->price;
    }

    public function reduceByOne($id)
    {
        $this->items[$id]['quantity']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];

        $this->totalQuantity--;
        $this->totalCost -= $this->items[$id]['item']['price'];

        if ($this->items[$id]['quantity']<= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        $this->totalQuantity = $this->items[$id]['quantity'];
        $this->totalCost -= $this->items[$id]['price'];

        unset($this->items[$id]);
    }
}
