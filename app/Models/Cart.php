<?php

namespace App\Models;

class Cart
{
    public $items;

    public $totalQty=0;

    public $totalPrice=0;

    public $no=0;

    public $kolicina;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;
            $this->totalPrice=$oldCart->totalPrice;
            $this->no=$oldCart->no;
            $this->kolicina=$oldCart->kolicina;
        }
    }

    public function add($item,$kolicina)
    {
        $this->kolicina=$kolicina;
        //dd(class_basename($this->items[3]['item']));
        $storedItem=['qty'=>$this->kolicina,'price'=>$item->price,'item'=>$item,'no'=>$this->no];
        /*
        if ($this->items) {
            if (array_key_exists($this->no, $this->items)) {
                $storedItem = $this->items[$this->no];
            }
        }
        */
        $storedItem['qty']=$this->kolicina;
        $storedItem['price']=$item->price*$storedItem['qty'];
        $this->items[]=$storedItem;
        $this->totalQty++;
        $this->no+=1;
        $this->totalPrice+=$storedItem['price'];
    }

    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price']-=$this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice-=$this->items[$id]['item']['price'];
        if($this->items[$id]['qty']<=0)
        {
            unset($this->items[$id]);
        }
    }
    public function removeItem($id)
    {
        $this->totalQty-=$this->items[$id]['qty'];
        $this->totalPrice-=$this->items[$id]['price'];
        unset($this->items[$id]);
    }
    public function addOne($id)
    {
        $this->items[$id]['qty']++;
        $this->items[$id]['price']+=$this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice+=$this->items[$id]['item']['price'];
    }
}
