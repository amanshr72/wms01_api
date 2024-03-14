<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DeliveryOrderApiContoller;
use App\Http\Controllers\EmployeeDiscPointsStatusApiContoller;
use App\Http\Controllers\PackingSlipAgainstSoController;
use App\Http\Controllers\PullDataController;
use App\Http\Controllers\PurchaseVoucherApiContoller;
use App\Http\Controllers\SaleInvoiceApiController;
use App\Http\Controllers\SaleOrderApiController;
use App\Http\Controllers\StockInHandApiContoller;
use App\Http\Controllers\PuChallanReturnApiContoller;
use App\Http\Controllers\PurchaseOrderApiContoller;
use App\Http\Controllers\SaveAssignedDOController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\StockReceiptApiController;
use App\Http\Controllers\StockTransferInApiContoller;
use App\Http\Controllers\StockTransferOutApiContoller;
use App\Http\Controllers\WarehouseApiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('dashboard'); })->name('dashboard');

/* Post Data To API Route */
Route::get('saleorder', [WarehouseApiController::class, 'saleorder'])->name('saleorder');
Route::get('listitems', [WarehouseApiController::class, 'listitems'])->name('listitems');

/* API Routes */
Route::get('fetch-and-store', [WarehouseApiController::class, 'fetchAndPostDataToApi'])->name('fetchAndPostDataToApi');
Route::get('fetch-and-store-live', [WarehouseApiController::class, 'fetchAndPostDataToLiveApi'])->name('fetch-and-store-live');
Route::get('get-saleorder', [SaleOrderApiController::class, 'fetchDataFromApi']);
Route::get('get-sale-invoice', [SaleInvoiceApiController::class, 'fetchDataFromApi']);
Route::get('get-purchase-voucher', [PurchaseVoucherApiContoller::class, 'fetchDataFromApi']);

/* // not tested routes - Getdata = null
Route::get('pu-challan-return', [PuChallanReturnApiContoller::class, 'fetchDataFromApi']);
*/

Route::get('get-stock-in-hand', [StockInHandApiContoller::class, 'fetchDataFromApi']);
Route::get('get-delta-stock-in-hand', [StockInHandApiContoller::class, 'fetchDeltaStockDataFromApi']);
Route::get('get-employee-disc-point', [EmployeeDiscPointsStatusApiContoller::class, 'fetchDataFromApi']);
Route::get('get-delivery-order', [DeliveryOrderApiContoller::class, 'fetchDataFromApi']);

/* Display data retrieved from the database, following its prior transmission through API. */
Route::get('sale-order', [PullDataController::class, 'viewSaleOrderData'])->name('view.saleOrder');
Route::get('sale-challan-return', [PullDataController::class, 'viewsaleChallanReturn'])->name('view.saleChallanReturn');
Route::get('sale-invoice', [PullDataController::class, 'viewSaleInvoice'])->name('view.viewSaleInvoice');
Route::get('sale-purchase-voucher', [PullDataController::class, 'viewSalePurchaseOrderData'])->name('view.salePurchaseOrder');
Route::get('sale-purchase-voucher-order', [PullDataController::class, 'viewSalePurchaseVoucherOrder'])->name('view.salePurchaseVoucherOrder');
Route::get('stock-transferin', [PullDataController::class, 'viewStockTransferInData'])->name('view.stockTransferIn');
Route::get('stock-transferout', [PullDataController::class, 'viewStockTransferOutData'])->name('view.stockTransferOut');
Route::get('stock-in-hand', [PullDataController::class, 'viewStockInHandData'])->name('view.stockInHand');
Route::get('employee-disc-point', [PullDataController::class, 'viewEmployeeDiscPointData'])->name('view.employeeDiscPoint');
Route::get('delivery-order', [PullDataController::class, 'viewDeliveryOrderData'])->name('view.deliveryOrder');

/* Packing Slip Against SO  */
Route::get('packingslipagainstso', [PackingSlipAgainstSoController::class, 'fetchAndPushDataToAPI'])->name('push.packingslipagainstso'); 

/* Save Sale Order */
Route::get('save-sale-order', [SaleOrderApiController::class, 'fetchDataAndPostToApi'])->name('push.saleOrder');

/* Save Assigned DO */
Route::get('save-assigned-do', [SaveAssignedDOController::class, 'fetchDataAndPostToApi'])->name('push.SaveAssignedDO');

/* PurchaseOrder */
Route::get('get-purchase-order', [PurchaseOrderApiContoller::class, 'getDataFromApi']);
Route::get('save-purchase-order', [PurchaseOrderApiContoller::class, 'fetchDataAndPostToApi'])->name('push.SavePurchaseOrder');

