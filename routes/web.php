<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


Route::get('/', [UserController::class,'home']);
Route::get('/signin', [UserController::class,'signin']);
Route::get('/signup', [UserController::class,'signup']);
Route::get('/products/{id}', [UserController::class,'products']);
Route::get('/cart', [UserController::class,'cart']);
Route::get('/checkout', [UserController::class,'checkout']);

Route::post('/saveReg', [UserController::class,'saveReg']);
Route::post('/saveLogin', [UserController::class,'saveLogin']);
Route::get('/logout', [UserController::class,'logout']);


// -------admin---------
Route::get('/dashboard', [AdminController::class,'dashboard']);


Route::get('/manageCategories', [AdminController::class,'manageCategories']);
Route::get('/addCategory', [AdminController::class,'addCategory']);
Route::post('/saveCategory', [AdminController::class,'saveCategory']);
Route::get('/updateCategory/{id}', [AdminController::class,'updateCategory']);
Route::post('/editCategory', [AdminController::class,'editCategory']);
Route::get('/deleteCategory/{id}', [AdminController::class,'deleteCategory']);
// ---------Products-------
Route::get('/manageProducts', [AdminController::class,'manageProducts']);
Route::get('/addProduct', [AdminController::class,'addProduct']);
Route::post('/saveProduct', [AdminController::class,'saveProduct']);
Route::get('/updateProduct/{id}', [AdminController::class,'updateProduct']);
Route::post('/editProduct', [AdminController::class,'editProduct']);
Route::get('/deleteProduct/{id}', [AdminController::class,'deleteProduct']);










