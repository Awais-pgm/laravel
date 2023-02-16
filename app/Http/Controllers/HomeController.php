<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Alert;
use App\Models\BlogCategories;
use App\Models\BlogPosts;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\SliderDetails;
class HomeController extends Controller
{

    public function index()
    {
        $slider = SliderDetails::find(1);
        $categories = Categories::all();
        $products = Products::paginate(8);
        $data = compact('products', 'categories','slider');
        return view('home.userpage')->with($data);
    }
    // redirect a user if user is admin or normal user
    public function redirect()
    {
        $userType = Auth::user()->usertype;

        if ($userType == '1') {
            $totalOrders = Order::all();
            $totalOrdersCount = Order::all()->count();
            $totalProducts = Products::all()->count();
            $totalUsers = User::all()->count();
            $data = compact('totalOrders', 'totalProducts', 'totalUsers', 'totalOrdersCount');
            return view('admin.home')->with($data);
        } else {
            return redirect('/');
        }
    }
    // redirect user to the dashobrd
    public function dashboard()
    {
        return view('dashboard');
    }
    // show products
    public function showAllProducts()
    {
        $products = Products::paginate(16);
        $data = compact('products');
        return view('home.allProducts')->with($data);
    }
    // show all categories products
    public function showAllProductsOfCat($category_id)
    {
        $categories = Categories::with('product')->find($category_id);
        $data = compact('categories');
        return view('home.allProductsOfCat')->with($data);
    }
    // show product details
    public function productDetails($product_id)
    {
        $comments = Comment::where('product_id', '=' , $product_id)->get();
        $replies = Reply::all();
        $productDetails = Products::find($product_id);
        $data = compact('productDetails','comments','replies');
        return view('home.productDetails')->with($data);
    }
    // add to cart
    public function addProductToCart(Request $request, $product_id)
    {
        if (Auth::id()) {
            $request->validate([
                'productQuantity' => ['required'],
            ]);
            if ($request->productQuantity <= 0) {
                Alert::error('Error', 'Product quantity must be greater than zero.');
                return redirect()->back();
            }
            if ($request->productQuantity == 'E' || $request->productQuantity == 'e') {
                Alert::error('Error', 'Product quantity must be a number.');
                return redirect()->back();
            }
            // saving user data and product details to cart table
            $product_details = Products::find($product_id);
            $productQuantity = $request->productQuantity;
            $user = Auth::user();
            $cart = new Cart();
            $cart->user_name = $user->name;
            $cart->user_id = $user->id;
            $cart->user_email = $user->email;
            $cart->user_address = $user->address;
            $cart->user_mobile_no = $user->phone;
            $cart->product_name = $product_details->title;
            $cart->product_id = $product_details->id;
            $cart->product_quantity = $productQuantity;
            // in case if product has discount
            if ($product_details->discount_price == NULL) {
                $cart->product_price = $product_details->price;
            } else {
                $cart->product_price = $product_details->discount_price;
            }
            $cart->product_image = $product_details->image;
            // if an item already exists in  the cart
            if (Cart::where('product_id', $product_id)->exists()) {
                $prodQty =  Cart::select('product_quantity')->where('product_id', $product_id)->get();
                Cart::where('product_id', $product_id)->delete();
                $total = 0;
                foreach ($prodQty as $qty) {
                    $total = $qty['product_quantity'];
                    $total = $total + $productQuantity;
                    $cart->product_quantity = $total;
                    Alert::success('Product quantity has been updated');
                    $cart->save();
                    return redirect()->back();
                    die;
                }
            }
            Alert::success('Product into cart has been added successfully.');
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function showCart()
    {
        if (!Auth::id()) {
            Alert::error('Error', 'You must login.');
            return redirect()->back();
        }
        $userId = Auth::user()->id;
        $productsInCart = Cart::where('user_id', '=', $userId)->get();
        $products = Products::paginate(16);
        $noOfItems = $productsInCart->count();
        $data = compact('productsInCart', 'noOfItems', 'products');
        return view('home.cart')->with($data);
    }
    public function removeProductFromCart($product_id)
    {
        $productToBeRemoved = Cart::find($product_id);
        $productToBeRemoved->delete();
        Alert::success('Product has been removed successfully.');
        return redirect()->back();
    }
    // update quantity of a product
    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'productQuantity' => ['required'],
        ]);
        if ($request->productQuantity <= 0) {
            Alert::error('Error', 'Product quantity must be greater than zero.');
            return redirect()->back();
        }
        if ($request->productQuantity == 'E' || $request->productQuantity == 'e') {
            Alert::error('Error', 'Product quantity must be a number.');
            return redirect()->back();
        }
        $productFromCart = Cart::find($id);
        $productQuantity = $request->productQuantity;
        $productFromCart->product_quantity = $productQuantity;
        $productFromCart->save();
        Alert::success('Success', 'Product quantity has been updated successfully.');
        return redirect()->back();
    }
    // adding cart data to order table
    public function cashOnDelivery(Request $request)
    {
        if (!Auth::id()) {
            return redirect('login');
        }
        $request->validate([
            'phone' => 'required|numeric|min:11',
            'userName' => 'required',
            'address' => 'required',
        ]);
        $userId = Auth::user()->id;
        $userTable = User::find($userId);
        $userTable->name = $request->userName;
        $userTable->phone = $request->phone;
        $userTable->address = $request->address;
        $userTable->save();
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
            $order->payment_status = 'pending';
            $order->payment_method = 'COD';
            $totalAmount += $productInCart->product_price * $productInCart->product_quantity;
            $order->total_price += $totalAmount;
            $order->save();
            $totalAmount = 0;
            // deleting cart products
            Cart::where('user_id', '=', $userId)->delete();
        }
        Alert::success('Success', 'Your Order has been submitted successfully.');
        return redirect('/showAllProducts');
    }
    // checkout page
    public function checkout()
    {
        $userId = Auth::user()->id;
        $orderData = Cart::where('user_id', '=', $userId)->get();
        if (count($orderData) == 0) {
            return redirect('showAllProducts');
        }
        $userData =  User::find($userId);
        $data = compact('orderData', 'userData');
        return View('home.checkout')->with($data);
    }
    public function payOnline()
    {
        $userId = Auth::user()->id;
        $orderData = Cart::where('user_id', '=', $userId)->get();
        if (count($orderData) == 0) {
            return redirect('showAllProducts');
        }
        $userData =  User::find($userId);
        $data = compact('orderData', 'userData');
        return View('home.online-payment')->with($data);
    }
    public function showOrders(){
        if (!Auth::id()) {
            Alert::error('Error', 'You must login.');
            return redirect()->back();
        }
        if(Auth::user()->id){
            $userId = Auth::user()->id;
            $products = Products::paginate(16);
            $orders = Order::where('user_id', $userId)->get();
            $data = compact('orders','products');
            return view('home.show-order')->with($data);
        }
        
    }
    public function cancelOrder($id){
        Order::where('id', $id)->delete();
        Alert::success('success','Order cancelled successfully');
        return redirect()->back();
    }
    // comment and reply section
    public function addComment(Request $request,$product_id){
        if(!Auth::id()){
            Alert::error('error','You Must be logged in to comment');
            return redirect()->back();
        }
        $request->validate([
            'comment' => 'required',
        ]);
        $newComment = new Comment();
        $newComment->user_name = Auth::user()->name;
        $newComment->user_id = Auth::user()->id;
        $newComment->comment = $request->comment;
        $newComment->product_id = $product_id;
        $newComment->save();
        Alert::success('success','Comment created successfully');
        return redirect()->back();

    }
    public function replyOfComment(Request $request){
        if(!Auth::id()){
            Alert::error('error','You must be logged in to reply');
            return redirect()->back();
        }
        $request->validate([
            'reply' => 'required',
        ]);
        $newReply = new Reply();
        $newReply->user_name = Auth::user()->name;
        $newReply->user_id = Auth::user()->id;
        $newReply->comment_id = $request->commentId;
        $newReply->reply = $request->reply;
        $newReply->save();
        return redirect()->back();
    }
    // blog section
    public function showBlog(){
        $postsCount = BlogPosts::all()->count();
        $rand = rand(1,$postsCount);
        $featurePost = BlogPosts::find($rand);
        $posts = BlogPosts::paginate(4);
        $categories = BlogCategories::all();
        $data = compact('posts','featurePost','categories');
        return view('home.blog-posts')->with($data);
    }
    public function readPost($id){
        $categories = BlogCategories::all();
        $post = BlogPosts::find($id);
        $data = compact('post','categories');
        return view('home.read-post')->with($data);
    }
}