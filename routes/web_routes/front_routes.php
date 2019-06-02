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

Route::post('/shop/product/addReview/{id}', [
'middleware'=>'auth',
'uses'=>'ReviewsController@store',
'as'=>'shop.product.addReview'
]);
// AJAX CALLS ********************************************************** */
Route::get('/shop/ajax/{sortBy}', [
    'uses'=>'AjaxFrontEndController@ajaxShop',
    'as'=>'ajax-shop'
]);



Route::get('/shop/ajax/category-{id}/{sortBy}', [
    'uses'=>'AjaxFrontEndController@ajaxCategory',
    'as'=>'shop.ajax-category'
]);


Route::get('/shop/ajax/product/{id}', [
    'uses'=>'AjaxFrontEndController@ajaxReviews',
    'as'=>'shop.ajax.product'
]);

//********************************************************* */

Route::get('/blog', [
    'uses'=>'FrontEndController@blog',
    'as'=>'blog'
]);

Route::get('/blog/{slog}', [
    'uses'=>'FrontEndController@singlePost',
    'as'=>'blog.post'
]);

Route::post('/blog/post/addComment/{id}', [

'uses'=>'CommentsController@store',
'as'=>'blog.post.addComment'
]);




Route::get('/search', [
    'uses'=>'SearchController@search',
    'as'=>'search'
]);

Route::get('/cart', [
    'uses'=>'FrontEndController@cart',
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

Route::post('/order/payment', [
    'uses'=>'OrdersController@createOrder',
    'as'=>'order.payment'
]);


Route::post('/order/recheck', [
    'uses'=>'OrdersController@reCheck',
    'as'=>'order.recheck'
]);
///
Route::post('/address/addAddress', [
    'middleware'=>'auth',
    'uses'=>'AddressesController@store',
    'as'=>'address.addAddress'
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