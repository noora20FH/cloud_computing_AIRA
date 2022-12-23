<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use App\Models\Evidence_shipping;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\cart;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            "title" => "AIRA COSMETICS",
            // 'categories' => Category::all(),
        ]);
    }
    public function indexAdmin()
    {
        return view('welcomeAdmin', [
            "title" => "NAF-STORE-Admin",

        ]);
    }
    public function indexOwner()
    {
        return view('welcomeOwner', [
            "title" => "NAF-STORE-Owner"
        ]);
    }

    public function blank()
    {
        return view('blank');
    }

    public function shop()
    {
        return view('Shop', [
            "title" => "Shop",
            // "products" => product::all(),
        ]);
    }

    public function product()
    {
        return view('productOwner', [
            "title" => "Product",
            "products" => product::all(),
        ]);
    }

    public function wishlist()
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())->get();
            return view('wishlist', [
                "title" => "Wishlist",
                'wishlists' => $wishlist,
            ]);
        } else {
            return view('Wishlist', [
                "title" => "Wishlist",
                'errors' => 'You need to login first. :)'
            ]);
        }
    }

    public function cart()
    {
        if (Auth::check()) {
            return view('cart', [
                "title" => "Cart"
            ]);
        } else {
            return view('cart', [
                "title" => "Cart",
                'errors' => 'You need to login first. :)'
            ]);
        }
    }
    public function checkout()
    {
        if (Auth::check()) {
            return view('Checkout', [
                "title" => "Checkout"
            ]);
        } else {
            return view('Checkout', [
                "title" => "Checkout",
                'errors' => 'You need to login first. :)'
            ]);
        }
    }

//admin side
    public function ownerData()
    {
        return view('admin.ownerData', [
            "title" => "owner_data"
        ]);
    }
    public function customerData()
    {
        return view('admin.customerData', [
            "title" => "customer_data"
        ]);
    }
    public function transaction()
    {
        $order = Order::all();
        $evidence = Evidence_shipping::join('orders', 'Evidence_shipping.order_id', '=', 'orders.id')->get();
                                    
        // $evidences = Evidence_shipping::where('order_id', Order::id())->get();
        return view('admin.transaction', [
            "title" => "transaction",
            'orders' => $order,
            'evidence'=> $evidence,
        ]);
    }

    public function updateOrder($id, $status){
        $cart = Order::where('id', $id)->increment('status', $status);
        return redirect()->back();
    }
    

    //Owner Side
    public function product_list()
    {
        return view('owner.productList', [
            "title" => "product_list"
        ]);
    }
    public function storeOwner()
    {
        return view('owner.storeOwner', [
            "title" => "storeOwner"
        ]);
    }
    public function orderOwner()
    {
        return view('owner.orderOwner', [
            "title" => "orderOwner"
        ]);
    }

    public function transactionOwner()
    {
        $order = Order::all();
        $evidence = Evidence_shipping::join('orders', 'Evidence_shipping.order_id', '=', 'orders.id')->get();
                                    
        // $evidences = Evidence_shipping::where('order_id', Order::id())->get();
        return view('owner.transaction', [
            "title" => "transaction",
            'orders' => $order,
            'evidence'=> $evidence,
        ]);
    }

    // customer 

    public function signIn()
    {
        return view('auth.login', [
            "title" => "Sign In"
        ]);
    }
    public function SignUp()
    {
        return view('auth.register', [
            "title" => "Sign Up"
        ]);
    }

    public function profile()
    {
        $model = Auth::user();

        return view('profile',compact('model'), [
            "title" => "Profile"
        ]);
    }

    public function productCustomer()
    {
        return view('customer.productCustomer', [
            "title" => "Product",
            "products" => product::all(),
        ]);
    }

    public function transactionCustomer()
    {
        $order = Order::all();
        $evidence = Evidence_shipping::join('orders', 'Evidence_shipping.order_id', '=', 'orders.id')->get();
                                    
        // $evidences = Evidence_shipping::where('order_id', Order::id())->get();
        return view('customer.transaction', [
            "title" => "transaction",
            'orders' => $order,
            'evidence'=> $evidence,
        ]);
    }
}
