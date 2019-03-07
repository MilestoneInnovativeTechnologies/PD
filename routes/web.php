<?php

Route::group([
    'namespace' => 'Milestone\\PD\\Controller'
],function(){
    Route::view('/', 'pd::products_index')->name('home');
    Route::get('product/{id}', 'ProductController@detail')->name('product.detail');
    Route::get('wishlist', 'WishListController@page')->name('wishlist');
    Route::get('wishlist/{id}', 'WishListController@detail')->name('wishlist.detail');
    Route::get('wishlist/delete/{id}', 'WishListController@delete')->name('wishlist.delete');
    Route::post('visitor_store', 'VisitorController@store')->name('store.visitor');
    Route::post('visitor_clear', 'VisitorController@clear')->name('clear.visitor');
    Route::post('wishlist', 'WishListController@store');
    Route::post('wishlist_addproduct', 'WishListController@product')->name('wishlist.add.product');
    Route::post('wishlist_note', 'WishListController@note')->name('add.note');
    Route::post('wishlist_share', 'WishListController@share')->name('share');
    Route::get('wishlist_share_alter', 'WishListController@alter')->name('share.alter');
    Route::post('wishlist_product_alter', 'WishListController@edit')->name('product.alter');
    Route::post('wishlistproduct_note', 'WishListProductController@note')->name('wlp.note');
    Route::get('in/{code}', 'WishListController@in')->name('share.in');

    Route::group([
        'prefix' => 'api',
        'namespace' => 'API',
        'middleware' => '\App\Http\Middleware\Cors'
    ],function(){
        Route::group([
            'prefix' => 'user/{user}',
        ],function(){
            Route::get('/','VisitorController@visitor');
            Route::get('create_wishlist','WishListController@create');
            Route::get('update','VisitorController@update');
            Route::get('wishlist/{wl}/delete','WishListController@delete');
            Route::get('wishlist/{wl}/product/{product}/add','WishListController@product_add');
            Route::get('wishlist/{wl}/product/{product}/remove','WishListController@product_remove');
            Route::get('wishlist/{wl}/share','WishListController@share');
            Route::get('wishlist/{wl}/note','WishListController@note');
            Route::get('wishlist/{wl}/vendor/{status}','WishListController@vendor');
        });
        Route::get('/','AppController@init');
        Route::get('init','AppController@init');
        Route::get('register','VisitorController@register');
        Route::get('index','AppController@index');
        Route::get('product','ProductController@detail');
        Route::get('user','VisitorController@detail');
        Route::get('wishlist','WishListController@detail');
    });
});

Route::group([
    'namespace' => 'Milestone\\PD\\Controller\\Interact',
    'prefix' => 'interact'
],function(){
    Route::get('/',function(){ return '<form method="post" enctype="multipart/form-data"><input type="file" name="file"><input type="submit"></form>'; });
    Route::post('/','InteractController@index');
});
