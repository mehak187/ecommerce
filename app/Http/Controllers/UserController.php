<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\product;

use File;
class UserController extends Controller
{
    function home() {
        $categoriesData = Category::all();
        return view('/index',['myCategories' => $categoriesData]);
    }
    function signin() {
        return view('/signin');
    }
    function signup() {
        return view('/signup');
    }
    function checkout() {
        return view('/checkout');
    }
    function saveReg(Request $req) {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
            'phone' => 'required',
            'photo' => 'required|file|mimes:jpeg,png,jpg,jfif'
        ]);

        if($req->password != $req->confirm_password) {
            return redirect('register')->with('error',"Password and Confirm Password do not match");
        }
       $photo = $req->file('photo');
       $photo_name = time() . "_" .$photo->getClientOriginalName();
       $destinationpath = public_path('myimgs');
       $photo -> move($destinationpath,$photo_name);
       
       $password = $req->password;
       $hashedPassword = bcrypt($password);

       User::create([
        'name'=> $req->name,
        'email' => $req->email,
        'phone' => $req->phone,
        'password' => $hashedPassword,
        'photo' => $photo_name,
       ]);
       return redirect('/signup')->with('success',"You are Registed successfully");
    }
    function saveLogin(Request $req) {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $data = User::where('email',$email)->get();
        if(count($data)<1) {
          return redirect('signin')->with('emailError',"Invalid Email");
        }
        else {
            $password_hash = $data[0]->password;
            if (password_verify($password, $password_hash)){
                session()->put('user',$data);
                if($email=="admin@gmail.com"){
                    return redirect('/dashboard');
                }
                return redirect('/')->with('loginSuccess',"You are Sign in succesfully");
            }
            else {
                return redirect('signin')->with('error',"Invalid Password");
            }
        }
    }
    function logout() {
        if(session('user')){
            session()->pull('user');
        }
        return redirect('/signin');
    }
    function products($id) {
        $datapro=Category::find($id);
        $data = product::leftjoin('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.category_id', '=', $datapro->id)
        ->select('products.*','categories.name as category_name')->get();
        return view('/Products',['myProducts' => $data]);
    }
    function cart() {
        return view('/cart');
    }
    function savetocart($id){
        
    }
}

