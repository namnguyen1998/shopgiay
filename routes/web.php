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
//Shop Frontend
Route::get('/', 'HomeController@index');
Route::get('/trangsanpham','HomeController@trangsanpham');
Route::get('chitietsanpham/{id}','SanphamController@chitietsanpham');


Route::post('/timkiem','SanphamController@timkiemsanpham');
Route::get('/ajax','SanphamController@ajaxtimkiem');


//Admin Backend
Route::get('/admin', 'AdminController@getIndex');
Route::get('/dashboard','AdminController@showDashboard');
Route::post('/admin-dashboard','AdminController@login');
Route::get('/logout','AdminController@logout');
// Route::get('')


//Modulde
//Loại
Route::get('/them-loai-san-pham','LoaisanphamController@themlsp');
Route::post('/save-loai-san-pham','LoaisanphamController@save_loaisp');


Route::get('/danh-sach-loai-san-pham','LoaisanphamController@dslsp');

Route::get('/delete-loai-san-pham/{id_loaisp}','LoaisanphamController@delete_loaisp');


Route::get('/edit-loai-san-pham/{id_loaisp}','LoaisanphamController@edit_loaisp');
Route::post('/update-loai-san-pham/{id_loaisp}','LoaisanphamController@update_loaisp');
//Hãng 
Route::get('/danh-sach-hang-san-xuat','HangsxController@dshsx');


Route::get('/them-hang-san-xuat','HangsxController@themhsx');
Route::post('/save-hang-san-xuat','HangsxController@save_hsx');

Route::get('/delete-hang-san-xuat/{id_hang}','HangsxController@delete_hangsx');


Route::get('/edit-hang-san-xuat/{id_hang}','HangsxController@edit_hangsx');
Route::post('/update-hang-san-xuat/{id_hang}','HangsxController@update_hangsx');
//User
Route::get('/danh-sach-user','UserController@danhsachuser');
Route::get('/login','UserController@getIndex');
//Sản phẩm
Route::get('/danh-sach-san-pham','SanphamController@danhsachsanpham');
Route::resource('/them-san-pham', 'CKEditorController');
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
Route::get('/them-san-pham','SanphamController@themsanpham');




//Đơn hàng
Route::get('/danh-sach-don-hang','DonhangController@danhsachdonhang');
//Tồn kho
Route::get('/danh-sach-ton-kho','TonkhoController@danhsachtonkho');
Route::get('/phieu-nhap','TonkhoController@phieunhap');
Route::get('/report','TonkhoController@report');
Route::get('/trang-thai-don-hang', 'DonhangController@trangthaidonhang');

