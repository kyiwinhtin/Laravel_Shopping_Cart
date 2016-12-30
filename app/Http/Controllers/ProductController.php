<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use App\Cart;

use Session;

use Stripe\Stripe;

use Stripe\Charge;

use Stripe\Error\Card;

use App\Order;

use Auth;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	return view('shop.index',compact('products'));
    }

  	public function getAddtoCart($id,Request $request)
  	{
  		$product = Product::findOrFail($id);
  		$oldCart = Session::has('cart') ? Session::get('cart') : null;
  		$cart = new Cart($oldCart);
  		$cart->add($product,$product->id);
  		$request->session()->put('cart',$cart);
  		return redirect()->route('product.index');
  	}

    public function getReduceByOne($id)
    {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->reduceByOne($id);
      if(count($cart->items) > 0)
      {
        Session::put('cart',$cart);
      }else{
        Session::forget('cart');
      }
      return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id)
    {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);
      if(count($cart->items) > 0)
      {
        Session::put('cart',$cart);
      }else{
        Session::forget('cart');
      }
      return redirect()->route('product.shoppingCart');
    }


  	public function getCart()
  	{
  		if(!Session::has('cart'))
  		{
  			return view('shop.shopping-cart');
  		}
  		$oldCart = Session::get('cart');
  		$cart = new Cart($oldCart);
  		$products = $cart->items;
  		$totalPrice = $cart->totalPrice;
  		return view('shop.shopping-cart',compact('products','totalPrice'));

  	}


  	public function getCheckOut()
  	{
  		if(!Session::has('cart'))
  		{
  			return view('shop.shopping-cart');
  		}
  		$oldCart = Session::get('cart');
  		$cart = new Cart($oldCart);
  		$total = $cart->totalPrice;
  		return view('shop.checkout',compact('total'));
  	}

  	public function postCheckOut(Request $request)
  	{
		 if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

  		Stripe::setApiKey('sk_live_Toi1qIliMk9gMYdDhEfAGHxc');


  
  		try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));

            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;
            
            $user = $request->input('user_id');

            // $order->save([$order->cart,$order->address,$order->name,$order->payment_id ,$user ]);
            Auth::user()->orders()->save($order);

  		}catch(Exception $e) {

  			return redirect()->route('checkout')->with('error',$e->getMessage());

  		}

  		Session::forget('cart');


  		return redirect()->route('product.index')->with('success','Successfully Purchased products!');


  	}

}
