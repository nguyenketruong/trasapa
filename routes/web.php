<?php

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
Route::get('index',[
	'as' => 'trang-chu','uses'=>'PageController@getIndex']);
Route::get('loai-san-pham/{type}',[
	'as' => 'loaisanpham','uses'=>'PageController@getLoaisp']);
Route::get('chitiet-san-pham/{id}',[
	'as' => 'chitietsanpham','uses'=>'PageController@getChiTietsp']);
Route::get('gioi-thieu',[
	'as' => 'gioithieu','uses'=>'PageController@getGioithieu']);
Route::get('lien-he',[
	'as' => 'lienhe','uses'=>'PageController@getLienhe']);
Route::get('add-to-Cart/{id}',[
	'as' => 'themgiohang','uses'=>'PageController@getAddtoCart']);
Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);
Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);
Route::get('dang-ki',[
	'as'=>'signup',
	'uses'=>'PageController@getSignup'
]);
Route::post('dang-ki',[
	'as'=>'signup',
	'uses'=>'PageController@postSignin'
]);
 Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);
Route::get('Tim-Kiếm',[
	'as'=>'timkiem',
	'uses'=>'PageController@getTimkiem'
]);
Route::get('Giỏ-Hàng',[
	'as'=>'giohang',
	'uses'=>'PageController@getGiohang'
]);
Route::get('Error',[
	'as'=>'loi',
	'uses'=>'PageController@getLoi'
]);
Route::get('home',function()
{
	return view ('Admin.page.home');
});
