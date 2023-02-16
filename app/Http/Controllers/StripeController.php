<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Products;
class StripeController extends Controller
{
    public function makePayment(Request $request)
    {
        // to get total amount 
        $userId = Auth::User()->id;
        $request->validate([
            'phone'=> 'required|numeric|min:11',
            'userName'=> 'required',
            'address'=> 'required',
        ]);
        $userId = Auth::user()->id;
        $userTable = User::find($userId);
        $userTable->name = $request->userName;
        $userTable->phone = $request->phone;
        $userTable->address = $request->address;
        $userTable->save();
        $cartData =  Cart::where('user_id', '=', $userId)->get();
        $totalAmount = 0;
        foreach ($cartData as $product) {
            $totalAmount += $product->product_price * $product->product_quantity;
        }  
        //  stripe payment method start
        \Stripe\Stripe::setApiKey('sk_test_51MYR3xIMKFoMzTgyoUitzNpRIIF2jDzsAoKSKdTXa2BGMByg65aTy47GunNSh9SwKmIINDc73TFa5A1D3kHuMNSV00mB8Satbl');
        $charge = \Stripe\Charge::create([
            'source' => $_POST['stripeToken'],
            'description' => "Shopped from E-Store",
            'amount' => $totalAmount * 100,
            'currency' => 'pkr',
        ]);
        // stripe payment method end
        if($charge->status == 'succeeded'){
            $productsInCart = Cart::where('user_id', '=', $userId)->get();
            $totalAmount = 0;
            foreach ($productsInCart as $productInCart) {
                $order = new Order;
                $order->user_id = $productInCart->user_id;
                $order->user_name = $request->userName;
                $order->user_email = $productInCart->user_email;
                $order->user_mobile_no = $request->phone;
                $order->user_address = $request->address;
                $order->product_name = $productInCart->product_name;
                $order->product_id = $productInCart->product_id;
                $order->product_quantity = $productInCart->product_quantity;
                $order->product_image = $productInCart->product_image;
                $order->product_price = $productInCart->product_price;
                $order->delivery_status = 'processing';
                $order->payment_status = 'paid';
                $order->payment_method = 'CARD';
                $totalAmount += $productInCart->product_price * $productInCart->product_quantity;
                $order->total_price += $totalAmount;
                $order->save();
                $totalAmount = 0;
                // deleting cart products
                Cart::where('user_id', '=', $userId)->delete();
            }
            foreach ($productsInCart as $productInCart) {
                $productid = $productInCart->product_id;
                $product = Products::find($productid);
                $product->quantity =$product->quantity - $productInCart->product_quantity;
                $product->save();
            }
            Alert::success('success','Thanks for payment.');
            return redirect('/');
        }
        else{
            Alert::error('error','payment failed');
            return redirect()->back();
        }
    }
}
