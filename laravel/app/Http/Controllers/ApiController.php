<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

use App\Collection;
use App\Subcollection;
use App\Model;
use App\ModelItem;
use App\Color;
use App\Size;
use App\Set;
use App\Order;
use App\Stock;

class ApiController extends Controller {
    
    public function getModelItemsBySet(Set $set)
    {
        $items = $set->modelItems()->with('colors', 'colors.photo', 'sizes');
        $items->with(['stock' => function($q) {
            $q->whereNull('order_id')
                ->groupBy('color_id', 'size_id')
                ->select(DB::raw('count(*) as stock'), 'color_id', 'size_id', 'model_item_id');
        }]);
        return response()->json($items->get());
    }

    public function postAddToCart(Request $request)
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


        if( ! $order->exists ) {
            $order->status = 'cart';
            $order->save();
        }

        $item = ModelItem::find($request->input('model_item_id'));
        if($request->has('color_id')) {
            $color = Color::find($request->input('color_id'));
        }

        if( $request->has('size_id') ) {
            $size = Size::find($request->input('size_id'));
        }

        $quantity = $request->input('quantity', 1);

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

        return response()->json([
            'items_added' => $total
        ]);
    }

}