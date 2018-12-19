<?php

/*
 */
//文章列表页
Route::get('/activity', '\App\Http\Controllers\ActivityController@index')->middleware('token');
Route::get('/activity/info', '\App\Http\Controllers\ActivityController@info');

//文章列表页
Route::get('/posts', '\App\Http\Controllers\PostController@index');
//文章详情页
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
//创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
Route::post('/posts', '\App\Http\Controllers\PostController@store');
//编辑文章
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
//删除文章
Route::get('/posts/delete', '\App\Http\Controllers\PostController@delete');


// 用户模块
// 注册页面
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
// 注册行为
Route::post('/register', '\App\Http\Controllers\RegisterController@register');
// 登录页面
Route::get('/login', '\App\Http\Controllers\LoginController@index');
// 登录行为
Route::post('/login', '\App\Http\Controllers\LoginController@login');

// 登出行为
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');





//后台登录页面
Route::get('/admin/index', '\App\Http\Controllers\Admin\IndexController@index');
Route::get('/admin/login', '\App\Http\Controllers\Admin\IndexController@login');
Route::post('/admin/signin', '\App\Http\Controllers\Admin\IndexController@signin');



//后台产品页面
Route::get('/admin/product', '\App\Http\Controllers\Admin\ProductController@index');
Route::get('/admin/product/add', '\App\Http\Controllers\Admin\ProductController@add');
Route::post('/admin/product/insert', '\App\Http\Controllers\Admin\ProductController@insert');


//后台广告管理页面
Route::get('/admin/banner', '\App\Http\Controllers\Admin\BannerController@index');
Route::get('/admin/banner/add', '\App\Http\Controllers\Admin\BannerController@add');
Route::post('/admin/banner/insert', '\App\Http\Controllers\Admin\BannerController@insert');

//后台订单管理页面
Route::get('/admin/order', '\App\Http\Controllers\Admin\OrderController@index');


//后台用户管理页面
Route::get('/admin/user', '\App\Http\Controllers\Admin\UserController@index');

//后台管理员用户管理页面
Route::get('/admin/adminuser', '\App\Http\Controllers\Admin\AdminUserController@index');

Route::get('/admin/menu', '\App\Http\Controllers\Admin\MenuController@index');
Route::get('/admin/top', '\App\Http\Controllers\Admin\TopController@index');

//后台产品类别管理页面
Route::get('/admin/category', '\App\Http\Controllers\Admin\CategoryController@index');

Route::get('/signlog/{id}', '\App\Http\Controllers\SignLogController@insert');



Route::get('/product/detail/{id}', '\App\Http\Controllers\ProductController@detail');
Route::get('/product/detail_json/{id}', '\App\Http\Controllers\ProductController@detail_json');



Route::get('/index', 'IndexController@index');
Route::get('/index_json', 'IndexController@index_json');
Route::post('/order/insert', '\App\Http\Controllers\OrderController@insert');


//小程序接口
Route::get('/banner/index_json', 'BannerController@index_json');




//前台登录验证
Route::middleware(['session'])->group(function () {

    //购物车页面
    Route::get('/cart', '\App\Http\Controllers\CartController@index');
    Route::post('/cart', '\App\Http\Controllers\CartController@index');
    Route::post('/proorder/insert', '\App\Http\Controllers\ProorderController@insert');


    // 个人设置页面
    Route::get('/user/me/setting', '\App\Http\Controllers\UserController@setting');
   // 个人设置操作页面
    Route::post('/user/me/setting', '\App\Http\Controllers\UserController@settingStore');
   // 个人设置操作页面
   //Route::get('/user/store','\App\Http\Controllers\UserController@store');

    Route::post('/user/me/store', '\App\Http\Controllers\UserController@store');
    //用户欢迎页面
    Route::get('/user/index','\App\Http\Controllers\UserController@index');
    //用户资料
    Route::get('/user/profile','\App\Http\Controllers\UserController@profile');
     //我的订单
    Route::get('/user/order_list','\App\Http\Controllers\UserController@order_list');
    //收货人信息
    Route::get('/user/address_list','\App\Http\Controllers\UserController@address_list');
    
    
    
});

//后台登录验证
Route::middleware(['admin_session'])->group(function () {
    
});

Route::get('/home', 'HomeController@index')->name('home');


//小程序登录注册接口
Route::get('/xcx/register',  '\App\Http\Controllers\xcx\RegisterController@index');
Route::post('/xcx/register', '\App\Http\Controllers\xcx\RegisterController@register');

//小程序会员卡接口
Route::get('/xcx/card', '\App\Http\Controllers\xcx\CardController@index');
Route::post('/xcx/card', '\App\Http\Controllers\xcx\CardController@insert');

//小程序会员地址接口
Route::get('/xcx/user', '\App\Http\Controllers\xcx\UserController@address');
Route::post('/xcx/user', '\App\Http\Controllers\xcx\UserController@address_insert');


//小程序订单提交
Route::post('/xcx/order/insert', '\App\Http\Controllers\xcx\OrderController@insert');