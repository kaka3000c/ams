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







Route::get('/signlog/{id}', '\App\Http\Controllers\SignLogController@insert');



Route::get('/product/detail/{id}', '\App\Http\Controllers\ProductController@detail');
Route::get('/product/detail_json/{id}', '\App\Http\Controllers\ProductController@detail_json');



Route::get('/index', 'IndexController@index');
Route::get('/index/home', 'IndexController@home');
Route::get('/index_json', 'IndexController@index_json');
Route::get('fruit_json', 'IndexController@fruit_json');

Route::post('/order/insert', '\App\Http\Controllers\OrderController@insert');


//小程序接口
Route::get('/banner/index_json', 'BannerController@index_json');
Route::get('/banner/fruit_json', 'BannerController@fruit_json');



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
//后台登录页面
Route::get('/admin/login', '\App\Http\Controllers\Admin\IndexController@login');
      

Route::post('/admin/signin', '\App\Http\Controllers\Admin\IndexController@signin');


//后台登录验证
Route::middleware(['admin_session'])->group(function () {
    


Route::get('/admin/index', '\App\Http\Controllers\Admin\IndexController@index');
Route::get('/admin/menu', '\App\Http\Controllers\Admin\MenuController@index');
Route::get('/admin/top', '\App\Http\Controllers\Admin\TopController@index');

//后台产品页面
Route::get('/admin/product', '\App\Http\Controllers\Admin\ProductController@index');
Route::get('/admin/product/add', '\App\Http\Controllers\Admin\ProductController@add');
Route::post('/admin/product/insert', '\App\Http\Controllers\Admin\ProductController@insert');
Route::get('/admin/product/edit/{id}', '\App\Http\Controllers\Admin\ProductController@edit');
Route::post('/admin/product/update', '\App\Http\Controllers\Admin\ProductController@update');
Route::get('/admin/product/delete/{id}', '\App\Http\Controllers\Admin\ProductController@delete');
Route::get('/admin/product/cancel_del/{id}', '\App\Http\Controllers\Admin\ProductController@cancel_del');
Route::get('/admin/product/on_sale/{id}', '\App\Http\Controllers\Admin\ProductController@on_sale');
Route::get('/admin/product/off_sale/{id}', '\App\Http\Controllers\Admin\ProductController@off_sale');
Route::get('/admin/product/trash', '\App\Http\Controllers\Admin\ProductController@trash');
Route::post('/admin/product/search', '\App\Http\Controllers\Admin\ProductController@search');
Route::get('/admin/product/search', '\App\Http\Controllers\Admin\ProductController@search');

Route::get('/admin/brand', '\App\Http\Controllers\Admin\BrandController@index');
Route::get('/admin/brand/add', '\App\Http\Controllers\Admin\BrandController@add');
Route::post('/admin/brand/insert', '\App\Http\Controllers\Admin\BrandController@insert');
Route::get('/admin/brand/edit/{id}', '\App\Http\Controllers\Admin\BrandController@edit');
Route::post('/admin/brand/update', '\App\Http\Controllers\Admin\BrandController@update');
Route::get('/admin/brand/delete/{id}', '\App\Http\Controllers\Admin\BrandController@delete');

Route::get('/admin/goodstype', '\App\Http\Controllers\Admin\GoodsTypeController@index');
Route::get('/admin/tag', '\App\Http\Controllers\Admin\TagController@index');


//后台广告管理页面
Route::get('/admin/banner', '\App\Http\Controllers\Admin\BannerController@index');
Route::get('/admin/banner/add', '\App\Http\Controllers\Admin\BannerController@add');
Route::post('/admin/banner/insert', '\App\Http\Controllers\Admin\BannerController@insert');
Route::get('/admin/banner/edit/{id}', '\App\Http\Controllers\Admin\BannerController@edit');
Route::post('/admin/banner/update', '\App\Http\Controllers\Admin\BannerController@update');
Route::get('/admin/banner/delete/{id}', '\App\Http\Controllers\Admin\BannerController@delete');
Route::get('/admin/banner/on_enable/{id}', '\App\Http\Controllers\Admin\BannerController@on_enable');
Route::get('/admin/banner/off_enable/{id}', '\App\Http\Controllers\Admin\BannerController@off_enable');

//后台广告位置管理页面
Route::get('/admin/adposition', '\App\Http\Controllers\Admin\AdPositionController@index');
Route::get('/admin/adposition/add', '\App\Http\Controllers\Admin\AdPositionController@add');
Route::post('/admin/adposition/insert', '\App\Http\Controllers\Admin\AdPositionController@insert');


//后台订单管理页面
Route::get('/admin/order', '\App\Http\Controllers\Admin\OrderController@index');
Route::get('/admin/bookinggood', '\App\Http\Controllers\Admin\BookingGoodController@index');

//后台用户管理页面
Route::get('/admin/user', '\App\Http\Controllers\Admin\UserController@index');
Route::get('/admin/user/add', '\App\Http\Controllers\Admin\UserController@add');
Route::post('/admin/user/insert', '\App\Http\Controllers\Admin\UserController@insert');

//后台用户留言列表
Route::get('/admin/user/feedback_index', '\App\Http\Controllers\Admin\UserController@feedback_index');



//后台管理员用户管理页面
Route::get('/admin/adminuser', '\App\Http\Controllers\Admin\AdminUserController@index');
Route::get('/admin/adminuser/add', '\App\Http\Controllers\Admin\AdminUserController@add');
Route::post('/admin/adminuser/insert', '\App\Http\Controllers\Admin\AdminUserController@insert');



//后台产品类别管理页面
Route::get('/admin/category', '\App\Http\Controllers\Admin\CategoryController@index');
Route::get('/admin/category/add', '\App\Http\Controllers\Admin\CategoryController@add');
Route::post('/admin/category/insert', '\App\Http\Controllers\Admin\CategoryController@insert');
Route::get('/admin/category/edit/{id}', '\App\Http\Controllers\Admin\CategoryController@edit');
Route::post('/admin/category/update', '\App\Http\Controllers\Admin\CategoryController@update');
Route::get('/admin/category/delete/{id}', '\App\Http\Controllers\Admin\CategoryController@delete');

//后台管理员日志页面
Route::get('/admin/adminlog', '\App\Http\Controllers\Admin\AdminLogController@index');


//后台供应商页面
Route::get('/admin/supplier', '\App\Http\Controllers\Admin\SupplierController@index');

//后台角色页面
Route::get('/admin/role', '\App\Http\Controllers\Admin\RoleController@index');
Route::get('/admin/role/add', '\App\Http\Controllers\Admin\RoleController@add');
Route::post('/admin/role/insert', '\App\Http\Controllers\Admin\RoleController@insert');

//后台办事处页面
Route::get('/admin/agency', '\App\Http\Controllers\Admin\AgencyController@index');


//后台促销管理页面
Route::get('/admin/bonus', '\App\Http\Controllers\Admin\BonusController@index');

//后台文章管理页面
Route::get('/admin/article', '\App\Http\Controllers\Admin\ArticleController@index');
Route::get('/admin/article/add', '\App\Http\Controllers\Admin\ArticleController@add');
Route::post('/admin/article/insert', '\App\Http\Controllers\Admin\ArticleController@insert');

Route::get('/admin/articlecat', '\App\Http\Controllers\Admin\ArticleCatController@index');
Route::get('/admin/articlecat/add', '\App\Http\Controllers\Admin\ArticleCatController@add');
Route::post('/admin/articlecat/insert', '\App\Http\Controllers\Admin\ArticleCatController@insert');
Route::get('/admin/articlecat/edit/{id}', '\App\Http\Controllers\Admin\ArticleCatController@edit');
Route::post('/admin/articlecat/update', '\App\Http\Controllers\Admin\ArticleCatController@update');
Route::get('/admin/articlecat/delete/{id}', '\App\Http\Controllers\Admin\ArticleCatController@delete');

//后台商家管理页面
Route::get('/admin/shop', '\App\Http\Controllers\Admin\ShopController@index');
Route::get('/admin/shop/add', '\App\Http\Controllers\Admin\ShopController@add');
Route::post('/admin/shop/insert', '\App\Http\Controllers\Admin\ShopController@insert');
Route::get('/admin/shop/edit/{id}', '\App\Http\Controllers\Admin\ShopController@edit');
Route::post('/admin/shop/update', '\App\Http\Controllers\Admin\ShopController@update');
Route::get('/admin/shop/delete/{id}', '\App\Http\Controllers\Admin\ShopController@delete');
    
});

Route::get('/home', 'HomeController@index')->name('home');




//拼水果小程序登录注册接口
Route::get('/xcx/register',  '\App\Http\Controllers\xcx\RegisterController@index');
Route::post('/xcx/register', '\App\Http\Controllers\xcx\RegisterController@register');

//家政小程序登录注册接口
Route::get('/xcx/jzregister',  '\App\Http\Controllers\xcx\JzRegisterController@index');
Route::post('/xcx/jzregister', '\App\Http\Controllers\xcx\JzRegisterController@register');


//小程序会员卡接口
Route::get('/xcx/card', '\App\Http\Controllers\xcx\CardController@index');
Route::post('/xcx/card', '\App\Http\Controllers\xcx\CardController@insert');

//小程序会员地址接口
Route::get('/xcx/user/address', '\App\Http\Controllers\xcx\UserController@address');
Route::post('/xcx/user/address_insert', '\App\Http\Controllers\xcx\UserController@address_insert');


//小程序订单提交
Route::post('/xcx/order/insert', '\App\Http\Controllers\xcx\OrderController@insert');
Route::get('/xcx/order/index_json', '\App\Http\Controllers\xcx\OrderController@index_json');

