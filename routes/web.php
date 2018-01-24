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

Route::get('casa', 'ImageController@getHome');
Route::post('upload', 'ImageController@postUpload');
Route::post('crop', 'ImageController@postCrop');


Route::get('user/image/{height}/widt/{width}', [
    'uses' => 'PDFController@getImage',
    'as' => 'user.image'
]);

// Route::post('user/image', [
//     'uses' => 'PDFController@postStation',
//     'as' => 'user.image'
// ]);

Route::get('user/cropperjs', [
    'uses' => 'CropperjsController@index',
    'as' => 'js.cropper'
]);

Route::post('user/cropperjs', [
    'uses' => 'CropperjsController@update_photo_crop',
    'as' => 'js.cropper'
]);

Route::get('/', [
    'uses' => 'ProductController@index',
    'as' => 'product.index'
]);

Route::get('add-to-cart/{product_id}',[
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.AddToCart'
]);

Route::get('detail/{product_id}',[
    'uses' => 'ProductController@getDetail',
    'as' => 'product.detail'
]);

Route::get('back',[
    'uses' => 'ProductController@back',
    'as' => 'product.back'
]);

Route::post('search',[
    'uses' => 'ProductController@search',
    'as' => 'product.search'
]);

Route::get('shopping-cart',[
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);


Route::get('/reduce/{id}',[
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}',[
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::group(['middleware' => 'auth'], function(){

    Route::post('/checkout', [
        'uses' => 'PurchaseController@postPurchase',
        'as' => 'checkout'
    ]);
    Route::get('/checkout', [
        'uses' => 'PurchaseController@getPurchase',
        'as' => 'checkout'
    ]);
});

Route::get('/pdf',[
    'uses' => 'PdfController@getPDF',
    'as' => 'shop.pdf'
]);


Route::post('/pdf',[
    'uses' => 'PdfController@postPDF',
    'as' => 'shop.pdf'
]);


Route::group(['prefix' => 'user'], function(){

    Route::get('/message/{$message}', [
        'as' => 'user.message'
    ]);

    Route::group(['middleware' => 'guest'], function(){

        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);
        
        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);
        
        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        
        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });
    
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/profile',[
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);
        
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });
});

Route::get('/admin', [
    'uses' => 'AdminController@getSignin',
    'as' => 'admin.index'
]);

Route::post('/admin', [
    'uses' => 'AdminController@postSignin',
    'as' => 'admin.index'
]);

Route::get('/logout', [
    'uses' => 'AdminController@getLogout',
    'as' => 'admin.logout'
]);

// Auth::routes();
// Route::group(['prefix' => 'user'], function(){
// Route::group(['middleware' =>  'admin'], function(){


    Route::group(['middleware' => 'admin'], function(){

        Route::group(['prefix' => 'admin'], function(){
            
            Route::get('/register', [
                'uses' => 'AdminController@getRegister',
                'as' => 'admin.register' 
            ]);
                        
            Route::post('/register', [
                'uses' => 'AdminController@postRegister',
                'as' => 'admin.register'
            ]);

            Route::get('/list', [
                'uses' => 'AdminController@getList',
                'as' => 'admin.list'
            ]);

            Route::get('update/{product_id}', [
                'uses' => 'AdminController@getUpdate',
                'as' => 'admin.update'
            ]);
            
            Route::post('update', [
                'uses' => 'AdminController@postUpdate',
                'as' => 'admin.updateConfirm'
            ]);

            Route::get('delete/{product_id}', [
                'uses' => 'AdminController@getDelete',
                'as' => 'admin.delete'
            ]);
            
            Route::post('deleteConfirm', [
                'uses' => 'AdminController@postDelete',
                'as' => 'admin.deleteConfirm'
            ]);
            
            });
        });


        Route::post('/address', [
            'uses' => 'PurchaseController@postAddress',
            'as' => 'shop.address'
        ]);
        Route::get('/address', [
            'uses' => 'PurchaseController@getAddress',
            'as' => 'shop.address'
        ]);

        Route::get('/station', [
            'uses' => 'PDFController@getStation',
            'as' => 'shop.yahooAddress'
        ]);
        Route::post('/station', [
            'uses' => 'PDFController@postStation',
            'as' => 'shop.yahooAddress'
        ]);






