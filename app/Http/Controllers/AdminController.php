<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Order;
use App\Models\Products;
use Alert;
use App\Models\BlogCategories;
use App\Models\BlogPosts;
use App\Models\ContactUs;
use App\Notifications\EcomNotification;
use Notification;
use PDF;
use App\Models\SliderDetails;
use App\Models\Testimonial;

// namespaces //


class AdminController extends Controller
{
    // Admin's Categories functions
    public function viewCategoryPage()
    {
        return view('admin.addCategories');
    }
    public function showCategories()
    {
        $categories = Categories::all();
        $data = compact('categories');
        return view('admin.viewCategories')->with($data);
    }
    public function addCategory(Request $request)
    {
        $request->validate([
            'category' => ['required'],
            'categoryDesc' => ['required'],
            'categoryImage' => ['required'],
        ]);
        $catTable = new Categories;
        $categoryName = $request['category'];
        $categoryDesc = $request['categoryDesc'];
        $fileNameWithExtention = $request->file('categoryImage')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileExtention = $request->file('categoryImage')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
        $request->categoryImage->move(public_path('category-images/'), $fileNameToStore);
        $catTable->category = $categoryName;
        $catTable->description = $categoryDesc;
        $catTable->image = $fileNameToStore;
        $catTable->save();
        return redirect()->back()->with('message', 'Category Added Successfully.');
    }
    public function editCategory($id)
    {
        $categoryToBeEdit = Categories::find($id);
        $data = compact('categoryToBeEdit');
        return view('admin.editCat')->with($data);
    }
    public function saveEditedCat(Request $request, $id)
    {
        $request->validate([
            'editedCategory' => ['Required'],
            'editedDescription' => ['Required'],
            // 'editedImage' => ['Required'],
        ]);
        $categoryToBeSaved = Categories::find($id);
        $categoryName = $request->editedCategory;
        $categoryImgName = $categoryToBeSaved->image;
        $imgName = $request->editedImage;
        $categoryToBeSaved->category = $request->editedCategory;
        $categoryToBeSaved->description = $request->editedDescription;
        // if user do not want to update image
        if ($imgName != NULL) {
            unlink('category-images/' . $categoryImgName);
            $fileNameWithExtention = $request->file('editedImage')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
            $fileExtention = $request->file('editedImage')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
            $request->editedImage->move(public_path('category-images/'), $fileNameToStore);
            $categoryToBeSaved->image = $fileNameToStore;
        } else {
            $categoryToBeSaved->image = $categoryImgName;
        }
        $categoryToBeSaved->save();
        Alert::success('Success', 'Your Category has been Updated Successfylly.');
        return redirect()->back();
    }
    // Soft Delete A category
    public function softDeleteCat($id)
    {
        $catToDelete = Categories::find($id);
        $catToDelete->delete();
        Alert::success('Success', 'Item Has Been Moved To Trash Successfully.');
        return redirect()->back();
    }
    // view Trash for Categories
    public function viewTrash()
    {
        $allDeletedCats = Categories::onlyTrashed()->get();
        $allDeletedProducts = Products::onlyTrashed()->get();
        $data = compact('allDeletedCats', 'allDeletedProducts');
        return view('admin.viewTrash')->with($data);
    }
    // restore a deleted item
    public function restoreDeletedCategory($id)
    {
        Categories::withTrashed()->find($id)->restore();
        Alert::success('Success', 'Item Has Been Restored Successfully.');
        return redirect()->back();
    }
    // restore all deleted item
    public function restoreAllDeletedCats()
    {
        $deletedCats =  Categories::onlyTrashed()->restore();
        if ($deletedCats == NULL) {
            Alert::error('error', 'No Items were found to restore.');
        } else {
            Alert::success('Success', 'All Items Have Been Restored Successfully.');
        }
        return redirect()->back();
    }
    // permanently delete an item
    public function forceDelete($id)
    {
        $trashedCategory = Categories::withTrashed()->find($id);
        $trashedCategoryName = $trashedCategory->category;
        $trashedCategoryImg = $trashedCategory->image;
        unlink('category-images/' . $trashedCategoryImg);
        $trashedCategory->forceDelete();
        Alert::success('Success', 'Item Has Been Deleted Successfully.');
        return redirect()->back();
    }
    // categories work has ended
    // <----- Now Working with Products ----->
    public function addProduct()
    {
        $categories = Categories::all();
        $data = compact('categories');
        return view('admin.addProduct')->with($data);
    }
    public function addProductToDB(Request $request)
    {
        $request->validate([
            'productName' => ['Required'],
            'productDesc' => ['Required'],
            'productImage' => ['Required'],
            'productPrice' => ['Required'],
            'productQty' => ['Required'],
            'category' => ['Required'],
        ]);
        // to get the current category name for making a folder name to save the product's image
        $categoryId = $request->category;
        $categoryName = Categories::find($categoryId);
        $categoryName = $categoryName->category;
        $fileNameWithExtention = $request->file('productImage')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileExtention = $request->file('productImage')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
        $request->productImage->move(public_path('product-images/'), $fileNameToStore);
        $productTobeUpdated = new Products();
        $productTobeUpdated->category_name = $categoryName;
        $productTobeUpdated->title = $request->productName;
        $productTobeUpdated->description = $request->productDesc;
        $productTobeUpdated->price = $request->productPrice;
        if ($productTobeUpdated->price < 0) {
            Alert::error('Error', 'Product price must be greater than zero.');
            return redirect()->back();
            die();
        }
        $productTobeUpdated->quantity = $request->productQty;
        if ($productTobeUpdated->quantity < 0) {
            Alert::error('Error', 'Product Quantity must be greater than zero.');
            return redirect()->back();
            die();
        }
        $productTobeUpdated->categories_id = $request->category;
        $productTobeUpdated->discount_price = $request->discountPrice;
        if ($productTobeUpdated->discount_price < 0) {
            Alert::error('Error', 'Discount Price must be greater than zero.');
            return redirect()->back();
            die();
        }
        $productTobeUpdated->image = $fileNameToStore;
        $productTobeUpdated->save();
        Alert::success('Success', 'Product Has Been Added Successfully.');
        return redirect()->back();
    }
    public function showProducts()
    {
        $products = Products::all();
        $data = compact('products');
        return view('admin.viewProducts')->with($data);
    }
    public function editProduct($id)
    {
        $product = Products::find($id);
        $categories = Categories::all();
        $data = compact('product', 'categories');
        return view('admin.editProduct')->with($data);
    }
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'editProductName' => ['Required'],
            'editProductDesc' => ['Required'],
            // 'editProductImage' => ['Required'],
            'editProductPrice' => ['Required'],
            'editProductQty' => ['Required'],
            'editCategory' => ['Required'],
        ]);
        $productTobeUpdated = Products::find($id);
        $productImg = $productTobeUpdated->image;
        // $categoryName = $productTobeUpdated->category_name;
        // if user wants to update image
        if ($request->editProductImage) {
            unlink('product-images/' . $productImg);
            $fileNameWithExtention = $request->file('editProductImage')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
            $fileExtention = $request->file('editProductImage')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
            $request->editProductImage->move(public_path('product-images/'), $fileNameToStore);
            $productTobeUpdated->image = $fileNameToStore;
        }
        // if user do not want to update the image
        else {
            $productTobeUpdated->image = $productImg;
        }
        $catId = $request->editCategory;
        $getUpdateCategory = Categories::find($catId);
        $getNameOfCategory = $getUpdateCategory->category;
        $productTobeUpdated->category_name = $getNameOfCategory;
        $productTobeUpdated->title = $request->editProductName;
        $productTobeUpdated->description = $request->editProductDesc;
        $productTobeUpdated->price = $request->editProductPrice;
        if ($productTobeUpdated->price < 0) {
            Alert::error('Error', 'Product price must be greater than zero.');
            return redirect()->back();
            die();
        }
        $productTobeUpdated->quantity = $request->editProductQty;
        if ($productTobeUpdated->quantity < 0) {
            Alert::error('Error', 'Product Quantity must be greater than zero.');
            return redirect()->back();
            die();
        }
        $productTobeUpdated->categories_id = $request->editCategory;
        $productTobeUpdated->discount_price = $request->editDiscountPrice;
        if ($productTobeUpdated->discount_price < 0) {
            Alert::error('Error', 'Discount Price must be greater than zero.');
            return redirect()->back();
            die();
        }
        $productTobeUpdated->save();
        Alert::success('Success', 'Product Has Been Updated Successfully.');
        return redirect()->back();
    }
    public function softDeleteProduct($id)
    {
        $productTobeDeleted = Products::find($id);
        $productTobeDeleted->delete();
        Alert::success('Success', 'Product Has Been Deleted Successfully.');
        return redirect()->back();
    }
    public function restoreDeletedProduct($id)
    {
        Products::withTrashed()->find($id)->restore();
        Alert::success('Success', 'Product Has Been Restored Successfully.');
        return redirect()->back();
    }
    public function forceDeleteProduct($id)
    {
        $trashedProduct = Products::withTrashed()->find($id);
        $trashedCategoryName = $trashedProduct->category_name;
        $trashedProductImg = $trashedProduct->image;
        unlink('product-images/' . $trashedProductImg);
        $trashedProduct->forceDelete();
        Alert::success('Success', 'Item Has Been Deleted Successfully.');
        return redirect()->back();
    }
    public function restoreAllDeletedProducts()
    {
        $deletedProducts =  Products::onlyTrashed()->restore();
        if ($deletedProducts == NULL) {
            Alert::error('error', 'No Items were found to restore.');
        } else {
            Alert::success('Success', 'All Items Have Been Restored Successfully.');
        }
        return redirect()->back();
    }
    // order section
    public function viewAllOrders()
    {
        $orders = Order::all();
        $data = compact('orders');
        return view('admin.all-orders')->with($data);
    }
    public function updatePaymentStatus($id)
    {
        $order = Order::find($id);
        $order->payment_status = 'paid';
        $order->save();
        Alert::success('success', 'payment status updated successfully.');
        return redirect()->back();
    }
    public function updateDeliveryStatus($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'delivered';
        $order->save();
        Alert::success('success', 'delivery status updated successfully.');
        return redirect()->back();
    }

    public function invoice($user_id, $order_id)
    {
        $orderData = Order::find($order_id);
        $orderCollection = Order::where('user_id', '=', $user_id)->get();
        $data = compact('orderCollection', 'orderData');
        return view('admin.invoice')->with($data);
    }
    public function printIvoice($user_id, $order_id)
    {
        $orderData = Order::find($order_id);
        $orderCollection = Order::where('user_id', '=', $user_id)->get();
        $data = compact('orderCollection', 'orderData');
        view()->share('Order', $data);
        $pdf = PDF::loadView('admin.invoice', $data);
        return $pdf->download('order-details.pdf');
    }
    // send email
    public function sendEmail($id)
    {
        $userData = Order::find($id);
        $data = compact('userData');
        return view('admin.send-email')->with($data);
    }
    public function sendEmailToUser(Request $request, $id)
    {
        $email = Order::find($id)->user_email;
        $details = [
            'greeting' => $request->greeting,
            'firstLine' => $request->firstLine,
            'body' => $request->emailBody,
            'button' => $request->emailButton,
            'url' => $request->emailUrl,
            'lastLine' => $request->emailLastLine,
        ];
        // $var = Notification::send($order , new EcomNotification($details));
        Notification::route('mail', $email)->notify(new EcomNotification($details));
        Alert::success('success', 'Email sent successfully');
        return redirect()->back();
    }
    public function sliderHandler()
    {
        $sliderDetails = SliderDetails::find(1);
        $data = compact('sliderDetails');
        return view('admin.slider-handler')->with($data);
    }
    public function updateDetails(Request $request)
    {
        $sliderDetails = SliderDetails::find(1);
        $sliderDetails->heading1 = $request->heading1;
        $sliderDetails->detail1 = $request->detail1;
        $sliderDetails->heading2 = $request->heading2;
        $sliderDetails->detail2 = $request->detail2;
        $sliderDetails->heading3 = $request->heading3;
        $sliderDetails->detail3 = $request->detail3;
        $sliderDetails->save();
        ALert::success('success', 'Slider details updated successfully.');
        return redirect()->back();
    }
    // blog posts section
    public function createCategory()
    {
        return view('admin.create-blog-category');
    }
    public function saveCategory(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'categoryDesc' => 'required',
        ]);
        $newBlogCat = new BlogCategories();
        $newBlogCat->category_name = $request->category;
        $newBlogCat->category_description = $request->categoryDesc;
        $newBlogCat->save();
        Alert::success('success', 'Blog category created successfully.');
        return redirect()->back();
    }
    public function createPost()
    {
        $blogCats = BlogCategories::all();
        $data = compact('blogCats');
        return view('admin.create-post')->with($data);
    }
    public function savePost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $newPost = new BlogPosts();
        $fileNameWithExtention = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileExtention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
        $request->image->move(public_path('blog-post-images/'), $fileNameToStore);
        $newPost->post_image = $fileNameToStore;
        $newPost->post_title = $request->title;
        $newPost->post_description = $request->description;
        $newPost->category_id = $request->category;
        $newPost->save();
        Alert::success('success', 'post created successfully.');
        return redirect()->back();
    }
    public function showAllPosts()
    {
        $posts = BlogPosts::all();
        $data = compact('posts');
        return view('admin.all-blog-posts')->with($data);
    }
    public function editPost($id)
    {
        $blogCats = BlogCategories::all();
        $post = BlogPosts::find($id);
        $data = compact('post', 'blogCats');
        return view('admin.update-post')->with($data);
    }
    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $updtePost = BlogPosts::find($id);
        $postImage = $updtePost->post_image;
        if ($request->image) {
            unlink('blog-post-images/' . $postImage);
            $fileNameWithExtention = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
            $fileExtention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
            $request->image->move(public_path('blog-post-images/'), $fileNameToStore);
            $updtePost->post_image = $fileNameToStore;
        }
        else{
            $updtePost->post_image = $postImage;
        }
        $updtePost->post_title = $request->title;
        $updtePost->post_description = $request->description;
        $updtePost->category_id = $request->category;
        $updtePost->save();
        Alert::success('success', 'post updated successfully.');
        return redirect('/edit/blog/post/' . $id);
    }
    public function deletePost($id){
        $post = BlogPosts::find($id);
        $post->delete();
        Alert::success('success', 'post deleted successfully.');
        return redirect()->back();
    }
    //  message section
    public function checkMessages(){
        $messages = ContactUs::all();
        $data = compact('messages');
        return view('admin.check-messages')->with($data);
    }
    public function readMessage($id){
        $message = ContactUs::find($id);
        $data = compact('message');
        return view('admin.read-more-message')->with($data);
    }
    public function deleteMessage($id){
        $message = ContactUs::find($id);
        $message->delete();
        Alert::success('success','Message deleted successfully.');
        return redirect()->back();
    }
    // testimonial manage
    public function showTestimonial(){
        $testimonials = Testimonial::all();
        $data = compact('testimonials');
        return view('admin.testimonial-handler')->with($data);
    }
    public function editTestimonial($id){
        $testimonialDetails = Testimonial::find($id);
        $testimonials = Testimonial::all();
        $data = compact('testimonials','testimonialDetails');
        return view('admin.testimonial-handler')->with($data);
    }
    public function updateTestimonial(Request $request,$id){
        $testimonial = Testimonial::find($id);
        $testimonialImage = $testimonial->image;
        if ($request->image) {
            unlink('testimonial-images/' . $testimonialImage);
            $fileNameWithExtention = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
            $fileExtention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
            $request->image->move(public_path('testimonial-images/'), $fileNameToStore);
            $testimonial->image = $fileNameToStore;
        }
        else{
            $testimonial->image = $testimonialImage;
        }
        $testimonial->designation = $request->designation;
        $testimonial->detail = $request->detail;
        $testimonial->name = $request->name;
        $testimonial->save();
        ALert::success('success', 'Testimonial details updated successfully.');
        return redirect()->back();
    }
    public function createTestimonial(){
        $testimonials = Testimonial::all();
        $data = compact('testimonials');
        return view('admin.testimonial-handler')->with($data);
    }
    public function addTestimonial(Request $request){
        $request->validate([
            'designation' => 'required',
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required',
        ]);
        $testimonial = new Testimonial;
        $fileNameWithExtention = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
        $fileExtention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtention;
        $request->image->move(public_path('testimonial-images/'), $fileNameToStore);
        $testimonial->image = $fileNameToStore;
        $testimonial->designation = $request->designation;
        $testimonial->detail = $request->detail;
        $testimonial->name = $request->name;
        $testimonial->save();
        ALert::success('success', 'Testimonial added successfully.');
        return redirect()->back();
    }
}