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

Route::namespace('App\Http\Controllers\Dashboard')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'LoginController@login_view')->name('d.get.login');
        Route::post('/login', 'LoginController@login')->name('d.post.login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', 'DashboardController@index')->name('d.index');

        Route::prefix('branches')->group(function () {
            Route::get('/', 'BranchController@index')->name('d.branches');
            Route::post('/country', 'BranchController@country_save')->name('d.country.save');
            Route::get('/country/{country_id}', 'BranchController@country_delete')->name('d.country.delete');
            Route::post('/', 'BranchController@branch_save')->name('d.branch.save');
            Route::get('/{branch_id}', 'BranchController@branch_delete')->name('d.branch.delete');
            Route::post('/set_default', 'BranchController@set_branch_default')->name('d.branch.set.default');
        });

        Route::prefix('dishes')->group(function () {
            Route::get('/', 'DishController@index')->name('d.dishes');
            Route::post('/{type}', 'DishController@save_type')->name('d.dishes.type.save');
            Route::get('/delete/{type}/{type_id}', 'DishController@delete_type')->name('d.dishes.type.delete');

            Route::post('/add/{type}', 'DishController@link_types')->name('d.dishes.link');
            Route::get('/remove/{type}/{dish_id}/{type_id}', 'DishController@remove_type')->name('d.dishes.remove');
        });

        Route::prefix('desserts')->group(function () {
            Route::get('/', 'DessertController@index')->name('d.desserts');
            Route::post('/{type}', 'DessertController@save_type')->name('d.desserts.type.save');
            Route::get('/delete/{type}/{type_id}', 'DessertController@delete_type')->name('d.desserts.type.delete');

            Route::post('/add/{type}', 'DessertController@link_types')->name('d.desserts.link');
            Route::get('/remove/{type}/{dessert_id}/{type_id}', 'DessertController@remove_type')->name('d.desserts.remove');
        });

        Route::prefix('drinks')->group(function () {
            Route::get('/', 'DrinkController@index')->name('d.drinks');
            Route::post('/{type}', 'DrinkController@save')->name('d.save.drink.type');
            Route::get('/{type}/{type_id}', 'DrinkController@delete')->name('d.drinks.type.delete');
        });

        Route::prefix('products')->group(function () {
            Route::get('/list', 'ProductController@list')->name('d.products.list');
            Route::get('/new', 'ProductController@new')->name('d.products.new');
            Route::post('/new', 'ProductController@save')->name('d.products.new.save');
            Route::get('/delete/{product_id}', 'ProductController@soft_delete')->name('d.product.delete');
        });

        Route::prefix('customs')->group(function () {
            Route::get('/', 'CustomController@index')->name('d.custom');
            Route::post('/{type}', 'CustomController@save_type')->name('d.custom.type.save');
            Route::get('/delete/{type}/{type_id}', 'CustomController@delete_type')->name('d.custom.type.delete');
        });

        Route::prefix('orders')->group(function () {
            Route::get('/list/{status}', 'OrderController@list')->name('get.orders.list');
            Route::get('/{order_id}', 'OrderController@view')->name('get.order.details');
            Route::get('/{order_id}/accept', 'OrderController@accept')->name('accept.order.details');
            Route::get('/{order_id}/cancel', 'OrderController@cancel')->name('cancel.order.details');
        });

        Route::prefix('reservations')->group(function () {
            Route::get('/list/{status}', 'ReservationController@list')->name('get.reservations.list');
            Route::get('/{reservation_id}/accept', 'ReservationController@accept')->name('accept.reservation');
            Route::get('/{reservation_id}/cancel', 'ReservationController@cancel')->name('cancel.reservation');
        });



        Route::get('/logout', 'LoginController@logout')->name('d.logout');
    });
});
