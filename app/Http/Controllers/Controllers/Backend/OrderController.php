<?php

namespace App\Http\Controllers\Backend;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
      $orders = Order::get();
      return view('admin.orders.index', compact(['orders']));
    }
    public function getOrderLists($id){

      $order = Order::with('products.photos')->whereId($id)->first();
//        $order = Order::findorfail($id)->first();
//        return $order;
      return view('admin.orders.lists', compact(['order']));
    }
}
