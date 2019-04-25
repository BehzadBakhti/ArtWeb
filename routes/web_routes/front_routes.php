<?php

Route::get('/', [
    'uses'=>'FrontEndController@index',
    'as'=>'index'
]);


Route::get('/shop', [
    'uses'=>'FrontEndController@shop',
    'as'=>'shop'
]);

Route::get('/shop/product/{id}', [
    'uses'=>'FrontEndController@singleProduct',
    'as'=>'shop.product'
]);

Route::get('/shop/category-{id}', [
    'uses'=>'FrontEndController@category',
    'as'=>'shop.category'
]);




Route::get('/blog', [
    'uses'=>'FrontEndController@blog',
    'as'=>'blog'
]);

Route::get('/blog/{slog}', [
    'uses'=>'FrontEndController@singlePost',
    'as'=>'blog.post'
]);






Route::get('/search', [
    'uses'=>'FrontEndController@search',
    'as'=>'search'
]);

Route::get('/cart', [
    'uses'=>'CartController@index',
    'as'=>'cart.index'
]);

Route::get('/cart/getContent', [
    'uses'=>'CartController@getContent',
    'as'=>'cart.getContent'
]);

Route::post('/cart/addToCart', [
    'uses'=>'CartController@addToCart',
    'as'=>'cart.addToCart'
]);

Route::post('/cart/removeFromCart', [
    'uses'=>'CartController@removeFromCart',
    'as'=>'cart.removeFromCart'
]);



/// Other Pages
Route::get('/about-us', [
    'uses'=>'FrontEndController@aboutUs',
    'as'=>'about_us'
]);


Route::get('/contact-us', [
    'uses'=>'FrontEndController@contactUs',
    'as'=>'contact_us'
]);

Route::get('/terms', [
    'uses'=>'FrontEndController@terms',
    'as'=>'terms'
]);