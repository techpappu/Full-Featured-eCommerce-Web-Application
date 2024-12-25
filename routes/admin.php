
<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/demo', \App\Http\Controllers\DemoController::class)->name('demo');


// Route::middleware('auth')->group(function(){
//     Route::get('/admin/dashboard', function () {
//         return view('backend.dashboard');
//     })->name('adminDashboard');
// });
Route::get('/admin/dashboard', function () {
    return view('backend.dashboard');
})->name('adminDashboard');

# Back-end users - only admin role users will be accessing this module in backend to manage users
Route::get('/admin/user', \App\Http\Controllers\Backend\User\Index::class)->name('admin.user');
Route::get('/admin/user/create', \App\Http\Controllers\Backend\User\Create::class)->name('admin.user.create');
Route::post('/admin/user/create', \App\Http\Controllers\Backend\User\Create::class)->name('admin.user.post.create');
Route::get('/admin/user/update/{id}', \App\Http\Controllers\Backend\User\Update::class)->name('admin.user.update');
Route::post('/admin/user/update/{id}', \App\Http\Controllers\Backend\User\Update::class)->name('admin.user.post.update');
Route::post('/admin/user/delete/{id}', \App\Http\Controllers\Backend\User\Delete::class)->name('admin.user.delete');

# Back-end roles - only admin role users will be accessing this module in backend to manage roles
Route::get('/admin/role', \App\Http\Controllers\Backend\Role\Index::class)->name('admin.role');
Route::get('/admin/role/create', \App\Http\Controllers\Backend\Role\Create::class)->name('admin.role.create');
Route::post('/admin/role/create', \App\Http\Controllers\Backend\Role\Create::class)->name('admin.role.post.create');
Route::get('/admin/role/update/{id}', \App\Http\Controllers\Backend\Role\Update::class)->name('admin.role.update');
Route::post('/admin/role/update/{id}', \App\Http\Controllers\Backend\Role\Update::class)->name('admin.role.post.update');
Route::post('/admin/role/delete/{id}', \App\Http\Controllers\Backend\Role\Delete::class)->name('admin.role.delete');
Route::get('/admin/role/permissions/{id}', \App\Http\Controllers\Backend\Role\Permission::class)->name('admin.role.permissions');
Route::post('/admin/role/permissions/{id}', \App\Http\Controllers\Backend\Role\Permission::class)->name('admin.role.permissions.post');

# Back-end permissions - only admin role users will be accessing this module in backend to manage permissions
Route::get('/admin/permission', \App\Http\Controllers\Backend\Permission\Index::class)->name('admin.permission');
Route::get('/admin/permission/create', \App\Http\Controllers\Backend\Permission\Create::class)->name('admin.permission.create');
Route::post('/admin/permission/create', \App\Http\Controllers\Backend\Permission\Create::class)->name('admin.permission.post.create');
Route::get('/admin/permission/update/{id}', \App\Http\Controllers\Backend\Permission\Update::class)->name('admin.permission.update');
Route::post('/admin/permission/update/{id}', \App\Http\Controllers\Backend\Permission\Update::class)->name('admin.permission.post.update');
Route::post('/admin/permission/delete/{id}', \App\Http\Controllers\Backend\Permission\Delete::class)->name('admin.permission.delete');

# Back-end pages - this section will be used to manage shop default pages and create new pages
Route::get('/admin/page', \App\Http\Controllers\Backend\Page\Index::class)->name('admin.page');
Route::get('/admin/page/create', \App\Http\Controllers\Backend\Page\Create::class)->name('admin.page.create');
Route::post('/admin/page/create', \App\Http\Controllers\Backend\Page\Create::class)->name('admin.page.post.create');
Route::get('/admin/page/update/{id}', \App\Http\Controllers\Backend\Page\Update::class)->name('admin.page.update');
Route::post('/admin/page/update/{id}', \App\Http\Controllers\Backend\Page\Update::class)->name('admin.page.post.update');
Route::post('/admin/page/delete/{id}', \App\Http\Controllers\Backend\Page\Delete::class)->name('admin.page.delete');

# Back-end Slides - this section will be used to manage shop default slide and create new slide
Route::get('/admin/slide', \App\Http\Controllers\Backend\Slide\Index::class)->name('admin.slide');
Route::get('/admin/slide/create', \App\Http\Controllers\Backend\Slide\Create::class)->name('admin.slide.create');
Route::post('/admin/slide/create', \App\Http\Controllers\Backend\Slide\Create::class)->name('admin.slide.post.create');
Route::get('/admin/slide/update/{id}', \App\Http\Controllers\Backend\Slide\Update::class)->name('admin.slide.update');
Route::post('/admin/slide/update/{id}', \App\Http\Controllers\Backend\Slide\Update::class)->name('admin.slide.post.update');
Route::post('/admin/slide/delete/{id}', \App\Http\Controllers\Backend\Slide\Delete::class)->name('admin.slide.delete');


# Back-end taxes - this section will be used to manage shop default taxes and create new taxes
Route::get('/admin/tax', \App\Http\Controllers\Backend\Tax\Index::class)->name('admin.tax');
Route::get('/admin/tax/create', \App\Http\Controllers\Backend\Tax\Create::class)->name('admin.tax.create');
Route::post('/admin/tax/create', \App\Http\Controllers\Backend\Tax\Create::class)->name('admin.tax.post.create');
Route::get('/admin/tax/update/{id}', \App\Http\Controllers\Backend\Tax\Update::class)->name('admin.tax.update');
Route::post('/admin/tax/update/{id}', \App\Http\Controllers\Backend\Tax\Update::class)->name('admin.tax.post.update');
Route::post('/admin/tax/delete/{id}', \App\Http\Controllers\Backend\Tax\Delete::class)->name('admin.tax.delete');

# Back-end shipping - this section will be used to manage shop default shipping methods and create new shipping methods
Route::get('/admin/shipping', \App\Http\Controllers\Backend\Shipping\Index::class)->name('admin.shipping');
Route::get('/admin/shipping/create', \App\Http\Controllers\Backend\Shipping\Create::class)->name('admin.shipping.create');
Route::post('/admin/shipping/create', \App\Http\Controllers\Backend\Shipping\Create::class)->name('admin.shipping.post.create');
Route::get('/admin/shipping/update/{id}', \App\Http\Controllers\Backend\Shipping\Update::class)->name('admin.shipping.update');
Route::post('/admin/shipping/update/{id}', \App\Http\Controllers\Backend\Shipping\Update::class)->name('admin.shipping.post.update');
Route::post('/admin/shipping/delete/{id}', \App\Http\Controllers\Backend\Shipping\Delete::class)->name('admin.shipping.delete');

# Back-end Payments - this section will be used to manage shop default Payment methods and create new Payment methods
Route::get('/admin/payment', \App\Http\Controllers\Backend\Payment\Index::class)->name('admin.payment');
Route::get('/admin/payment/create', \App\Http\Controllers\Backend\Payment\Create::class)->name('admin.payment.create');
Route::post('/admin/payment/create', \App\Http\Controllers\Backend\Payment\Create::class)->name('admin.payment.post.create');
Route::get('/admin/payment/update/{id}', \App\Http\Controllers\Backend\Payment\Update::class)->name('admin.payment.update');
Route::post('/admin/payment/update/{id}', \App\Http\Controllers\Backend\Payment\Update::class)->name('admin.payment.post.update');
Route::post('/admin/payment/delete/{id}', \App\Http\Controllers\Backend\Payment\Delete::class)->name('admin.payment.delete');

# Back-end discounts - this section will be used to manage shop default discounts and create new discounts
Route::get('/admin/discount', \App\Http\Controllers\Backend\Discount\Index::class)->name('admin.discount');
Route::get('/admin/discount/create', \App\Http\Controllers\Backend\Discount\Create::class)->name('admin.discount.create');
Route::post('/admin/discount/create', \App\Http\Controllers\Backend\Discount\Create::class)->name('admin.discount.post.create');
Route::get('/admin/discount/update/{id}', \App\Http\Controllers\Backend\Discount\Update::class)->name('admin.discount.update');
Route::post('/admin/discount/update/{id}', \App\Http\Controllers\Backend\Discount\Update::class)->name('admin.discount.post.update');
Route::post('/admin/discount/delete/{id}', \App\Http\Controllers\Backend\Discount\Delete::class)->name('admin.discount.delete');

# Back-end categories - this section will be used to manage shop categories and create new categories
Route::get('/admin/category', \App\Http\Controllers\Backend\Category\Index::class)->name('admin.category');
Route::get('/admin/category/create', \App\Http\Controllers\Backend\Category\Create::class)->name('admin.category.create');
Route::post('/admin/category/create', \App\Http\Controllers\Backend\Category\Create::class)->name('admin.category.post.create');
Route::get('/admin/category/update/{id}', \App\Http\Controllers\Backend\Category\Update::class)->name('admin.category.update');
Route::post('/admin/category/update/{id}', \App\Http\Controllers\Backend\Category\Update::class)->name('admin.category.post.update');
Route::post('/admin/category/delete/{id}', \App\Http\Controllers\Backend\Category\Delete::class)->name('admin.category.delete');

# Back-end products - this section will be used to manage shop products and create new products
Route::get('/admin/product', \App\Http\Controllers\Backend\Product\Index::class)->name('admin.product');
Route::get('/admin/product/create', \App\Http\Controllers\Backend\Product\Create::class)->name('admin.product.create');
Route::post('/admin/product/create', \App\Http\Controllers\Backend\Product\Create::class)->name('admin.product.post.create');
Route::get('/admin/product/update/{id}', \App\Http\Controllers\Backend\Product\Update::class)->name('admin.product.update');
Route::post('/admin/product/update/{id}', \App\Http\Controllers\Backend\Product\Update::class)->name('admin.product.post.update');
Route::post('/admin/product/delete/{id}', \App\Http\Controllers\Backend\Product\Delete::class)->name('admin.product.delete');

//Image process
Route::get('/admin/product/images/{id}', \App\Http\Controllers\Backend\Product\Image\Index::class)->name('admin.product.images');
Route::post('/admin/product/images/delete/{id}', \App\Http\Controllers\Backend\Product\Image\Delete::class)->name('admin.product.images.delete');
Route::post('/admin/product/images/create', \App\Http\Controllers\Backend\Product\Image\Create::class)->name('admin.product.images.create');


# Back-end orders - this section will be used to review orders and process them
Route::get('/admin/order', \App\Http\Controllers\Backend\Order\Index::class)->name('admin.order');
Route::get('/admin/order/create', \App\Http\Controllers\Backend\Order\Create::class)->name('admin.order.create');
Route::post('/admin/order/create', \App\Http\Controllers\Backend\Order\Create::class)->name('admin.order.post.create');
Route::get('/admin/order/update/{id}', \App\Http\Controllers\Backend\Order\Update::class)->name('admin.order.update');
Route::post('/admin/order/update/{id}', \App\Http\Controllers\Backend\Order\Update::class)->name('admin.order.post.update');
Route::get('/admin/order/view/{id}', \App\Http\Controllers\Backend\Order\View::class)->name('admin.order.view');

# Back-end settings - this will be used to view and update shop settings
Route::get('/admin/setting', \App\Http\Controllers\Backend\Setting\Index::class)->name('admin.setting');
Route::post('/admin/setting', \App\Http\Controllers\Backend\Setting\Index::class)->name('admin.setting.post.update');


# Back-end settings - this will be used to view and update shop settings
Route::get('/admin/woo/orders','App\livewire\WooCommerce\Order')->name('admin.woo.orders');
