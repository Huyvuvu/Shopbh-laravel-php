<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Trang chủ === http://shopbh.test/  === /
//Route sẽ đọc từ trên xuống dính thằng nào trước thì chạy thằng đó trước
//Đường dẫn tĩnh thì đặt lên trên
Route::get('/',[HomeController::class, 'index']);

//Contact
Route::get('/lien-he',[HomeController::class,'contact']);
Route::get('/sendMail',[HomeController::class, 'sendMail']);
Route::get('/anime-watching', [HomeController::class, 'anime_watching']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/blog-details', [HomeController::class, 'blog_details']);

Route::get('/dang-ky', [HomeController::class, 'sign_up']);
Route::get('/dang-nhap',[HomeController::class,'login'])->name('login');
Route::post('/dang-nhap',[HomeController::class,'login']);
Route::post('/dang-xuat',[HomeController::class,'logout']);

Route::middleware(['auth'])->group(function(){
    Route::get('/gio-hang',[CartController::class,'index']);
    Route::post('/gio-hang/them-sp-gh',[CartController::class,'addCart']);
    Route::delete('/gio-hang/xoa-sp-gh/{id}',[CartController::class,'removeCart']);
});

//  http://shopbh.test/admin/dashboard
Route::middleware(['admin'])->prefix('admin')->group(function() {
    Route::get('/dashboard',[AdminHomeController::class,'index']);
    
    Route::get('/category',[CategoryController::class,'index']);
    Route::get('/category/add',[CategoryController::class,'add']);
    Route::post('/category/add',[CategoryController::class,'add']);
    Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
    Route::post('/category/edit/{id}',[CategoryController::class,'edit']);
    Route::get('/category/delete/{id}',[CategoryController::class,'delete']);
});



//Category /{id} id là tên biến
//Tạo biến trên đường link
Route::get('/{cat}-{p?}',[ProductController::class, 'index']);

Route::get('/{cat}/{slug}', [ProductController::class, 'detail']);


