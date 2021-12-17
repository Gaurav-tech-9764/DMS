<?php

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
Route::get('/sample', function () {
    return view('sampletest');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/admin/users','Admin\UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'AuthController@index')->name('login');
Route::post('/post-login', 'AuthController@postLogin')->name('post-login'); 
Route::get('/registration', 'AuthController@registration')->name('registration');
Route::post('/post-registration', 'AuthController@postRegistration')->name('post-registration'); 
Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard'); 
Route::get('/logout', 'AuthController@logout')->name('logout');

// Route::post('/login', 'Auth\yyLoginController@login')->name('checklogin');
Route::get('/userlist', 'Admin\UserController@show')->name('userlist');
Route::get('/addUser', 'Admin\UserController@addUser')->name('addUser');
Route::POST('/createUser', 'Admin\UserController@create')->name('createUser');

Route::get('/userlist/delete/{id}', 'Admin\UserController@destroy')->name('Delete');

Route::get('/userlist/profile', 'Admin\UserController@userprofile')->name('userprofile');

Route::post('/userlist/Update/{id}', 'Admin\UserController@update')->name('Update');
Route::GET('/userlist/EditUser/{id}', 'Admin\UserController@getuser')->name('getuser');
Route::post('/userlist/uploadimage/{id}', 'Admin\UserController@uploadimage')->name('uploadimage');

////Routes For Sales User category
 
Route::get('/category', 'Admin\UserController@category')->name('category'); 

Route::post('/category/AddCategory', 'Admin\UserController@Addcategory')->name('Addcategory'); 
Route::GET('/category/EditCategory/{id}', 'Admin\UserController@Editcategory')->name('Editcategory'); 
Route::POST('/category/UpdateCategory/{id}', 'Admin\UserController@UpdateCategory')->name('UpdateCategory'); 
Route::GET('/category/DeleteCategory/{id}', 'Admin\UserController@DeleteCategory')->name('DeleteCategory'); 

////Routes For Sales User product

Route::get('/products', 'Admin\UserController@products')->name('products'); 
Route::post('/products/Addproducts', 'Admin\UserController@Addproducts')->name('Addproducts'); 
Route::GET('/products/Editproducts/{id}', 'Admin\UserController@Editproducts')->name('Editproducts'); 
Route::POST('/products/Updateproducts/{id}', 'Admin\UserController@Updateproducts')->name('Updateproducts'); 
Route::GET('/products/Deleteproducts/{id}', 'Admin\UserController@Deleteproducts')->name('Deleteproducts'); 