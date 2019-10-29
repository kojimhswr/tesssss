<?php

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::group(['prefix'  =>   'regions'], function() {

            Route::get('/', 'Admin\RegionController@index')->name('admin.regions.index');
            Route::get('/create', 'Admin\RegionController@create')->name('admin.regions.create');
            Route::post('/store', 'Admin\RegionController@store')->name('admin.regions.store');
            Route::get('/{id}/edit', 'Admin\RegionController@edit')->name('admin.regions.edit');
            Route::post('/update', 'Admin\RegionController@update')->name('admin.regions.update');
            Route::get('/{id}/delete', 'Admin\RegionController@delete')->name('admin.regions.delete');

        });

        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');

            Route::post('/get-values', 'Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');
        });

        Route::group(['prefix'  =>   'ships'], function() {

            Route::get('/', 'Admin\ShipController@index')->name('admin.ships.index');
            Route::get('/create', 'Admin\ShipController@create')->name('admin.ships.create');
            Route::post('/store', 'Admin\ShipController@store')->name('admin.ships.store');
            Route::get('/{id}/edit', 'Admin\ShipController@edit')->name('admin.ships.edit');
            Route::post('/update', 'Admin\ShipController@update')->name('admin.ships.update');
            Route::get('/{id}/delete', 'Admin\ShipController@delete')->name('admin.ships.delete');

        });

        Route::group(['prefix' => 'packages'], function () {

           Route::get('/', 'Admin\PackageController@index')->name('admin.packages.index');
           Route::get('/create', 'Admin\PackageController@create')->name('admin.packages.create');
           Route::post('/store', 'Admin\PackageController@store')->name('admin.packages.store');
           Route::get('/edit/{id}', 'Admin\PackageController@edit')->name('admin.packages.edit');
           Route::post('/update', 'Admin\PackageController@update')->name('admin.packages.update');
           Route::get('/{id}/delete', 'Admin\PackageController@delete')->name('admin.packages.delete');
           Route::get('/itinerary', 'Admin\PackageController@one_way');


           Route::post('images/upload', 'Admin\PackageImageController@upload')->name('admin.packages.images.upload');
           Route::get('images/{id}/delete', 'Admin\PackageImageController@delete')->name('admin.packages.images.delete');

           Route::get('attributes/load', 'Admin\PackageAttributeController@loadAttributes');
           Route::post('attributes', 'Admin\PackageAttributeController@packageAttributes');
           Route::post('attributes/values', 'Admin\PackageAttributeController@loadValues');
           Route::post('attributes/add', 'Admin\PackageAttributeController@addAttribute');
           Route::post('attributes/delete', 'Admin\PackageAttributeController@deleteAttribute');

        });

        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
            Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
         });
    });
});


