<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // List of all products
    function index()
    {
        $data = Product::all();
        return view('products.product', ['products'=>$data]);
    }

    // Get detail product
    function detail($id)
    {
        $data = Product::find($id);
        return view('products.detail', ['product'=>$data]);
    }

    // Get product search
    function search(Request $req)
    {
        $data = Product::where('name', 'like', '%'.$req->input('query').'%')->get();
        return view('products.search', ['products'=>$data]);
    }

    // Add product in cart
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            if(Cart::where('user_id','=',$req->session()->get('user')['id'])->where('product_id','=',$req->product_id)->exists())
            {
                echo "Already in your cart";
            } else {
                $cart = new Cart;
                $cart->user_id =  $req->session()->get('user')['id'];
                $cart->product_id =  $req->product_id;
                $cart->save();
                return redirect('/');
            }
        } else {
            return redirect('login');
        }
    }

    // Get number of item in cart
    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    // List of all products in cart
    function cartList()
    {
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')->join('products', 'cart.product_id','=','products.id')->where('cart.user_id', $userId)->select('products.*', 'cart.id as cart_id')->get();
        return view('products.cartlist', ['products'=>$products]);
    }

    // Remove products in cart
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    // Page of product we want to order plus the total price
    function ordernow()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')->join('products', 'cart.product_id','=','products.id')->where('cart.user_id', $userId)->sum('products.price');
        return view('products.ordernow', ['total'=>$total]);
    }

    // Place the order
    function orderPlace(Request $req)
    {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->status = 'pending';
            $order->payment_method = $req->payment;
            $order->payment_status = 'pending';
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        // $req->input();
        return redirect('/');
    }

    // Show my order
    function myOrders()
    {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')->join('products', 'orders.product_id','=','products.id')->where('orders.user_id', $userId)->get();
        return view('products.myorders', ['orders'=>$orders]);
    }
}
