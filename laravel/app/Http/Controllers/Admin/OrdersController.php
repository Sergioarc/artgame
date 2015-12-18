<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use Input;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $orders = Order::whereNotIn('status',['cart']);
       $status = ['order' => 'ORDEN','in_transit' => 'ENVIADO','done' => 'ENTREGADO','cancelled' => 'CANCELADO'];

       if(Input::has('order_id')){
        $orders->where('orders.id','like','%'.Input::get('order_id').'%');
       }

       if (Input::has('status')){
           $orders->where('orders.status',Input::get('status'));
       }

       return view('admin.orders.index')->withOrders($orders->get())->withStatus($status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
        $order = Order::find($id);
        if ($order) {
            switch ($order->status) {
                case 'order':
                    $order->status = 'in_transit';
                    break;
                case 'in_transit':
                    $order->status = 'done';
                    break;
                case 'done':
                     $order->status = 'cancelled';
                    break;                               
                default:
                    # code...
                    break;
            }
            
            $order->save();
        }
        else{
                return back()->withError('No se encontro la orden');
            }

        return back()->withSuccess('Se ha actualizado el estado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
