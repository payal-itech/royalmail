<?php

Auth::routes();
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingDetailController;
use App\Http\Controllers\ShippingInfoController;
use App\Http\Controllers\BillingInfoController;
use App\Http\Controllers\OrderLineController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\LabelController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
// Route::group(['middleware' => ['web', 'auth']], function () {
// Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/versions',[VersionController::class,'index']);
Route::get('/versions', [VersionController::class, 'index'])->name('versions.index');

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/create', [OrderController::class,'create'])->name('orders.create');
Route::post('/orders', [OrderController::class,'store'])->name('orders.store');
Route::get('/orders/batch', [OrderController::class, 'batch'])->name('orders.batch');
// Route::get('/orders/delete', [OrderController::class, 'delete'])->name('orders.delete');
// Route::post('/orders/delete', [OrderController::class, 'delete'])->name('orders.delete');
Route::get('/orders/search', [OrderController::class, 'search'])->name('orders.search');
Route::get('/orders/reprint/{orderId}', [OrderController::class,'reprint'])->name('orders.reprint');
Route::get('/orders/status', [OrderController::class, 'status'])->name('orders.status');


Route::get('/shipping-details', [ShippingDetailController::class, 'index'])->name('shippingdetails.index');
Route::get('/shippingdetails/search', [ShippingDetailController::class, 'search'])->name('shippingdetails.search');
Route::get('/shipping-infos', [ShippingInfoController::class, 'index'])->name('shippinginfos.index');
Route::get('/billing-infos', [BillingInfoController::class, 'index'])->name('billinginfos.index');
Route::get('/order-lines', [OrderLineController::class, 'index'])->name('orderlines.index');

// Route::get('/statuses',[StatusController::class,'index']);
// Route::get('/statuses', [StatusController::class, 'index'])->name('statuses.index');

// Route::get('/labels',[LabelController::class,'index']);
// Route::get('/labels',[LabelController::class,'index'])->name('labels.index');
