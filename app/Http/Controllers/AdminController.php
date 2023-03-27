<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
use File;

class AdminController extends Controller
{
    function dashboard() {
        return view('/admin/dashboard');
    }
    function manageCategories() {
        $data = Category::all();
        return view('/admin/manageCategories',['categories' => $data]);
    }
    function addCategory() {
        return view('/admin/addCategory');
    }
    function saveCategory(Request $req) {
        $req->validate([
            'category_name' => 'required',
            'category_img' => 'required|file|mimes:jpeg,png,jpg,jfif'
        ]);
        // store img in specific path
        $photo = $req->file('category_img');
        $photo_name = time() ."_" .$photo->getClientOriginalName();
        $destinationpath = public_path('myimgs');
        $photo -> move($destinationpath,$photo_name);
        //insert category
        Category::create([
            'name' => $req->category_name,
            'photo' => $photo_name 
        ]);
        return redirect('/manageCategories')->with('success',"Category added successfully");
    }
    function updateCategory($id) {
        //get id from mng-pg edit link
        $data = Category::find($id);
        return view('admin.updateCategory',['data'=>$data]);
    }
    function editCategory(Request $req) {
        // select input value from edit form-
        if($req->file('category_img')==NULL) {
            Category::find($req->id)->update([
                    'name' => $req->category_name
                ]);
        }
        else {
            //store selected img in path
            $photo = $req->file('category_img');
            $photo_name = time() . "_" .$photo->getClientOriginalName();
            $destinationpath = public_path('myimgs');
            $photo->move($destinationpath,$photo_name);
            //delete old img
            $data=Category::find($req->id);
            $img_path = public_path("myimgs/" .$data->photo);
            if(File::exists($img_path)) {
                File::delete($img_path);
            }
            //update
            Category::find($req->id)->update([
                'name' => $req->category_name,
                'photo' => $photo_name
            ]);
        }
        return redirect('manageCategories')->with('updateSuccess',"Category updated successfully");
    }

    function deleteCategory($id) {
        //get id from mng-pg edit link
        $data=Category::find($id);
        //check if img path exist then delete img from folder
        $img_path = public_path("myimgs/" .$data->photo);
        if(File::exists($img_path)) {
            File::delete($img_path);
        }
        //delete specific row
        Category::find($id)->delete();
        return redirect('/manageCategories')->with('deleteSuccess',"Category deleted successfully");
    }
//    -------------Products---------
    function manageProducts() {
        $data = product::leftjoin('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*','categories.name as category_name')->get();
        return view('/admin/manageProducts',['products' => $data]);
    }
    function addProduct() {
        $data = Category::all();
        return view('/admin/addProduct',['categories'=>$data]);
    }
    function saveProduct(Request $req) {
        $req->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_category' => 'required',
            'product_img' => 'required|file|mimes:jpeg,png,jpg,jfif'
        ]);
        // store img in specific path
        $photo = $req->file('product_img');
        $photo_name = time() ."_" .$photo->getClientOriginalName();
        $destinationpath = public_path('myimgs');
        $photo -> move($destinationpath,$photo_name);
        //insert category
        product::create([
            'name' => $req->product_name,
            'price' => $req->product_price,
            'category_id' => $req->product_category,
            'photo' => $photo_name 
        ]);
        return redirect('/manageProducts')->with('success',"Product added successfully");
    }
    function deleteProduct($id) {
        //get id from mng-pg edit link
        $data=product::find($id);
        //check if img path exist then delete img from folder
        $img_path = public_path("myimgs/" .$data->photo);
        if(File::exists($img_path)) {
            File::delete($img_path);
        }
        //delete specific row
        product::find($id)->delete();
        return redirect('/manageProducts')->with('deleteSuccess',"Product deleted successfully");;
    }

    function updateProduct($id) {
        $catg_data = Category::all();
        $data = product::leftjoin('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*','categories.name as category_name')->where('products.id',$id)->get()->toArray();
         return view('admin/updateProduct',['data'=>$data,'categories'=>$catg_data]);
    }
    function editProduct(Request $req) {
         // select input value from edit form-
         if($req->file('product_img')==NULL) {
            product::find($req->id)->update([
                    'name' => $req->product_name,
                    'price' => $req->product_price,
                    'category_id' => $req->product_category,
            ]);
        }
        else{
            $photo = $req->file('product_img');
            $photo_name = time() . "_" .$photo->getClientOriginalName();
            $destinationpath = public_path('myimgs');
            $photo->move($destinationpath,$photo_name);
            //delete old img
            $data=product::find($req->id);
            $img_path = public_path("myimgs/" .$data->photo);
            if(File::exists($img_path)) {
                File::delete($img_path);
            }
            //update
            product::find($req->id)->update([
                'name' => $req->product_name,
                'price' => $req->product_price,
                'category_id' => $req->product_category,
                'photo' => $photo_name
            ]);
        }
        return redirect('manageProducts')->with('updateSuccess',"Category updated successfully");

    }
}
