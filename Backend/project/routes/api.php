<?php
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
header('Access-Control-Allow-Origin: *');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/','ApiController@api');

Route::post('/login', 'LoginController@verify');
Route::post('/admin/addUser', 'UserController@insertuser');
Route::get('/admin/showUser', 'UserController@showUser');
Route::get('/admin/{id}/edit', 'UserController@edit');
Route::post('/admin/{id}/edit', 'UserController@update');
Route::post('/admin/profile/{id}', 'UserController@adminupdate');
Route::get('/admin/showuser/search/{key}', 'UserController@usersearch');
Route::get('/admin/ApproveProduct', 'ProductController@approve');
Route::get('/admin/showProduct/search/{key}', 'ProductController@adminsearch');
Route::post('/admin/status/{id}', 'ProductController@status');
Route::get('/admin/dashboard/', 'OrderController@admindashboard');
Route::post('/admin/userstatus/{id}', 'UserController@status');
Route::post('/admin/pic/{id}', 'UserController@adminimage');
// Route::group(['middleware' => 'cors'], function () {
//     Route::post('/admin/addUser', 'UserController@insertuser');
// });
// Route::group(['middleware' => 'cors'], function () {
//     Route::post('/admin/addUser', 'UserController@insertuser');
// });

//---------Seller-------------
Route::post('/seller/addProduct/{id}', 'ProductController@insert');
Route::get('/seller/showProduct/{id}', 'ProductController@show');
Route::get('/seller/showProduct/search/{id}/{key}', 'ProductController@search');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/edit/{id}', 'ProductController@update');
Route::get('/product/delete/{id}', 'ProductController@delete');
Route::get('/seller/showOrderList/{id}', 'OrderController@showOrder');
Route::get('/seller/showOrder/search/{id}/{key}', 'OrderController@search');
Route::post('/seller/showOrder/{id}', 'OrderController@track');
Route::get('/seller/profile/{id}', 'UserController@profile');
Route::post('/seller/profile/{id}', 'UserController@profileupdate');
Route::post('/seller/pic/{id}', 'UserController@profileimage');
Route::get('/seller/dashboard/{id}', 'OrderController@dashboard');
Route::get('/seller/export', 'OrderController@export');

//Buyer
Route::get('/buyer/showProduct/{id}', 'ProductController@show');
Route::get('/buyer/showProduct/search/{id}/{key}', 'ProductController@search');