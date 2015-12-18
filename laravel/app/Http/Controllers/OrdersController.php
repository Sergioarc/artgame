<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Cart;
use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = Auth::user()->orders()->paginate(10);
        return view('orders.index')->withOrders($orders);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if(!$order or $order->user_id !== Auth::id()) {
            return redirect(route('home'))->withInfo('No se encontró el pedido');
        }
        
        return view('orders.show')->withOrder($order)->withItems(Cart::items($order));
    }
}
