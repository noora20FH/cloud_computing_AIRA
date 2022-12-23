<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::where('user_id', Auth::id())->get();
        if (Auth::check()) {
            return view('Cart', [
                "title" => "Cart",
                'carts'=>$cart,
            ]);
        } else {
            return view('Cart', [
                "title" => "Cart",
                'errors' => 'You need to login first. :)'
            ]);
        }
    }

    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_store = $request->input('product_store');
        if(Auth::check()){
            if(
                Cart::where('product_id',$request->input('product_id'))
                ->where('user_id',Auth::id())
                ->exists()
                )
            {
                return redirect()->back()->with('message', 'Product Already in the Cart');
            }else{

                Cart::create([
                    
                    'user_id' => Auth::id(),
                    'product_id' => $product_id ,
                    'product_qty' => 1,
                ]);
                return redirect()->back()->with('message', 'Product Successfully Added to Cart');
            }
        }else{
            return redirect('/sign-in');
        }
    }

    public function update($id, $quantity){
        $cart = Cart::where('id', $id)->increment('product_qty', $quantity);
        return redirect()->back()->with('message', 'Product Quantity Update');
    }

    public function destroy($id){
        Cart::find($id)->delete();
        return redirect()->back()->with('message', 'Product Successfully Delete from Cart');
    }
    
}
