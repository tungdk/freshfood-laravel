<?php


use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'account','namespace'=>'Auth'], function () {
    Route::get('register', 'RegisterController@getFormRegister')->name('get.register');
    Route::post('register', 'RegisterController@postRegister');

//    Route::get('login', 'LoginController@getFormLogin')->name('get.login');
//    Route::post('login', 'LoginController@postLogin');


    Route::get('reset-password', 'ResetPasswordController@getEmailReset')->name('get.email_reset_password');

    Route::post('reset-password', 'ResetPasswordController@checkEmailReset');

    Route::get('new-password', 'ResetPasswordController@newPassword')->name('get.new_password');

    Route::post('new-password', 'ResetPasswordController@savePassword');




});

// User
Route::group(['prefix' => 'account','namespace'=>'User','middleware'=>'check_login_user'], function () {
    Route::get('update-info', 'UserController@updateInfo')->name('get.user.update_info');

    Route::post('update-info', 'UserController@saveUpdateInfo');

    Route::get('order-info', 'UserController@orderInfo')->name('get.user.order_info');
    Route::get('favourite', 'UserFavouriteController@index')->name('get.user.favourite');
    Route::get('delete/{idProduct}', 'UserFavouriteController@delete')->name('get.user.delete');


    Route::post('ajax-favourite/{idProduct}', 'UserFavouriteController@addFavourite')->name('ajax_get.user.add_favourite');

    Route::post('ajax-rating', 'UserRatingController@addRatingProduct')->name('ajax_post.user.rating_add');



});
// Frontend


Route::group(['namespace'=>'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('san-pham', 'ProductController@index')->name('get.product.list');
    Route::get('san-pham/{slug}', 'ProductDetailController@getProductDetail')->name('get.product.detail');

    // giỏ hàng
    Route::get('gio-hang', 'ShoppingCartController@index')->name('get.shopping.list');
    Route::prefix('shopping')->group(function(){

        Route::get('add/{id}','ShoppingCartController@add')->name('get.shopping.add');
        Route::get('addnow/{id}','ShoppingCartController@addnow')->name('get.shopping.addnow');
        Route::get('delete/{id}','ShoppingCartController@delete')->name('get.shopping.delete');
        Route::get('update/{id}','ShoppingCartController@update')->name('ajax.get.shopping.update');

        Route::post('/addcart','ShoppingCartController@portCart')->name('get.shopping.portCart');;
    });

    // đơn hàng
    Route::get('don-hang', 'CheckoutController@index')->name('get.checkout');
    Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
    Route::post('pay','CheckoutController@postPay')->name('get.checkout.pay');

    // bài viết
    Route::get('bai-viet', 'BlogController@index')->name('get.blog.home');
    Route::get('bai-viet/{slug}', 'ArticleDetailController@index')->name('get.blog.detail');

    // giảm giá
    Route::get('giam-gia', 'ProductSaleController@index')->name('get.product_sale');
});



//Backend

Route::group(['prefix' => 'laravel-filemanager'], function () {
    // \UniSharp\LaravelFilemanager\Lfm::routes();
});

//Route::group(['prefix' => 'admin-auth','namespace'=>'Backend\Auth'], function () {
////    Route::get('login', 'AdminLoginController@getLoginAdmin')->name('get.login.admin');
////    Route::post('login', 'AdminLoginController@postLoginAdmin');
//
//    Route::get('logout', 'AdminLoginController@getLogoutAdmin')->name('get.logout.admin');
//});
Route::group(['prefix' => 'api-admin','namespace'=>'Backend','middleware'=>'admin'], function () {


    Route::get('/', 'AdminStatisticalController@index')->name('admin.statistical');

    /**
     * Route danh mục sản phẩm
     */
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'AdminCategoryController@index')->name('admin.category.index');
        Route::get('create', 'AdminCategoryController@create')->name('admin.category.create');
        Route::post('create', 'AdminCategoryController@store');

        Route::get('update/{id}', 'AdminCategoryController@edit')->name('admin.category.update');
        Route::post('update/{id}', 'AdminCategoryController@update');

        Route::get('active/{id}', 'AdminCategoryController@active')->name('admin.category.active');
        Route::get('hot/{id}', 'AdminCategoryController@hot')->name('admin.category.hot');
        Route::get('delete/{id}', 'AdminCategoryController@delete')->name('admin.category.delete');
    });

     /**
     * Route danh mục con sản phẩm
     */
    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('', 'AdminSubCategoryController@index')->name('admin.subcategory.index');
        Route::get('create', 'AdminSubCategoryController@create')->name('admin.subcategory.create');
        Route::post('create', 'AdminSubCategoryController@store');

        Route::get('update/{id}', 'AdminSubCategoryController@edit')->name('admin.subcategory.update');
        Route::post('update/{id}', 'AdminSubCategoryController@update');

        Route::get('active/{id}', 'AdminSubCategoryController@active')->name('admin.subcategory.active');
        Route::get('delete/{id}', 'AdminSubCategoryController@delete')->name('admin.subcategory.delete');
    });

     /**
     * Route đơn vị tính
     */
    Route::group(['prefix' => 'unit'], function () {
        Route::get('', 'AdminUnitController@index')->name('admin.unit.index');
        Route::get('create', 'AdminUnitController@create')->name('admin.unit.create');
        Route::post('create', 'AdminUnitController@store');

        Route::get('update/{id}', 'AdminUnitController@edit')->name('admin.unit.update');
        Route::post('update/{id}', 'AdminUnitController@update');

        Route::get('delete/{id}', 'AdminUnitController@delete')->name('admin.unit.delete');
    });


    /**
     * Route sản phẩm
     */
    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'AdminProductController@index')->name('admin.product.index');
        Route::get('create', 'AdminProductController@create')->name('admin.product.create');
        Route::post('create', 'AdminProductController@store');

        Route::get('update/{id}', 'AdminProductController@edit')->name('admin.product.update');
        Route::post('update/{id}', 'AdminProductController@update');

        Route::get('active/{id}', 'AdminProductController@active')->name('admin.product.active');
        Route::get('hot/{id}', 'AdminProductController@hot')->name('admin.product.hot');
        Route::get('delete/{id}', 'AdminProductController@delete')->name('admin.product.delete');
    });

    /**
     * Route nhà sản xuất
     */
    Route::group(['prefix' => 'publisher'], function () {
        Route::get('', 'AdminPublisherController@index')->name('admin.publisher.index');
        Route::get('create', 'AdminPublisherController@create')->name('admin.publisher.create');
        Route::post('create', 'AdminPublisherController@store');

        Route::get('update/{id}', 'AdminPublisherController@edit')->name('admin.publisher.update');
        Route::post('update/{id}', 'AdminPublisherController@update');

        Route::get('delete/{id}', 'AdminPublisherController@delete')->name('admin.publisher.delete');
    });

    /**
     * Route thành viên
     */
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'AdminUserController@index')->name('admin.user.index');
        Route::get('create', 'AdminUserController@create')->name('admin.user.create');
        Route::post('create', 'AdminUserController@store');

        Route::get('update/{id}', 'AdminUserController@edit')->name('admin.user.update');
        Route::post('update/{id}', 'AdminUserController@update');

        Route::get('delete/{id}', 'AdminUserController@delete')->name('admin.user.delete');
    });

     /**
     * Route Đơn hàng
     */
    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'AdminOrderController@index')->name('admin.order.index');
        Route::get('delete/{id}', 'AdminOrderController@delete')->name('admin.order.delete');
        Route::get('order-detail-delete/{id}', 'AdminOrderController@deleteOrderDetail')->name('ajax.admin.order.order_detail_delete');
        Route::get('view-orderdetail/{id}', 'AdminOrderController@getOrderDetail')->name('ajax.admin.order.detail');

        Route::get('action/{action}/{id}', 'AdminOrderController@getAction')->name('admin.order.action');


    });

     /**
     * Route menu
     */
    Route::group(['prefix' => 'menu'], function () {
        Route::get('', 'AdminMenuController@index')->name('admin.menu.index');
        Route::get('create', 'AdminMenuController@create')->name('admin.menu.create');
        Route::post('create', 'AdminMenuController@store');

        Route::get('update/{id}', 'AdminMenuController@edit')->name('admin.menu.update');
        Route::post('update/{id}', 'AdminMenuController@update');

        Route::get('active/{id}', 'AdminMenuController@active')->name('admin.menu.active');
        Route::get('hot/{id}', 'AdminMenuController@hot')->name('admin.menu.hot');
        Route::get('delete/{id}', 'AdminMenuController@delete')->name('admin.menu.delete');
    });

      /**
     * Route Article
     */
    Route::group(['prefix' => 'article'], function () {
        Route::get('', 'AdminArticleController@index')->name('admin.article.index');
        Route::get('create', 'AdminArticleController@create')->name('admin.article.create');
        Route::post('create', 'AdminArticleController@store');

        Route::get('update/{id}', 'AdminArticleController@edit')->name('admin.article.update');
        Route::post('update/{id}', 'AdminArticleController@update');

        Route::get('active/{id}', 'AdminArticleController@active')->name('admin.article.active');
        Route::get('hot/{id}', 'AdminArticleController@hot')->name('admin.article.hot');
        Route::get('delete/{id}', 'AdminArticleController@delete')->name('admin.article.delete');
    });

      /**
     * Route Rating
     */
    Route::group(['prefix' => 'rating'], function () {
        Route::get('', 'AdminRatingController@index')->name('admin.rating.index');

        Route::get('active/{id}', 'AdminRatingController@active')->name('admin.rating.active');

        Route::get('delete/{id}', 'AdminRatingController@delete')->name('admin.rating.delete');
    });

});

 Auth::routes();


