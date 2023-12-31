<?php

use App\Http\Controllers\admin\SinhvienController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/', function(){
    return view('admin.index', ['title'=>'Trang chủ']);
});

Route::get('/admin/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/login/store',[LoginController::class,'store']);

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('home', function () {
           return view('admin.index', ['title' => 'Trang chủ']); 
        });
        Route::prefix('sinhvien')->group(function () {
           Route::get('list', [SinhvienController::class, 'index']) -> name('main');
           Route::get('add', [SinhvienController::class, 'PostAdd']);
           Route::post('add/store', [SinhvienController::class, 'Add']);
           Route::get('edit/{id}', [SinhvienController::class, 'PostEdit']);
           Route::post('update/{id}', [SinhvienController::class, 'Edit']);
           Route::DELETE('delete',[SinhvienController::class,'delete']);
           Route::get('search', [SinhvienController::class, 'Search']);
           Route::post('searchAjax', [SinhvienController::class, 'ajaxSearch']);
           Route::get('list/{sl}', [SinhvienController::class, 'SelectPaginate']);
        });
    }); 
});
