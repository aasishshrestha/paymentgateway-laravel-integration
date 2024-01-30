<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Uid\Ulid;

class ProductController extends Controller
{
    public function show(){
        $products = Product::get();
        // dd($products);
        // exit;
        return view('products/viewProduct', ['products'=>$products]);
    }

    public function order(Request $request){
        // dd(Ulid::generate(now()));exit;
        $product = Product::find($request->id);

        $order = Order::create([
            "product_id" => $product->id,
            "user_id" => "2",
        ]);

        $oid = $order->id;
        $ulid = Ulid::generate(now());
        // dd($ulid);exit;

        $payment = Payment::create([
            "amount" => $product->price,
            "discount_amount" => $product->discount,
            "net_amount" => $product->price - $product->discount,
            "order_id" => $oid,
            "ulid" => $ulid,

        ]);

        if(!$order || !$payment){
            return redirect()->back()->withErrors("Order cannot be placed");
        }

        return redirect('/checkout');

    }
    public function checkout(){
        // $order_detail = Order::where('user_id','1')->where('is_completed',false)->first()->payments;
        $order_detail = Order::with('payments')->whereHas('payments', function($query){
            $query->where('user_id','2')->where('is_completed',false)->where('payment_status', NULL);
        })->get()->first();
        return view('products/orderDetail',["order_detail" => $order_detail]);

    }
}
