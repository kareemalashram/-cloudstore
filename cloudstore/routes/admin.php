<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    Route::group(['namespace' => 'Dashboard', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::get('logout', 'LoginController@logout')->name('admin.logout');

        Route::group(['prefix' => 'settings'], function () {

            Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethods')->name('edit.shippings.methods');
            Route::put('shipping-methods/{id}', 'SettingsController@updateShippingMethods')->name('update.shippings.methods');
        });

        Route::group(['prefix' => 'profile'], function () {

            Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
            Route::put('update', 'ProfileController@updatePerofile')->name('update.profile');
        });

        ##categories

        Route::resource('categories', 'MainCategoriesController')->except(['show']);

        ##categories

        ##subcategories

        Route::resource('subcategories', 'SubCategoriesController')->except(['show']);

        ##subcategories


        ##brands

        Route::resource('brands', 'BrandsController')->except(['show']);

        ##brands


        ##tags

        Route::resource('tags', 'TagsController')->except(['show']);

        ##tags


        ##products

        Route::resource('products', 'ProductsController')->except(['show']);

        ##products



        ##price
        Route::get('price/{id}', 'ProductsController@getPrice')->name('admin.products.price');
        Route::post('price', 'ProductsController@saveProductPrice')->name('admin.products.price.store');
        ##price#

        ##Stock
        Route::get('stock/{id}', 'ProductsController@getStock')->name('admin.products.stock');
        Route::post('stock', 'ProductsController@saveProductStock')->name('admin.products.stock.store');
        ##Stock


        ##Images

        Route::get('images/{id}', 'ProductsController@addImages')->name('admin.products.images');
        Route::post('images', 'ProductsController@saveProductImages')->name('admin.products.images.store');
        Route::post('images/db', 'ProductsController@saveProductImagesDB')->name('admin.products.images.store.db');

        ##Images



        ##attributes

        Route::resource('attributes', 'AttributesController')->except(['show']);

        ##attributes


        ##options

        Route::resource('options', 'OptionsController')->except(['show']);

        ##attributes

################################## sliders ######################################
        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', 'SliderController@addImages')->name('admin.sliders.create');
            Route::post('images', 'SliderController@saveSliderImages')->name('admin.sliders.images.store');
            Route::post('images/db', 'SliderController@saveSliderImagesDB')->name('admin.sliders.images.store.db');

        });
        ################################## end sliders    #######################################

################################## roles ######################################
        Route::group(['prefix' => 'roles'], function () {
            Route::get('/', 'RolesController@index')->name('admin.roles.index');
            Route::get('create', 'RolesController@create')->name('admin.roles.create');
            Route::post('store', 'RolesController@saveRole')->name('admin.roles.store');
            Route::get('/edit/{id}', 'RolesController@edit') ->name('admin.roles.edit') ;
            Route::post('update/{id}', 'RolesController@update')->name('admin.roles.update');
        });
        ################################## end roles ######################################
        /**
         * admins Routes
         */
        Route::group(['prefix' => 'users' , 'middleware' => 'can:users'], function () {
            Route::get('/', 'UsersController@index')->name('admin.users.index');
            Route::get('/create', 'UsersController@create')->name('admin.users.create');
            Route::post('/store', 'UsersController@store')->name('admin.users.store');
        });


        Route::group(['prefix' => 'main_Categories'], function () {

            Route::resource('categories', 'MainCategoriesController')->except(['show']);

        });


    });

    Route::group(['namespace' => 'Dashboard', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {

        Route::get('/login', 'LoginController@login')->name('admin.login');
        Route::post('/login', 'LoginController@postLogin')->name('admin.post.login');
    });


});
