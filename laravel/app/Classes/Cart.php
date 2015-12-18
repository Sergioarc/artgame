<?php

namespace App\Classes;

use Auth;
use DB;
use Session;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\ModelItem;
use App\Color;
use App\Size;
use App\Order;
use App\Stock;

class Cart
{
    public function get()
    {
        if ( Auth::check() ) {
            $order = Order::firstOrNew([
                'status' => 'cart',
                'user_id' => Auth::id()
            ]);
        } else {
            $order = Order::firstOrNew([
                'session_id' => Session::getId(),
                'status'     => 'cart'
            ]);
        }

        return $order;
    }


    public function add(ModelItem $item, $color_id, $size_id, $quantity = 1)
    {
        if($quantity < 1) return 0;
        $order = $this->get();


        if( ! $order->exists ) {
            $order->status = 'cart';
            $order->save();
        }

        if($color_id) {
            $color = Color::find($color_id);
        }

        if( $size_id ) {
            $size = Size::find($size_id);
        }

        $stock = Stock::where('model_item_id', $item->id)->whereNull('order_id');


        if(isset($color)) {
            $stock->where('color_id', $color->id);
        } else {
            $stock->whereNull('color_id');
        }

        if(isset($size)) {
            $stock->where('size_id', $size->id);
        } else {
            $stock->whereNull('size_id');
        }

        $stock->limit($quantity);

        DB::beginTransaction();
        $cart_items = $stock->lockForUpdate()->get();
        if(($total = $cart_items->count()) > 0) {
            $stock->update([
                'order_id' => $order->id
            ]);
            $order->save();
        } 
        DB::commit();

        return $total;
    }

    public function items($order = null)
    {
        $order = $order ?: $this->get();
        if(! $order->exists) return new Collection;
        return $order->stock()->with('modelItem')
            ->select('stock.*', DB::raw('count(*) as quantity'))
            ->with('modelItem', 'color', 'size')
            ->groupBy('model_item_id', 'color_id', 'size_id')->get();
    }

    public function shippingAmount(Collection $items)
    {
        return 149;
    }

    public function subtotal(Collection $items)
    {
        return $items->sum(function($item) {
            return $item->quantity * $item->modelItem->price;
        });
    }

    public function total(Collection $items)
    {
        return $this->subtotal($items) + $this->shippingAmount($items);
    }
}