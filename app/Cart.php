<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $delivery = 2;
    public $totalPurePrice = 0;


    public function __construct($oldCart)
    {

      if($oldCart){
        $this->items = $oldCart->items;
        $this->totalQty = $oldCart->totalQty;
        $this->totalPrice = $oldCart->totalPrice;
        $this->totalPurePrice = $oldCart->totalPurePrice;

      }
    }

    public function add($item, $id)
    {

        $storedItem = ['qty'=> 0, 'price' => $item->price, 'item' => $item];

      if($this->items){
        if(array_key_exists($id, $this->items)){
          $storedItem = $this->items[$id];
        }
      }
      $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->totalPrice += $item->price;
      $this->items[$id] = $storedItem;
      $this->totalQty++;
      $this->totalPurePrice += $item->price;
//        dd($item->supply_qty =$item->supply_qty  - $storedItem['qty']);
    }

    public function remove($item, $id)
    {
      if($this->items){
        if(array_key_exists($id, $this->items)){

            $this->items[$id]['price'] -= $item->price;

            $this->totalPrice -= $item->price;
          $this->totalQty--;
          $this->totalPurePrice -= $item->price;
          if($this->items[$id]['qty'] > 1){
            $this->items[$id]['qty']--;
//              if( $this->items[$id]['qty']<1){
//                  return redirect('/');
//              }
          }else{
            unset($this->items[$id]);
          }
        }
      }

    }

    public function addCoupon($coupon)
    {
//      $couponData = ['price'=> $coupon->price, 'coupon' => $coupon];
//      $this->coupon = $couponData;
//      $this->totalPrice -= $couponData['price'];
//      $this->couponDiscount += $couponData['price'];
    }
}
