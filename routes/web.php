<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rute za pregled telefona po kategorijama i prikaz telefona
Route::get('/phones/{id}/all','App\Http\Controllers\PhoneIndexController@index')->name('phone.index.all');
Route::get('/phones/{phone}/show','App\Http\Controllers\PhoneIndexController@show')->name('phone.index.show');

//rute za pregled tableta po kategorijama i prikaz tableta
Route::get('/tablets/{id}/all','App\Http\Controllers\TabletIndexController@index')->name('tablet.index.all');
Route::get('/tablets/{tablet}/show','App\Http\Controllers\TabletIndexController@show')->name('tablet.index.show');

//rute za pregled opreme po kategorijama i prikaz opreme
Route::get('/equipment/{id}/all','App\Http\Controllers\EquipmentIndexController@index')->name('equipment.index.all');
Route::get('/equipment/{equipment}/show','App\Http\Controllers\EquipmentIndexController@show')->name('equipment.index.show');

//dodavanje telefona, tableta i opreme u korpu
Route::get('/add-to-cart/phone/{id}','App\Http\Controllers\PhoneIndexController@getAddToCart')->name('phone.addToCart');
Route::get('/add-to-cart/tablet/{id}','App\Http\Controllers\TabletIndexController@getAddToCart')->name('tablet.addToCart');
Route::get('/add-to-cart/equipment/{id}','App\Http\Controllers\EquipmentIndexController@getAddToCart')->name('equipment.addToCart');

//rute za pregled korpe, izvrsenje narudzbe i mijenjanje kolicina unutar korpe
Route::get('/shopping-cart','App\Http\Controllers\ShoppingCartController@getCart')->name('shopping.cart');
Route::get('/checkout','App\Http\Controllers\ShoppingCartController@getCheckout')->name('checkout');
Route::post('/checkout','App\Http\Controllers\ShoppingCartController@postCheckout')->name('checkout');
Route::get('reduce/{id}','App\Http\Controllers\HomeController@getReduceByOne')->name('reduce.one.article');
Route::get('add/{id}','App\Http\Controllers\HomeController@getAddOne')->name('add.one.article');
Route::get('remove/{id}','App\Http\Controllers\HomeController@getRemoveItem')->name('remove.article');

//ruta za pregled profila i uredjivanje profila
Route::get('/profil','App\Http\Controllers\HomeController@profil')->name('profil');
Route::get('/profil/{user}/edit','App\Http\Controllers\HomeController@profiledit')->name('profiledit');
Route::patch('/profil/{user}/update','App\Http\Controllers\HomeController@profilupdate')->name('profilupdate');

//pregled narudzbi za prijavljenog korisnika
Route::get('/myorders','App\Http\Controllers\HomeController@orders')->name('myorders');

//ruta za pretragu proizvoda po nazivu
Route::get('/search/product','App\Http\Controllers\SearchController@search')->name('search');
Route::get('/filter/product/{input}','App\Http\Controllers\SearchController@filter')->name('filter');

//filtriranje prikazanih proizvoda
Route::get('/filter/phones/{id}','App\Http\Controllers\PhoneIndexController@filter')->name('filter.phone');
Route::get('/filter/tablet/{id}','App\Http\Controllers\TabletIndexController@filter')->name('filter.tablet');
Route::get('/filter/equipment/{id}','App\Http\Controllers\EquipmentIndexController@filter')->name('filter.equipment');

Route::middleware(['admin:Admin,Prodavac','auth'])-> group(function (){
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');

    //rute za kategorije za telefone i tablete
    Route::get('/admin/category/create','App\Http\Controllers\CategoryController@create')->name('category.create');
    Route::post('/admin/category','App\Http\Controllers\CategoryController@store')->name('category.store');
    Route::get('/admin/category','App\Http\Controllers\CategoryController@index')->name('category.index');
    Route::get('/admin/category/{category}/edit','App\Http\Controllers\CategoryController@edit')->name('category.edit');
    Route::patch('/admin/category/{category}/update','App\Http\Controllers\CategoryController@update')->name('category.update');
    Route::delete('/admin/category/{category}/destroy','App\Http\Controllers\CategoryController@destroy')->name('category.destroy');

    //rute za kategorije za opremu
    Route::get('/admin/category/equipment/create','App\Http\Controllers\CategoryEquipmentController@create')->name('category.equipment.create');
    Route::post('/admin/category/equipment','App\Http\Controllers\CategoryEquipmentController@store')->name('category.equipment.store');
    Route::get('/admin/category/equipment','App\Http\Controllers\CategoryEquipmentController@index')->name('category.equipment.index');
    Route::get('/admin/category/equipment/{categoryEquipment}/edit','App\Http\Controllers\CategoryEquipmentController@edit')->name('category.equipment.edit');
    Route::patch('/admin/category/equipment/{categoryEquipment}/update','App\Http\Controllers\CategoryEquipmentController@update')->name('category.equipment.update');
    Route::delete('/admin/category/equipment/{categoryEquipment}/destroy','App\Http\Controllers\CategoryEquipmentController@destroy')->name('category.equipment.destroy');

    //rute za rad sa telefonom
    Route::get('/admin/phone/create','App\Http\Controllers\PhoneController@create')->name('phone.create');
    Route::post('/admin/phone','App\Http\Controllers\PhoneController@store')->name('phone.store');
    Route::get('/admin/phone','App\Http\Controllers\PhoneController@index')->name('phone.index');
    Route::get('/admin/phone/{phone}/edit','App\Http\Controllers\PhoneController@edit')->name('phone.edit');
    Route::patch('/admin/phone/{phone}/update','App\Http\Controllers\PhoneController@update')->name('phone.update');
    Route::delete('/admin/phone/{phone}/destroy','App\Http\Controllers\PhoneController@destroy')->name('phone.destroy');

    //rute za rad sa opremom
    Route::get('/admin/equipment/create','App\Http\Controllers\EquipmentController@create')->name('equipment.create');
    Route::post('/admin/equipment','App\Http\Controllers\EquipmentController@store')->name('equipment.store');
    Route::get('/admin/equipment','App\Http\Controllers\EquipmentController@index')->name('equipment.index');
    Route::get('/admin/equipment/{equipment}/edit','App\Http\Controllers\EquipmentController@edit')->name('equipment.edit');
    Route::patch('/admin/equipment/{equipment}/update','App\Http\Controllers\EquipmentController@update')->name('equipment.update');
    Route::delete('/admin/equipment/{equipment}/destroy','App\Http\Controllers\EquipmentController@destroy')->name('equipment.destroy');

    //rute za rad sa tabletima
    Route::resource('/admin/tablet','App\Http\Controllers\TabletController');

    //rute za pregled narudzbi i rute za rad sa korisnicima
    Route::get('/admin/allorders','App\Http\Controllers\AdminController@allorders')->name('all.orders');
    Route::get('/admin/users','App\Http\Controllers\AdminController@allusers')->name('all.users');
    Route::get('/admin/admins','App\Http\Controllers\AdminController@alladmins')->name('all.admins');
    Route::delete('/admin/delete/{user}','App\Http\Controllers\AdminController@destroyUser')->name('user.destroy');
    Route::put('admin/users/{user}/attach','App\Http\Controllers\AdminController@attach')->name('user.role.attach');
    Route::put('admin/users/{user}/detach','App\Http\Controllers\AdminController@detach')->name('user.role.detach');
});







