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

Route::get('/', [
    'uses'=>'FrontEndController@index',
    'as'=>'index'
]);


Route::get('/shop', [
    'uses'=>'FrontEndController@shop',
    'as'=>'shop'
]);

Route::get('/blog', [
    'uses'=>'FrontEndController@blog',
    'as'=>'blog'
]);

Route::get('/blog/{slog}', [
    'uses'=>'FrontEndController@singlePost',
    'as'=>'blog.post'
]);

Route::get('/shop/{id}', [
    'uses'=>'FrontEndController@singleProduct',
    'as'=>'shop.product'
]);

Auth::routes();

Route::get('/admin', function(){

    return view('admin.index');

});



Route::group(["prefix"=>'admin/blog', 'middleware'=>'auth'], function(){

    Route::get('/dashboard', [
            'uses'=>'HomeController@index',
            'as'=>'home'
        ]);

         Route::get('/posts', [
            'uses'=>'PostsController@index',
            'as'=>'posts'
        ]);

        Route::get('/post/create', [
            'uses'=>'PostsController@create',
            'as'=>'post.create'
        ]);
       
        Route::post('/post/store', [
            'uses'=>'PostsController@store',
            'as'=>'post.store'
        ]);

        Route::get('/post/edit/{id}', [
            'uses'=>'PostsController@edit',
            'as'=>'post.edit'
        ]);

        Route::post('/post/update/{id}', [
            'uses'=>'PostsController@update',
            'as'=>'post.update'
        ]);

        Route::get('/posts/delete/{id}', [
            'uses'=>'PostsController@destroy',
            'as'=>'post.delete'
        ]);



        Route::get('/posts/trashed', [
            'uses'=>'PostsController@trashed',
            'as'=>'posts.trashed'
        ]);
        Route::get('/posts/trashed/delete/{id}', [
            'uses'=>'PostsController@kill',
            'as'=>'posts.trashed.delete'
        ]);
        Route::get('/posts/trashed/restore/{id}', [
            'uses'=>'PostsController@restore',
            'as'=>'posts.trashed.restore'
        ]);



        Route::get('/category/create', [
            'uses'=>'CategoriesController@create',
            'as'=>'category.create'
        ]);

        Route::post('/category/store', [
            'uses'=>'CategoriesController@store',
            'as'=>'category.store'
        ]);

        Route::get('/category/edit/{id}', [
            'uses'=>'CategoriesController@edit',
            'as'=>'category.edit'
        ]);

        Route::post('/category/update/{id}', [
            'uses'=>'CategoriesController@update',
            'as'=>'category.update'
        ]);

        Route::get('/category/delete/{id}', [
            'uses'=>'CategoriesController@destroy',
            'as'=>'category.delete'
        ]);



        Route::get('/tag/create', [
            'uses'=>'TagsController@create',
            'as'=>'tag.create'
        ]);

        Route::post('/tag/store', [
            'uses'=>'TagsController@store',
            'as'=>'tag.store'
        ]);

        Route::get('/tag/edit/{id}', [
            'uses'=>'TagsController@edit',
            'as'=>'tag.edit'
        ]);

        Route::post('/tag/update/{id}', [
            'uses'=>'TagsController@update',
            'as'=>'tag.update'
        ]);

        Route::get('/tag/delete/{id}', [
            'uses'=>'TagsController@destroy',
            'as'=>'tag.delete'
        ]);
        
});


Route::group(["prefix"=>'admin/shop', 'middleware'=>'auth'], function(){

    Route::get('/dashboard', [
            'uses'=>'ShopHomeController@index',
            'as'=>'admin.shop'
        ]);

         Route::get('/products', [
            'uses'=>'ProductsController@index',
            'as'=>'admin.products'
        ]);

        Route::get('/product/create', [
            'uses'=>'ProductsController@create',
            'as'=>'product.create'
        ]);
       
        Route::post('/product/store', [
            'uses'=>'ProductsController@store',
            'as'=>'product.store'
        ]);

        Route::get('/product/edit/{id}', [
            'uses'=>'ProductsController@edit',
            'as'=>'product.edit'
        ]);

        Route::post('/product/update/{id}', [
            'uses'=>'ProductsController@update',
            'as'=>'product.update'
        ]);

        Route::get('/products/delete/{id}', [
            'uses'=>'ProductsController@destroy',
            'as'=>'product.delete'
        ]);



        Route::get('/products/trashed', [
            'uses'=>'ProductsController@trashed',
            'as'=>'products.trashed'
        ]);
        Route::get('/products/trashed/delete/{id}', [
            'uses'=>'ProductsController@kill',
            'as'=>'products.trashed.delete'
        ]);
        Route::get('/products/trashed/restore/{id}', [
            'uses'=>'ProductsController@restore',
            'as'=>'products.trashed.restore'
        ]);



        Route::get('/category/create', [
            'uses'=>'ProductCategoriesController@create',
            'as'=>'prod_cat.create'
        ]);

        Route::post('/category/store', [
            'uses'=>'ProductCategoriesController@store',
            'as'=>'prod_cat.store'
        ]);

        Route::get('/category/edit/{id}', [
            'uses'=>'ProductCategoriesController@edit',
            'as'=>'prod_cat.edit'
        ]);

        Route::post('/category/update/{id}', [
            'uses'=>'ProductCategoriesController@update',
            'as'=>'prod_cat.update'
        ]);

        Route::get('/category/delete/{id}', [
            'uses'=>'ProductCategoriesController@destroy',
            'as'=>'prod_cat.delete'
        ]);



        Route::get('/tag/create', [
            'uses'=>'ProductTagsController@create',
            'as'=>'prod_tag.create'
        ]);

        Route::post('/tag/store', [
            'uses'=>'ProductTagsController@store',
            'as'=>'prod_tag.store'
        ]);

        Route::get('/tag/edit/{id}', [
            'uses'=>'ProductTagsController@edit',
            'as'=>'prod_tag.edit'
        ]);

        Route::post('/tag/update/{id}', [
            'uses'=>'ProductTagsController@update',
            'as'=>'prod_tag.update'
        ]);

        Route::get('/tag/delete/{id}', [
            'uses'=>'ProductTagsController@destroy',
            'as'=>'prod_tag.delete'
        ]);
        
});