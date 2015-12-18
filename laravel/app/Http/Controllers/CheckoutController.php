<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Omnipay;
use Session;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Cart;
use App\ModelItem;
use App\Color;
use App\Size;
use App\Stock;
use App\Order;

class CheckoutController extends Controller
{

    public function getCart()
    {
        return view('checkout.cart');
    }

    public function postAddToCart(Request $request)
    {
        $errors = [];
        $items = $request->input('items', []);
        $colors = $request->input('colors', []);
        $sizes = $request->input('sizes', []);
        $quantities = $request->input('quantities', []);
        foreach ($items as $i => $item_id) {
            $item = ModelItem::find($item_id);
            $color_id = $colors[$i];
            $size_id = $sizes[$i];
            $quantity = $quantities[$i];
            $added = Cart::add($item, $color_id, $size_id, $quantity);
            if($added < $quantity) {
                $errors[$item_id] = $added;
            }
        }
        
        $redirect = redirect(action('CheckoutController@getCart'));
        if(count($errors) == 0) {
            return $redirect->withSuccess("Se añadieron los artículos a tu carrito");
        } else {
            return $redirect->withErrors($errors, 'add_cart');
        }
    }

    public function getConfirmCart()
    {
        return view('checkout.confirm');
    }

    public function getPayment()
    {
        return view('checkout.payment');
    }

    public function getPaymentInfo()
    {
        $date = Carbon::now();
        return view('checkout.payment-info')->withDate($date);
    }

    public function postPaypalPayment()
    {

        $cart = Cart::get();
        if(! $cart->exists){
            return redirect(route('home'))->withInfo('No hay artículos en tu carrito');
        }

        $items = Cart::items($cart);
        $item_bag = new \Omnipay\Common\ItemBag();

        foreach ($items as $item) {
            $item_bag->add([
                'name' => $item->modelItem->name,
                'price' => $item->modelItem->price,
                'quantity' => $item->quantity,
            ]);
        }
        $params = [
            'amount' => number_format(Cart::total($items), 2, '.', ''),
            'currency' => 'MXN',
            'returnUrl' => action('CheckoutController@getPaymentSuccess'),
            'cancelUrl' => action('CheckoutController@getPaymentCancel'),
            'headerImageUrl' => asset('/img/banner-paypal.png'),
        ];

        Session::put('params', $params);
        Session::save();
        $response = Omnipay::purchase($params)
            ->setItems($item_bag)
            ->setShippingAmount(Cart::shippingAmount($items))
            ->send();

        if($response->isSuccessful()){
            dd($response);
        }elseif($response->isRedirect()){
            $response->redirect();
        }else{
            echo $response->getMessage();
        }
    }

    public function getPaymentSuccess()
    {
        $response = Omnipay::completePurchase(Session::get('params'))->send();
        if($response->isSuccessful()){
            $order = Cart::get();
            $order->status = 'order';
            $order->save();
            return redirect(route('home'))->withSuccess("Se ha recibido su pago correctamente");
        }
        throw new Exception("PayPal communication error", 1);
        
    }

    public function getPaymentCancel()
    {
        return redirect('/')->withSuccess("Se ha cancelado la orden");
    }


}