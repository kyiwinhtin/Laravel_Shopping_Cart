<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

use Session;

class UserController extends Controller
{    
    public function getSignUp()
    {
        $user = Auth::user();
    	return view('user.signup',compact('user'));
    }

    public function postSignUp(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required|email|unique:users|max:225',
    		'password' => 'required|min:3|max:225'
    	]);

    	$user = User::create([ 

    				'email' => $request->input('email'),
    				'password' => bcrypt($request->input('password'))

    			]);

        Auth::login($user);

        if (Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }

    	return redirect()->route('product.index');

    }

    public function getSignIn()
    {
        
    	return view('user.signin');

    }

    public function postSignIn(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|email|max:225',
            'password' => 'required|min:3|max:225'
        ]);



    	if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')])){
            if (Session::has('oldUrl')) {

                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);

            }

    		return redirect()->route('user.profile');

    	}else{

    		return redirect()->back()->with('loginerror','Your Username or Password is Wrong!');

    	}
    }

    public function getLogOut()
    {
    	Auth::logout();
        Session::forget('cart');
    	return redirect()->route('user.signin');
    }

    public function getUserProfile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });        
    	return view('user.profile',compact('username','orders'));
    }

}
   