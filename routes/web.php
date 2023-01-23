<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
    $posts = Post::orderBy('id','DESC')->paginate(9);
    return view('welcome',compact('posts'));
});

Auth::routes();


Route::resource('product','Admin\ProductsController');
Route::get('product_delete/{id}','Admin\ProductsController@destroy')->name('product_delete');
Route::resource('client','Admin\ClientsController');
Route::get('client_delete/{id}','Admin\ClientsController@destroy')->name('client_delete');




Route::resource('category','Admin\CategoryController');
Route::get('category_delete/{id}','Admin\CategoryController@destroy')->name('category_delete');


Route::resource('setting','Admin\SettingsController');


Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('post','Admin\PostController@index')->name('post');
    Route::get('post_add','Admin\PostController@post_add')->name('post_add');
    Route::POST('post_store','Admin\PostController@post_store')->name('post_store');
    Route::get('post_delete/{id}','Admin\PostController@post_delete')->name('post_delete');
    Route::get('post_edit/{id}','Admin\PostController@post_edit')->name('post_edit');
    Route::POST('post_update/{id}','Admin\PostController@post_update')->name('post_update');
    Route::get('comment_delete/{id}','Admin\PostController@comment_delete')->name('comment_delete');

    
    Route::get('comment_list','Admin\PostController@comment_list')->name('comment_list');
});


Route::group(['middleware' => 'is_admin'], function()
{
    Route::get('front_home','FrontController@front_home')->name('front_home');
    Route::get('blog_details/{id}','FrontController@blog_details')->name('blog_details');   
    Route::POST('comment','FrontController@comment')->name('comment');   
    
    
});
// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');



//front_login
route::get('front_login','FrontController@front_login')->name('front_login');
route::get('front_register','FrontController@front_register')->name('front_register');
route::POST('front_register_store','FrontController@front_register_store')->name('front_register_store');
route::POST('front_login_route','FrontController@front_login_route')->name('front_login_route');


Route::get('admin_dashboard','Admin\AdminController@admin_dashboard')->name('admin_dashboard');
Route::get('invoice','Admin\AdminController@invoice')->name('invoice');
Route::get('invoice_data','Admin\AdminController@invoice_data')->name('invoice_data');
Route::get('invoice_show/{id}','Admin\AdminController@invoice_show')->name('invoice_show');
Route::get('invoice_delete/{id}','Admin\AdminController@invoice_delete')->name('invoice_delete');


Route::get('pdfview_download','Admin\AdminController@pdfview_download')->name('pdfview_download');
Route::POST('invoice_submit','Admin\AdminController@invoice_submit')->name('invoice_submit');
Route::get('pdf_delevery_ganrate','Admin\AdminController@pdf_delevery_ganrate')->name('pdf_delevery_ganrate');
Route::get('pdf_delevery_ganratewith_id/{id}','Admin\AdminController@pdf_delevery_ganratewith_id')->name('pdf_delevery_ganratewith_id');


// admin  