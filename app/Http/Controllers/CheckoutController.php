<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->get();

        if (Auth::check()) {
            return view('Checkout', [
                "title" => "Checkout",
                'carts'=>$cart,
            ]);
        } else {
            return view('Checkout', [
                "title" => "Checkout",
                'errors' => 'You need to login first. :)'
            ]);
        }
    }

    public function checkout(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->postal_code = $request->input('postalCode');
        $order->province = $request->input('province');
        $order->country = $request->input('country');
        $order->status = 0;
        $order->message = $request->input('message');
        $order->tracking_no = 'AIRACosmetics'.rand(1111,9999);
        $order->grand_total = $request->input('grand_total');
        $order->image_evidence = $request->file('image')->store('image_evidence');
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::Create([
                'order_id' => $order->id,
                
                'product_id' => $item->product_id,
                'qty' => $item->product_qty,
                'price' => $item->product->price,
            ]);

            $product = Product::where('id', $item->product_id)->first();
            $product->stock = $product->stock - $item->product_qty;
            $product->update();
        }

        if(Auth::user()->address == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->address = $request->input('address');
            $user->postal_code = $request->input('postalCode');
            $user->province = $request->input('province');
            $user->country = $request->input('country');
            $user->update();
        }

        $cartDestroy = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartDestroy);

        return redirect('/shop')->with('message', 'Product Already Order');
    }
}
