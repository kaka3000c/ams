<?php

/*
 */
Route::group(['domain' => 'www.0668zdm.com'], function () {
	Route::any('/','\App\Http\Controllers\IndexController@index');
       
});


Route::group(['domain' => 'www.0668jjw.cn'], function () {
	Route::any('/','\App\Http\Controllers\IndexController@home');
       
});


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

//微信登录
Route::get('/weixing_login', '\App\Http\Controllers\LoginController@weixing_login');
Route::get('/Callback', '\App\Http\Controllers\LoginController@Callback');


// 登录行为
Route::post('/login', '\App\Http\Controllers\LoginController@login');

// 登出行为
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');







Route::get('/signlog/{id}', '\App\Http\Controllers\SignLogController@insert');


Route::get('/article/detail/{id}', '\App\Http\Controllers\ArticleController@detail');

Route::get('/product/detail/{id}', '\App\Http\Controllers\ProductController@detail');

Route::get('/jiaju_product/detail/{id}', '\App\Http\Controllers\Jiaju\ProductController@detail');

Route::get('/product/detail_json/{id}', '\App\Http\Controllers\ProductController@detail_json');

Route::get('/shop/detail/{id}', '\App\Http\Controllers\ShopController@detail');

Route::get('/employ/', '\App\Http\Controllers\EmployController@index');
Route::get('/employ/detail/{id}', '\App\Http\Controllers\EmployController@detail');


Route::get('/', function () {

    return redirect('/index');
});


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

//后台商家登录页面
Route::get('/shopadmin/login', '\App\Http\Controllers\ShopAdmin\ShopAdminController@login');
Route::post('/shopadmin/sign', '\App\Http\Controllers\ShopAdmin\ShopAdminController@sign');


//商家后台登录验证
Route::middleware(['shop_session'])->group(function () {
    
     //商家管理后台首页
     Route::get('/shopadmin/index', '\App\Http\Controllers\ShopAdmin\ShopAdminController@index');
     Route::get('/shopadmin/menu', '\App\Http\Controllers\ShopAdmin\ShopMenuController@index');
     Route::get('/shopadmin/top', '\App\Http\Controllers\ShopAdmin\ShopTopController@index'); 
     
     //商家产品页面
      Route::get('/shopadmin/product', '\App\Http\Controllers\shopadmin\ShopProductController@index');
      Route::get('/shopadmin/product/add', '\App\Http\Controllers\shopadmin\ShopProductController@add');
      Route::get('/shopadmin/product/edit/{id}', '\App\Http\Controllers\shopadmin\ShopProductController@edit');
      Route::post('/shopadmin/product/update', '\App\Http\Controllers\shopadmin\ShopProductController@update');
      Route::post('/shopadmin/product/insert', '\App\Http\Controllers\shopadmin\ShopProductController@insert');
       Route::get('/shopadmin/product/off_sale/{id}', '\App\Http\Controllers\shopadmin\ShopProductController@off_sale');
        Route::get('/shopadmin/product/on_sale/{id}', '\App\Http\Controllers\shopadmin\ShopProductController@on_sale');
      Route::get('/shopadmin/product/trash', '\App\Http\Controllers\shopadmin\ShopProductController@trash');
       Route::get('/shopadmin/product/delete/{id}', '\App\Http\Controllers\shopadmin\ShopProductController@delete');
      Route::get('/shopadmin/product/cancel_del/{id}', '\App\Http\Controllers\shopadmin\ShopProductController@cancel_del');
       Route::get('/shopadmin/product/real_del/{id}', '\App\Http\Controllers\shopadmin\ShopProductController@real_del');
       
       
      //商家店铺管理
      Route::get('/shopadmin/shop', '\App\Http\Controllers\shopadmin\ShopController@index');
      Route::get('/shopadmin/logout', '\App\Http\Controllers\ShopAdmin\ShopAdminController@logout');
      
      //出售房产管理
      Route::get('/shopadmin/sellhouse', '\App\Http\Controllers\shopadmin\SellHouseController@index');
      Route::get('/shopadmin/sellhouse/add', '\App\Http\Controllers\shopadmin\SellHouseController@add');
      Route::get('/shopadmin/sellhouse/edit/{id}', '\App\Http\Controllers\shopadmin\SellHouseController@edit');
      Route::post('/shopadmin/sellhouse/update', '\App\Http\Controllers\shopadmin\SellHouseController@update');
      Route::post('/shopadmin/sellhouse/insert', '\App\Http\Controllers\shopadmin\SellHouseController@insert');
      Route::get('/shopadmin/sellhouse/trash', '\App\Http\Controllers\shopadmin\SellHouseController@trash');
       Route::get('/shopadmin/sellhouse/real_del/{id}', '\App\Http\Controllers\shopadmin\SellHouseController@real_del');
       
      //出租房产管理
      Route::get('/shopadmin/leasehouse', '\App\Http\Controllers\shopadmin\LeaseHouseController@index');
      Route::get('/shopadmin/leasehouse/add', '\App\Http\Controllers\shopadmin\LeaseHouseController@add');
      Route::get('/shopadmin/leasehouse/edit/{id}', '\App\Http\Controllers\shopadmin\LeaseHouseController@edit');
      Route::post('/shopadmin/leasehouse/update', '\App\Http\Controllers\shopadmin\LeaseHouseController@update');
      Route::post('/shopadmin/leasehouse/insert', '\App\Http\Controllers\shopadmin\LeaseHouseController@insert');
      Route::get('/shopadmin/leasehouse/trash', '\App\Http\Controllers\shopadmin\LeaseHouseController@trash');
       Route::get('/shopadmin/leasehouse/real_del/{id}', '\App\Http\Controllers\shopadmin\LeaseHouseController@real_del');
      
});

//管理员后台登录验证
Route::middleware(['admin_session'])->group(function () {
    


Route::get('/admin/index', '\App\Http\Controllers\Admin\IndexController@index');
Route::get('/admin/menu', '\App\Http\Controllers\Admin\MenuController@index');
Route::get('/admin/top', '\App\Http\Controllers\Admin\TopController@index');

//后台产品页面
//商品管理
Route::get('/admin/product', '\App\Http\Controllers\Admin\ProductController@index');
Route::get('/admin/product/add', '\App\Http\Controllers\Admin\ProductController@add');
Route::post('/admin/product/insert', '\App\Http\Controllers\Admin\ProductController@insert');
Route::get('/admin/product/edit/{id}', '\App\Http\Controllers\Admin\ProductController@edit');
Route::post('/admin/product/update', '\App\Http\Controllers\Admin\ProductController@update');
Route::get('/admin/product/delete/{id}', '\App\Http\Controllers\Admin\ProductController@delete');
Route::get('/admin/product/real_del/{id}', '\App\Http\Controllers\Admin\ProductController@real_del');
Route::post('/admin/product/batch_del/', '\App\Http\Controllers\Admin\ProductController@batch_del');
Route::get('/admin/product/cancel_del/{id}', '\App\Http\Controllers\Admin\ProductController@cancel_del');
Route::get('/admin/product/on_sale/{id}', '\App\Http\Controllers\Admin\ProductController@on_sale');
Route::get('/admin/product/off_sale/{id}', '\App\Http\Controllers\Admin\ProductController@off_sale');
Route::get('/admin/product/trash', '\App\Http\Controllers\Admin\ProductController@trash');
Route::post('/admin/product/search', '\App\Http\Controllers\Admin\ProductController@search');
Route::get('/admin/product/search', '\App\Http\Controllers\Admin\ProductController@search');




//饭店积分商品管理
Route::get('/admin/hotel_score_product', '\App\Http\Controllers\Admin\HotelScoreProductController@index');
Route::get('/admin/hotel_score_product/add', '\App\Http\Controllers\Admin\HotelScoreProductController@add');
Route::post('/admin/hotel_score_product/insert', '\App\Http\Controllers\Admin\HotelScoreProductController@insert');
Route::get('/admin/hotel_score_product/edit/{id}', '\App\Http\Controllers\Admin\HotelScoreProductController@edit');
Route::post('/admin/hotel_score_product/update', '\App\Http\Controllers\Admin\HotelScoreProductController@update');
Route::get('/admin/hotel_score_product/delete/{id}', '\App\Http\Controllers\Admin\HotelScoreProductController@delete');
Route::get('/admin/hotel_score_product/real_del/{id}', '\App\Http\Controllers\Admin\HotelScoreProductController@real_del');
Route::post('/admin/hotel_score_product/batch_del/', '\App\Http\Controllers\Admin\HotelScoreProductController@batch_del');

//饭店微信商品管理
Route::get('/admin/hotel_weixing_product', '\App\Http\Controllers\Admin\HotelWeixingProductController@index');
Route::get('/admin/hotel_weixing_product/add', '\App\Http\Controllers\Admin\HotelWeixingProductController@add');
Route::post('/admin/hotel_weixing_product/insert', '\App\Http\Controllers\Admin\HotelWeixingProductController@insert');
Route::get('/admin/hotel_weixing_product/edit/{id}', '\App\Http\Controllers\Admin\HotelWeixingProductController@edit');
Route::post('/admin/hotel_weixing_product/update', '\App\Http\Controllers\Admin\HotelWeixingProductController@update');
Route::get('/admin/hotel_weixing_product/delete/{id}', '\App\Http\Controllers\Admin\HotelWeixingProductController@delete');
Route::get('/admin/hotel_weixing_product/real_del/{id}', '\App\Http\Controllers\Admin\HotelWeixingProductController@real_del');
Route::post('/admin/hotel_weixing_product/batch_del/', '\App\Http\Controllers\Admin\HotelWeixingProductController@batch_del');

//饭店积分订单管理

Route::get('/admin/hotel_score_order', '\App\Http\Controllers\Admin\HotelScoreOrderController@index');

//饭店商城订单管理
Route::get('/admin/hotel_order', '\App\Http\Controllers\Admin\HotelOrderController@index');

//饭店门店管理
Route::get('/admin/hotel_store', '\App\Http\Controllers\Admin\HotelStoreController@index');
Route::get('/admin/hotel_store/add', '\App\Http\Controllers\Admin\HotelStoreController@add');
Route::post('/admin/hotel_store/insert', '\App\Http\Controllers\Admin\HotelStoreController@insert');
Route::get('/admin/hotel_store/edit/{id}', '\App\Http\Controllers\Admin\HotelStoreController@edit');
Route::post('/admin/hotel_store/update', '\App\Http\Controllers\Admin\HotelStoreController@update');
Route::get('/admin/hotel_store/delete/{id}', '\App\Http\Controllers\Admin\HotelStoreController@delete');



//品牌管理
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

//后台商家店铺广告管理页面
Route::get('/admin/shopbanner', '\App\Http\Controllers\Admin\ShopBannerController@index');
Route::get('/admin/shopbanner/add', '\App\Http\Controllers\Admin\ShopBannerController@add');
Route::post('/admin/shopbanner/insert', '\App\Http\Controllers\Admin\ShopBannerController@insert');
Route::get('/admin/shopbanner/edit/{id}', '\App\Http\Controllers\Admin\ShopBannerController@edit');
Route::post('/admin/shopbanner/update', '\App\Http\Controllers\Admin\ShopBannerController@update');
Route::get('/admin/shopbanner/delete/{id}', '\App\Http\Controllers\Admin\ShopBannerController@delete');
Route::get('/admin/shopbanner/on_enable/{id}', '\App\Http\Controllers\Admin\ShopBannerController@on_enable');
Route::get('/admin/shopbanner/off_enable/{id}', '\App\Http\Controllers\Admin\ShopBannerController@off_enable');



//后台广告位置管理页面
Route::get('/admin/adposition', '\App\Http\Controllers\Admin\AdPositionController@index');
Route::get('/admin/adposition/add', '\App\Http\Controllers\Admin\AdPositionController@add');
Route::post('/admin/adposition/insert', '\App\Http\Controllers\Admin\AdPositionController@insert');

//后台友情链接管理页面
Route::get('/admin/friendlink', '\App\Http\Controllers\Admin\FriendLinkController@index');
Route::get('/admin/friendlink/add', '\App\Http\Controllers\Admin\FriendLinkController@add');
Route::post('/admin/friendlink/insert', '\App\Http\Controllers\Admin\FriendLinkController@insert');


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

//后台商家类别管理页面
Route::get('/admin/shopcat', '\App\Http\Controllers\Admin\ShopCatController@index');
Route::get('/admin/shopcat/add', '\App\Http\Controllers\Admin\ShopCatController@add');
Route::post('/admin/shopcat/insert', '\App\Http\Controllers\Admin\ShopCatController@insert');
Route::get('/admin/shopcat/edit/{id}', '\App\Http\Controllers\Admin\ShopCatController@edit');
Route::post('/admin/shopcat/update', '\App\Http\Controllers\Admin\ShopCatController@update');
Route::get('/admin/shopcat/delete/{id}', '\App\Http\Controllers\Admin\ShopCatController@delete');


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
Route::get('/admin/role/delete/{id}', '\App\Http\Controllers\Admin\RoleController@delete');

//后台办事处页面
Route::get('/admin/agency', '\App\Http\Controllers\Admin\AgencyController@index');


//后台促销管理页面
Route::get('/admin/bonus', '\App\Http\Controllers\Admin\BonusController@index');
Route::get('/admin/bonus/add', '\App\Http\Controllers\Admin\BonusController@add');
Route::post('/admin/bonus/insert', '\App\Http\Controllers\Admin\BonusController@insert');
Route::get('/admin/bonus/edit/{id}', '\App\Http\Controllers\Admin\BonusController@edit');
Route::post('/admin/bonus/update', '\App\Http\Controllers\Admin\BonusController@update');
Route::get('/admin/bonus/bonus_list/{id}', '\App\Http\Controllers\Admin\BonusController@bonus_list');


//后台优惠劵管理页面
Route::get('/admin/coupon', '\App\Http\Controllers\Admin\CouponController@index');
Route::get('/admin/coupon/add', '\App\Http\Controllers\Admin\CouponController@add');
Route::post('/admin/coupon/insert', '\App\Http\Controllers\Admin\CouponController@insert');
Route::get('/admin/coupon/edit/{id}', '\App\Http\Controllers\Admin\CouponController@edit');
Route::post('/admin/coupon/update', '\App\Http\Controllers\Admin\CouponController@update');
Route::get('/admin/coupon/coupon_list/{id}', '\App\Http\Controllers\Admin\CouponController@coupon_list');


//后台文章管理页面
Route::get('/admin/article', '\App\Http\Controllers\Admin\ArticleController@index');
Route::get('/admin/article/add', '\App\Http\Controllers\Admin\ArticleController@add');
Route::post('/admin/article/insert', '\App\Http\Controllers\Admin\ArticleController@insert');
Route::get('/admin/article/edit/{id}', '\App\Http\Controllers\Admin\ArticleController@edit');
Route::get('/admin/article/delete/{id}', '\App\Http\Controllers\Admin\ArticleController@delete');
Route::get('/admin/article/trash', '\App\Http\Controllers\Admin\ArticleController@trash');
Route::get('/admin/article/cancel_del/{id}', '\App\Http\Controllers\Admin\ArticleController@cancel_del');
Route::get('/admin/article/real_del/{id}', '\App\Http\Controllers\Admin\ArticleController@real_del');
Route::post('/admin/article/update', '\App\Http\Controllers\Admin\ArticleController@update');

//后台文章分类管理页面
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


//后台在线调查管理页面
Route::get('/admin/invest', '\App\Http\Controllers\Admin\InvestController@index');
Route::get('/admin/invest/add', '\App\Http\Controllers\Admin\InvestController@add');
Route::post('/admin/invest/insert', '\App\Http\Controllers\Admin\InvestController@insert');
Route::get('/admin/invest/edit/{id}', '\App\Http\Controllers\Admin\InvestController@edit');
Route::post('/admin/invest/update', '\App\Http\Controllers\Admin\InvestController@update');
Route::get('/admin/invest/delete/{id}', '\App\Http\Controllers\Admin\InvestController@delete');

Route::get('/admin/invest/option_add/{id}', '\App\Http\Controllers\Admin\InvestController@option_add');
Route::post('/admin/invest/option_insert', '\App\Http\Controllers\Admin\InvestController@option_insert');
Route::get('/admin/invest/option_delete/{id}', '\App\Http\Controllers\Admin\InvestController@option_delete');

//后台在线投票管理页面
Route::get('/admin/vote', '\App\Http\Controllers\Admin\VoteController@index');
Route::get('/admin/vote/add', '\App\Http\Controllers\Admin\VoteController@add');
Route::post('/admin/vote/insert', '\App\Http\Controllers\Admin\VoteController@insert');
Route::get('/admin/vote/edit/{id}', '\App\Http\Controllers\Admin\VoteController@edit');
Route::post('/admin/vote/update', '\App\Http\Controllers\Admin\VoteController@update');
Route::get('/admin/vote/delete/{id}', '\App\Http\Controllers\Admin\VoteController@delete');

Route::get('/admin/vote/option_add/{id}', '\App\Http\Controllers\Admin\VoteController@option_add');
Route::post('/admin/vote/option_insert', '\App\Http\Controllers\Admin\VoteController@option_insert');
Route::get('/admin/vote/option_delete/{id}', '\App\Http\Controllers\Admin\VoteController@option_delete');


//用户发布优惠信息管理
Route::get('/admin/promoinfo', '\App\Http\Controllers\Admin\PromoinfoController@index');
Route::get('/admin/promoinfo/add', '\App\Http\Controllers\Admin\PromoinfoController@add');
Route::post('/admin/promoinfo/insert', '\App\Http\Controllers\Admin\PromoinfoController@insert');
Route::get('/admin/promoinfo/edit/{id}', '\App\Http\Controllers\Admin\PromoinfoController@edit');
Route::post('/admin/promoinfo/update', '\App\Http\Controllers\Admin\PromoinfoController@update');
Route::get('/admin/promoinfo/delete/{id}', '\App\Http\Controllers\Admin\PromoinfoController@delete');
Route::get('/admin/promoinfo/real_del/{id}', '\App\Http\Controllers\Admin\PromoinfoController@real_del');
Route::post('/admin/promoinfo/batch_del/', '\App\Http\Controllers\Admin\PromoinfoController@batch_del');
Route::get('/admin/promoinfo/cancel_del/{id}', '\App\Http\Controllers\Admin\PromoinfoController@cancel_del');
Route::get('/admin/promoinfo/on_show/{id}', '\App\Http\Controllers\Admin\PromoinfoController@on_show');
Route::get('/admin/promoinfo/off_show/{id}', '\App\Http\Controllers\Admin\PromoinfoController@off_show');
Route::get('/admin/promoinfo/trash', '\App\Http\Controllers\Admin\PromoinfoController@trash');


//用户发布本地服务信息管理
Route::get('/admin/localservice', '\App\Http\Controllers\Admin\LocalServiceController@index');
Route::get('/admin/localservice/add', '\App\Http\Controllers\Admin\LocalServiceController@add');
Route::post('/admin/localservice/insert', '\App\Http\Controllers\Admin\LocalServiceController@insert');
Route::get('/admin/localservice/edit/{id}', '\App\Http\Controllers\Admin\LocalServiceController@edit');
Route::post('/admin/localservice/update', '\App\Http\Controllers\Admin\LocalServiceController@update');
Route::get('/admin/localservice/delete/{id}', '\App\Http\Controllers\Admin\LocalServiceController@delete');
Route::get('/admin/localservice/real_del/{id}', '\App\Http\Controllers\Admin\LocalServiceController@real_del');
Route::post('/admin/localservice/batch_del/', '\App\Http\Controllers\Admin\LocalServiceController@batch_del');
Route::get('/admin/localservice/cancel_del/{id}', '\App\Http\Controllers\Admin\LocalServiceController@cancel_del');
Route::get('/admin/localservice/on_show/{id}', '\App\Http\Controllers\Admin\LocalServiceController@on_show');
Route::get('/admin/localservice/off_show/{id}', '\App\Http\Controllers\Admin\LocalServiceController@off_show');
Route::get('/admin/localservice/trash', '\App\Http\Controllers\Admin\LocalServiceController@trash');


//用户发布汽车信息管理
Route::get('/admin/car', '\App\Http\Controllers\Admin\CarController@index');
Route::get('/admin/car/add', '\App\Http\Controllers\Admin\CarController@add');
Route::post('/admin/car/insert', '\App\Http\Controllers\Admin\CarController@insert');
Route::get('/admin/car/edit/{id}', '\App\Http\Controllers\Admin\CarController@edit');
Route::post('/admin/car/update', '\App\Http\Controllers\Admin\CarController@update');
Route::get('/admin/car/delete/{id}', '\App\Http\Controllers\Admin\CarController@delete');
Route::get('/admin/car/real_del/{id}', '\App\Http\Controllers\Admin\CarController@real_del');
Route::post('/admin/car/batch_del/', '\App\Http\Controllers\Admin\CarController@batch_del');
Route::get('/admin/car/cancel_del/{id}', '\App\Http\Controllers\Admin\CarController@cancel_del');
Route::get('/admin/car/on_show/{id}', '\App\Http\Controllers\Admin\CarController@on_show');
Route::get('/admin/car/off_show/{id}', '\App\Http\Controllers\Admin\CarController@off_show');
Route::get('/admin/car/trash', '\App\Http\Controllers\Admin\CarController@trash');

//用户发布房产信息管理
Route::get('/admin/house', '\App\Http\Controllers\Admin\HouseController@index');
Route::get('/admin/house/add', '\App\Http\Controllers\Admin\HouseController@add');
Route::post('/admin/house/insert', '\App\Http\Controllers\Admin\HouseController@insert');
Route::get('/admin/house/edit/{id}', '\App\Http\Controllers\Admin\HouseController@edit');
Route::post('/admin/house/update', '\App\Http\Controllers\Admin\HouseController@update');
Route::get('/admin/house/delete/{id}', '\App\Http\Controllers\Admin\HouseController@delete');
Route::get('/admin/house/real_del/{id}', '\App\Http\Controllers\Admin\HouseController@real_del');
Route::post('/admin/house/batch_del/', '\App\Http\Controllers\Admin\HouseController@batch_del');
Route::get('/admin/house/cancel_del/{id}', '\App\Http\Controllers\Admin\HouseController@cancel_del');
Route::get('/admin/house/on_show/{id}', '\App\Http\Controllers\Admin\HouseController@on_show');
Route::get('/admin/house/off_show/{id}', '\App\Http\Controllers\Admin\HouseController@off_show');
Route::get('/admin/house/trash', '\App\Http\Controllers\Admin\HouseController@trash');

//用户发布教育信息管理
Route::get('/admin/education', '\App\Http\Controllers\Admin\EducationController@index');
Route::get('/admin/education/add', '\App\Http\Controllers\Admin\EducationController@add');
Route::post('/admin/education/insert', '\App\Http\Controllers\Admin\EducationController@insert');
Route::get('/admin/education/edit/{id}', '\App\Http\Controllers\Admin\EducationController@edit');
Route::post('/admin/education/update', '\App\Http\Controllers\Admin\EducationController@update');
Route::get('/admin/education/delete/{id}', '\App\Http\Controllers\Admin\EducationController@delete');
Route::get('/admin/education/real_del/{id}', '\App\Http\Controllers\Admin\EducationController@real_del');
Route::post('/admin/education/batch_del/', '\App\Http\Controllers\Admin\EducationController@batch_del');
Route::get('/admin/education/cancel_del/{id}', '\App\Http\Controllers\Admin\EducationController@cancel_del');
Route::get('/admin/education/on_show/{id}', '\App\Http\Controllers\Admin\EducationController@on_show');
Route::get('/admin/education/off_show/{id}', '\App\Http\Controllers\Admin\EducationController@off_show');
Route::get('/admin/education/trash', '\App\Http\Controllers\Admin\EducationController@trash');



//用户发布家居信息管理
Route::get('/admin/homefurnishing', '\App\Http\Controllers\Admin\HomeFurnishingController@index');
Route::get('/admin/homefurnishing/add', '\App\Http\Controllers\Admin\HomeFurnishingController@add');
Route::post('/admin/homefurnishing/insert', '\App\Http\Controllers\Admin\HomeFurnishingController@insert');
Route::get('/admin/homefurnishing/edit/{id}', '\App\Http\Controllers\Admin\HomeFurnishingController@edit');
Route::post('/admin/homefurnishing/update', '\App\Http\Controllers\Admin\HomeFurnishingController@update');
Route::get('/admin/homefurnishing/delete/{id}', '\App\Http\Controllers\Admin\HomeFurnishingController@delete');
Route::get('/admin/homefurnishing/real_del/{id}', '\App\Http\Controllers\Admin\HomeFurnishingController@real_del');
Route::post('/admin/homefurnishing/batch_del/', '\App\Http\Controllers\Admin\HomeFurnishingController@batch_del');
Route::get('/admin/homefurnishing/cancel_del/{id}', '\App\Http\Controllers\Admin\HomeFurnishingController@cancel_del');
Route::get('/admin/homefurnishing/on_show/{id}', '\App\Http\Controllers\Admin\HomeFurnishingController@on_show');
Route::get('/admin/homefurnishing/off_show/{id}', '\App\Http\Controllers\Admin\HomeFurnishingController@off_show');
Route::get('/admin/homefurnishing/trash', '\App\Http\Controllers\Admin\HomeFurnishingController@trash');

//招聘信息管理
Route::get('/admin/employ', '\App\Http\Controllers\Admin\EmployController@index');
Route::get('/admin/employ/add', '\App\Http\Controllers\Admin\EmployController@add');
Route::post('/admin/employ/insert', '\App\Http\Controllers\Admin\EmployController@insert');
Route::get('/admin/employ/edit/{id}', '\App\Http\Controllers\Admin\EmployController@edit');
Route::post('/admin/employ/update', '\App\Http\Controllers\Admin\EmployController@update');
Route::get('/admin/employ/delete/{id}', '\App\Http\Controllers\Admin\EmployController@delete');
Route::get('/admin/employ/real_del/{id}', '\App\Http\Controllers\Admin\EmployController@real_del');
Route::post('/admin/employ/batch_del/', '\App\Http\Controllers\Admin\EmployController@batch_del');
Route::get('/admin/employ/cancel_del/{id}', '\App\Http\Controllers\Admin\EmployController@cancel_del');
Route::get('/admin/employ/on_show/{id}', '\App\Http\Controllers\Admin\EmployController@on_show');
Route::get('/admin/employ/off_show/{id}', '\App\Http\Controllers\Admin\EmployController@off_show');
Route::get('/admin/employ/trash', '\App\Http\Controllers\Admin\EmployController@trash');


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
Route::post('/xcx/user/address', '\App\Http\Controllers\xcx\UserController@address');
Route::post('/xcx/user/address_insert', '\App\Http\Controllers\xcx\UserController@address_insert');
Route::get('/xcx/user/userInfo', '\App\Http\Controllers\xcx\UserController@userInfo');

//小程序订单提交
Route::post('/xcx/order/insert', '\App\Http\Controllers\xcx\OrderController@insert');
Route::get('/xcx/order/index_json', '\App\Http\Controllers\xcx\OrderController@index_json');
Route::post('/xcx/order/pay', '\App\Http\Controllers\xcx\OrderController@pay');
Route::get('/xcx/order/notify_url', '\App\Http\Controllers\xcx\OrderController@notify_url');

//手机站
Route::get('/mobile/index', '\App\Http\Controllers\mobile\IndexController@index');
Route::get('/mobile/product/detail/{id}', '\App\Http\Controllers\mobile\ProductController@detail');


//手机家居站
Route::get('/jiaju_mobile/index', '\App\Http\Controllers\jiaju_mobile\IndexController@index');
Route::get('/jiaju_mobile/product/detail/{id}', '\App\Http\Controllers\jiaju_mobile\ProductController@detail');

//手机站商家产品发布

Route::get('/mobile/product/add', '\App\Http\Controllers\mobile\ProductController@add');
Route::post('/mobile/product/insert', '\App\Http\Controllers\mobile\ProductController@insert');

Route::get('/mobile/shop/{id}', '\App\Http\Controllers\mobile\ShopController@index');
Route::get('/mobile/shop_list', '\App\Http\Controllers\mobile\ShopController@shop_list');

Route::get('/mobile/myshop/', '\App\Http\Controllers\mobile\ShopController@myshop');

Route::get('/mobile/category', '\App\Http\Controllers\mobile\CategoryController@index');
Route::get('/mobile/category/{id}', '\App\Http\Controllers\mobile\CategoryController@detail');
Route::get('/mobile/recommend/', '\App\Http\Controllers\mobile\RecommendController@index');
Route::get('/mobile/recommend/qrcode/', '\App\Http\Controllers\mobile\RecommendController@qrcode');
Route::get('/mobile/recommend/invite/{id}', '\App\Http\Controllers\mobile\RecommendController@invite');
Route::get('/mobile/recommend/oauth_callback', '\App\Http\Controllers\mobile\RecommendController@oauth_callback');
Route::get('/mobile/reg/', '\App\Http\Controllers\mobile\RegController@index');
Route::post('/mobile/reg/', '\App\Http\Controllers\mobile\RegController@reg');

Route::get('/mobile/address/', '\App\Http\Controllers\mobile\AddressController@index');
Route::get('/mobile/address/detail/', '\App\Http\Controllers\mobile\AddressController@detail');
Route::get('/mobile/address/add', '\App\Http\Controllers\mobile\AddressController@add');
Route::post('/mobile/address/insert', '\App\Http\Controllers\mobile\AddressController@insert');

Route::get('/mobile/article/', '\App\Http\Controllers\mobile\ArticleController@list');
Route::get('/mobile/article/{id}', '\App\Http\Controllers\mobile\ArticleController@detail');

Route::get('/mobile/employ/', '\App\Http\Controllers\mobile\EmployController@index');
Route::get('/mobile/employ/detail/{id}', '\App\Http\Controllers\mobile\EmployController@detail');
Route::get('/mobile/employ/add', '\App\Http\Controllers\mobile\EmployController@add');
Route::post('/mobile/employ/insert', '\App\Http\Controllers\mobile\EmployController@insert');


//-----PC端各大频道路由-------------------
//PC端茂名头条频道
Route::get('/mmtt', '\App\Http\Controllers\MmttController@index');

//PC端值得买频道
Route::get('/article_promo', '\App\Http\Controllers\ArticleController@promo');

//PC端房产频道
Route::get('/fc', '\App\Http\Controllers\FangcangController@index');
Route::get('/new_house', '\App\Http\Controllers\FangcangController@new_house');
Route::get('/rent_house', '\App\Http\Controllers\FangcangController@rent_house');
//PC端汽车频道
Route::get('/qiche', '\App\Http\Controllers\QicheController@index');
//PC端家居频道
Route::get('/jiaju', '\App\Http\Controllers\JiajuController@index');
//PC端教育频道
Route::get('/jiaoyu', '\App\Http\Controllers\JiaoyuController@index');
//PC端本地服务频道
Route::get('/bdfw', '\App\Http\Controllers\BdfwController@index');
//PC端美食频道
Route::get('/nicefood', '\App\Http\Controllers\NiceFoodController@index');
//PC端婚恋频道
Route::get('/jiaoyou/', '\App\Http\Controllers\JiaoyouController@index');

//-----手机端各大频道路由-------------------
//手机端茂名头条频道
Route::get('/mobile/mmtt', '\App\Http\Controllers\mobile\MmttController@index');

//手机端值得买频道
Route::get('/mobile/article_promo', '\App\Http\Controllers\mobile\ArticleController@promo');

//手机端新房产频道
Route::get('/mobile/fc', '\App\Http\Controllers\mobile\FangcangController@index');
//手机端二手房产频道
Route::get('/mobile/second', '\App\Http\Controllers\mobile\FangcangController@second');
//手机端租房频道
Route::get('/mobile/rent', '\App\Http\Controllers\mobile\FangcangController@rent');


//手机端汽车频道
Route::get('/mobile/qiche', '\App\Http\Controllers\mobile\QicheController@index');
//手机家居频道
Route::get('/mobile/homefurnishing', '\App\Http\Controllers\mobile\HomeFurnishingController@index');
//爆款频道
Route::get('/mobile/popular', '\App\Http\Controllers\mobile\PopularProductController@index');
//手机端教育频道
Route::get('/mobile/education', '\App\Http\Controllers\mobile\EducationController@index');



//手机端本地服务频道
Route::get('/mobile/bdfw', '\App\Http\Controllers\mobile\BdfwController@index');
//手机端美食频道
Route::get('/mobile/nicefood', '\App\Http\Controllers\mobile\NiceFoodController@index');

//优惠信息-用户发布
Route::get('/mobile/promoinfo', '\App\Http\Controllers\mobile\PromoInfoController@index');
Route::post('/mobile/promoinfo/insert', '\App\Http\Controllers\mobile\PromoInfoController@insert');
Route::get('/mobile/promoinfo/detail/{id}', '\App\Http\Controllers\mobile\PromoInfoController@detail');


//本地服务-用户发布
Route::get('/mobile/localservice', '\App\Http\Controllers\mobile\LocalServiceController@index');
Route::post('/mobile/localservice/insert', '\App\Http\Controllers\mobile\LocalServiceController@insert');
Route::get('/mobile/localservice/detail/{id}', '\App\Http\Controllers\mobile\LocalServiceController@detail');

//教育-用户发布

Route::post('/mobile/education/insert', '\App\Http\Controllers\mobile\EducationController@insert');
Route::get('/mobile/education/detail/{id}', '\App\Http\Controllers\mobile\EducationController@detail');




//汽车-用户发布
Route::get('/mobile/car', '\App\Http\Controllers\mobile\CarController@index');
Route::post('/mobile/car/insert', '\App\Http\Controllers\mobile\CarController@insert');
Route::get('/mobile/car/detail/{id}', '\App\Http\Controllers\mobile\CarController@detail');

//房产-用户发布
Route::get('/mobile/house', '\App\Http\Controllers\mobile\HouseController@index');
Route::post('/mobile/house/insert', '\App\Http\Controllers\mobile\HouseController@insert');
Route::get('/mobile/house/detail/{id}', '\App\Http\Controllers\mobile\HouseController@detail');




//征婚交友频道
Route::get('/mobile/jiaoyou/', '\App\Http\Controllers\mobile\JiaoyouController@index');
Route::get('/mobile/jiaoyou/join', '\App\Http\Controllers\mobile\JiaoyouController@join');
Route::post('/mobile/jiaoyou/insert', '\App\Http\Controllers\mobile\JiaoyouController@insert');
Route::get('/mobile/jiaoyou/edit', '\App\Http\Controllers\mobile\JiaoyouController@edit');
Route::post('/mobile/jiaoyou/update', '\App\Http\Controllers\mobile\JiaoyouController@update');

//商家手机站管理后台

Route::get('/mobile/shopadmin/', '\App\Http\Controllers\MobileAdmin\ShopAdminController@index');

Route::get('/mobile/shopadmin/apply_shop', '\App\Http\Controllers\MobileAdmin\ShopAdminController@apply_shop');

Route::post('/mobile/shopadmin/submit_apply_shop', '\App\Http\Controllers\MobileAdmin\ShopAdminController@submit_apply_shop');

Route::get('/mobile/shopadmin/edit', '\App\Http\Controllers\MobileAdmin\ShopAdminController@edit');
Route::post('/mobile/shopadmin/update', '\App\Http\Controllers\MobileAdmin\ShopAdminController@update');
Route::get('/mobile/shopadmin/logo_edit', '\App\Http\Controllers\MobileAdmin\ShopAdminController@logo_edit');
Route::post('/mobile/shopadmin/logo_update', '\App\Http\Controllers\MobileAdmin\ShopAdminController@logo_update');


Route::get('/mobile/productadmin/', '\App\Http\Controllers\MobileAdmin\ProductAdminController@index');
Route::get('/mobile/productadmin/add', '\App\Http\Controllers\MobileAdmin\ProductAdminController@add');
Route::post('/mobile/productadmin/insert', '\App\Http\Controllers\MobileAdmin\ProductAdminController@insert');


//手机站 餐饮店会员中心

Route::get('/mobile/hotelusercenter/', '\App\Http\Controllers\mobile\HotelUserCenterController@index');

Route::get('/mobile/recharge/', '\App\Http\Controllers\mobile\RechargeController@index');
Route::post('/mobile/recharge/recharge', '\App\Http\Controllers\mobile\RechargeController@recharge');
Route::get('/mobile/cardcoupon/', '\App\Http\Controllers\mobile\CardCouponController@index');

Route::get('/mobile/HotelScoreProduct', '\App\Http\Controllers\mobile\HotelScoreProductController@index');

Route::get('/mobile/HotelScoreProduct/detail/{id}', '\App\Http\Controllers\mobile\HotelScoreProductController@detail');
Route::post('/mobile/HotelScoreProduct/exchange', '\App\Http\Controllers\mobile\HotelScoreProductController@exchange');


Route::get('/mobile/HotelWeixingProduct', '\App\Http\Controllers\mobile\HotelWeixingProductController@index');
Route::get('/mobile/HotelWeixingProduct/detail/{id}', '\App\Http\Controllers\mobile\HotelWeixingProductController@detail');

Route::get('/mobile/HotelOrder/{id}', '\App\Http\Controllers\mobile\HotelOrderController@index');

Route::get('/mobile/HotelScoreOrder', '\App\Http\Controllers\mobile\HotelScoreOrderController@index');

//生成饭店商城商品订单
Route::post('/mobile/HotelOrder/ConfirmHotelOrder/', '\App\Http\Controllers\mobile\HotelOrderController@ConfirmHotelOrder');
//提交饭店商城商品订单
Route::post('/mobile/HotelOrder/insert/', '\App\Http\Controllers\mobile\HotelOrderController@insert');
//
Route::any('/mobile/hotelorder/wechat_notify', '\App\Http\Controllers\mobile\HotelOrderController@wechat_notify');

//饭店优惠劵
Route::get('/mobile/HotelCouponRec/', '\App\Http\Controllers\mobile\HotelCouponRecController@index');
Route::get('/mobile/HotelCouponRec/mycoupon', '\App\Http\Controllers\mobile\HotelCouponRecController@MyCoupon');
Route::post('/mobile/HotelCouponRec/receive/{id}', '\App\Http\Controllers\mobile\HotelCouponRecController@receive');

//饭店门店列表
Route::get('/mobile/store/', '\App\Http\Controllers\mobile\HotelStoreController@index');


//饭店领取会员卡
Route::get('/mobile/card', '\App\Http\Controllers\mobile\CardController@index');
Route::post('/mobile/card/receive', '\App\Http\Controllers\mobile\CardController@receive');


//在线调查
Route::get('/mobile/invest', '\App\Http\Controllers\mobile\InvestController@index');

//在线投票主页
Route::get('/mobile/vote', '\App\Http\Controllers\mobile\VoteController@index');
//投票详细页面
Route::get('/mobile/vote/vote_option_detail/{id}', '\App\Http\Controllers\mobile\VoteController@vote_option_detail');
//投票动作
Route::post('/mobile/vote/vote_option_insert', '\App\Http\Controllers\mobile\VoteController@vote_option_insert');





//手机版前台验证
Route::middleware(['mobile_session'])->group(function () {
    
    Route::get('/mobile/user_center/', '\App\Http\Controllers\mobile\UserCenterController@index');
    
    
    Route::get('/jy_mobile/user_center/', '\App\Http\Controllers\jy_mobile\UserCenterController@index');
    
});

// 登出行为
Route::get('/mobile/logout', '\App\Http\Controllers\mobile\LoginController@logout');

Route::get('/mobile/order/{id}', '\App\Http\Controllers\mobile\OrderController@index');
Route::post('/mobile/order/insert/{id}', '\App\Http\Controllers\mobile\OrderController@insert');
Route::get('/mobile/order/success', '\App\Http\Controllers\mobile\OrderController@success');


//婚恋网手机站
Route::get('/jy_mobile/index/', '\App\Http\Controllers\jy_mobile\IndexController@index');
Route::get('/jy_mobile/login/', '\App\Http\Controllers\jy_mobile\LoginController@index');
Route::post('/jy_mobile/login/', '\App\Http\Controllers\jy_mobile\LoginController@login');


Route::get('/jy_mobile/reg/', '\App\Http\Controllers\jy_mobile\RegController@index');
Route::post('/jy_mobile/reg/', '\App\Http\Controllers\jy_mobile\RegController@reg');

Route::get('/jy_mobile/data/', '\App\Http\Controllers\jy_mobile\DataController@index');

Route::post('/jy_mobile/data/update', '\App\Http\Controllers\jy_mobile\DataController@update');





    //值得买网登录
    Route::any('/mobile/login/', '\App\Http\Controllers\mobile\LoginController@index');
    Route::any('/mobile/oauth_callback/', '\App\Http\Controllers\mobile\LoginController@oauth_callback');
     Route::any('/mobile/weixing_login/', '\App\Http\Controllers\mobile\LoginController@weixing_login');
     
    //茂名家居网登录
     
    Route::any('/jiaju_mobile/login/', '\App\Http\Controllers\jiaju_mobile\LoginController@index');
    Route::any('/jiaju_mobile/weixing_login/', '\App\Http\Controllers\jiaju_mobile\LoginController@weixing_login');
    Route::any('/jiaju_mobile/oauth_callback/', '\App\Http\Controllers\jiaju_mobile\LoginController@oauth_callback'); 
    
     Route::get('/jiaju_mobile/order/myorder', '\App\Http\Controllers\jiaju_mobile\OrderController@myorder');
    Route::get('/jiaju_mobile/order/{id}', '\App\Http\Controllers\jiaju_mobile\OrderController@index');
    Route::post('/jiaju_mobile/order/insert/{id}', '\App\Http\Controllers\jiaju_mobile\OrderController@insert');
    Route::get('/jiaju_mobile/order/success', '\App\Http\Controllers\jiaju_mobile\OrderController@success'); 
    Route::get('/jiaju_mobile/order/detail/{id}', '\App\Http\Controllers\jiaju_mobile\OrderController@detail');
    
    
    Route::get('/jiaju_mobile/user/{msg}', '\App\Http\Controllers\jiaju_mobile\UserController@index');
    
    Route::post('/jiaju_mobile/user/update/{id}', '\App\Http\Controllers\jiaju_mobile\UserController@update');
    
    Route::get('/jiaju_mobile/myshop/', '\App\Http\Controllers\jiaju_mobile\ShopController@myshop');
    Route::get('/jiaju_mobile/shopadmin/', '\App\Http\Controllers\MobileAdmin\ShopAdminController@index');
    Route::get('/jiaju_mobile/address/', '\App\Http\Controllers\jiaju_mobile\AddressController@index');
    Route::get('/jiaju_mobile/recommend/', '\App\Http\Controllers\jiaju_mobile\RecommendController@index');
    Route::get('/jiaju_mobile/recommend/qrcode/', '\App\Http\Controllers\jiaju_mobile\RecommendController@qrcode');
    Route::get('/jiaju_mobile/recommend/invite/{id}', '\App\Http\Controllers\jiaju_mobile\RecommendController@invite');
    Route::get('/jiaju_mobile/recommend/oauth_callback', '\App\Http\Controllers\jiaju_mobile\RecommendController@oauth_callback');
    
    
    
    
    //结婚网登录
    Route::any('/jy_mobile/login/', '\App\Http\Controllers\jy_mobile\LoginController@index');
    Route::any('/jy_mobile/oauth_callback/', '\App\Http\jy_mobile\mobile\LoginController@oauth_callback');
    
    //微信公众号平台
    Route::any('/wx/veri', '\App\Http\Controllers\wx\IndexController@veri');
    Route::any('/wx/index', '\App\Http\Controllers\wx\IndexController@index');
    Route::any('/wx/oauth_callback', '\App\Http\Controllers\wx\IndexController@oauth_callback');
    
    Route::get('/mobile/couponrec/receive/{id}', '\App\Http\Controllers\mobile\CouponRecController@receive');
     
     
    Route::any('/mobile/login/test', '\App\Http\Controllers\mobile\LoginController@test');
    
    
//redis测试
Route::get('testRedis','RedisController@testRedis')->name('testRedis');