<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/redirect', 'redirect')->middleware('auth','verified');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/', 'index');
    //<--------- User Side Products route section (CRUD) ---------->
    Route::get('/showAllProducts', 'showAllProducts')->name('showAllProducts');
    Route::get('/showAllProductsOfCat/{category_id}', 'showAllProductsOfCat')->name('showAllProductsOfCat');
    Route::post('/addProductToCart/{product_id}', 'addProductToCart')->name('addProductToCart');
    Route::get('/productDetails/{product_id}', 'productDetails')->name('productDetails');
    Route::get('/showCart', 'showCart')->name('showCart');
    Route::get('/removeProductFromCart/{id}', 'removeProductFromCart')->name('removeProductFromCart');
    Route::post('/updateQuantity/{id}', 'updateQuantity')->name('updateQuantity');
    Route::post('/cashOnDelivery', 'cashOnDelivery')->name('cashOnDelivery');
    Route::post('/payUsingCard', 'payUsingCard')->name('payUsingCard');
    Route::get('/checkout', 'checkout');
    Route::get('/checkout/online/payment', 'payOnline');
    Route::get('/show/orders', 'showOrders');
    Route::get('/cancel/order/{id}', 'cancelOrder');
    //<--------- User Side comment and reply section ---------->
    Route::post('/add/comment/{id}', 'addComment');
    Route::post('/reply/of/comment/', 'replyOfComment');
    //<--------- User Side blog section ---------->
    Route::get('/show/blog', 'showBlog');
    Route::get('/read/blog/post/{id}', 'readPost');
    Route::get('/read/category/post/{id}', 'readCategoryPost');
    // contact us section
    Route::get('contact/us' , 'contactUs');
    Route::post('save/contact/us' , 'saveContactUs');
     // search system for products
    //  Route::get('search','index');
    
});

// <---- Admin's categories route section (CRUD) ---->
Route::controller(AdminController::class)->group(function () {
    Route::get('/viewCategoryPage', 'viewCategoryPage')->name('viewCategoryPage');
    Route::post('/addCategory', 'addCategory')->name('addCategory');
    Route::get('/showCategories', 'showCategories')->name('showCategories');
    Route::get('/editCategory/{id}', 'editCategory')->name('editCategory');
    Route::post('/saveEditedCat/{id}', 'saveEditedCat')->name('saveEditedCat');
    Route::get('/softDeleteCat/{id}', 'softDeleteCat')->name('softDeleteCat');
    Route::get('/viewTrash', 'viewTrash')->name('viewTrash');
    Route::get('/restoreDeletedCategory/{id}', 'restoreDeletedCategory')->name('restoreDeletedCategory');
    Route::get('/restoreAllDeletedCats', 'restoreAllDeletedCats')->name('restoreAllDeletedCats');
    Route::get('/forceDelete/{id}', 'forceDelete')->name('forceDelete');
    //<--------- Admin's Products route section (CRUD) ---------->
    Route::get('/addProduct', 'addProduct')->name('addProduct');
    Route::post('/addProductToDB', 'addProductToDB')->name('addProductToDB');
    Route::get('/showProducts', 'showProducts')->name('showProducts');
    Route::get('/editProduct/{id}', 'editProduct')->name('editProduct');
    Route::post('/updateProduct/{id}', 'updateProduct')->name('updateProduct');
    Route::get('/softDeleteProduct/{id}', 'softDeleteProduct')->name('softDeleteProduct');
    Route::get('/restoreAllDeletedProducts', 'restoreAllDeletedProducts')->name('restoreAllDeletedProducts');
    Route::get('/restoreDeletedProduct/{id}', 'restoreDeletedProduct')->name('restoreDeletedProduct');
    Route::get('/forceDeleteProduct/{id}', 'forceDeleteProduct')->name('forceDeleteProduct');
    //<--------- Admin's Orders route section (CRUD) ---------->
    Route::get('/view/all/orders', 'viewAllOrders')->name('viewAllOrders');
    Route::get('/payment/paid/{id}', 'updatePaymentStatus')->name('updatePaymentStatus');
    Route::get('/product/delivered/{id}', 'updateDeliveryStatus')->name('updateDeliveryStatus');
    Route::get('/invoice/{user_id}/{order_id}','invoice');
    Route::get('/print/invoice/{user_id}/{order_id}','printIvoice');
    Route::get('/canceled/orders', 'canceledOrders')->name('viewCanceledOrders');
    Route::get('/delete/order/{id}', 'forceDeleteOrder')->name('forceDeleteOrder');
    //<--------- Admin's send email notification ---------->
    Route::get('send/email/to/user/{id}','sendEmail');
    Route::post('send/user/email/{id}','sendEmailToUser');
    //<--------- Admin's slider control section ---------->
    Route::get('slider/handler','sliderHandler')->name('slider.handler');
    Route::post('update/slider/details','updateDetails');
    //<--------- Admin's blog control section ---------->
    Route::get('/create/blog/category', 'createCategory')->name('create.blog.category');
    Route::post('/save/blog/category', 'saveCategory')->name('save.blog.category');
    Route::get('/create/blog/post', 'createPost')->name('create.blog.post');
    Route::post('/save/blog/post', 'savePost')->name('save.blog.post');
    Route::get('/show/all/posts', 'showAllPosts')->name('show.all.posts');
    Route::get('/edit/blog/post/{id}', 'editPost');
    Route::post('/update/blog/post/{id}', 'updatePost');
    Route::get('delete/blog/post/{id}', 'deletePost');
    // contact us messages
    Route::get('check/messages','checkMessages');
    Route::get('read/more/{id}','readMessage');
    Route::get('delete/message/{id}','deleteMessage');
    // testimonail manage
    Route::get('manage/testimonials','showTestimonial')->name('manage.testimonials');
    Route::get('edit/testimonial/{id}','editTestimonial');
    Route::post('update/testimonial/details/{id}','updateTestimonial');
    Route::get('create/more/testimonials','createTestimonial');
    Route::post('add/more/testimonial','addTestimonial');


});

Route::controller(StripeController::class)->group(function () {
    Route::post('/make/payment', 'makePayment');
});
Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'googlePage');
    Route::get('auth/google/callback', 'googleCallback');
});

