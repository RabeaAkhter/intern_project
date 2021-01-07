<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use  App\Http\Controllers\VehicleController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\SlotTypeController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
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

Route::get('/w', function () {
    return view('welcome');
});
//for admin Dashboard
Route::get('/dashboard',[DashboardController::class,'dasindex'])->name('dashboard');

//for vehicle
Route::get('/vehicle/add',[VehicleController::class,'add'])->name('vehicle.add');//for add form
Route::post('/vehicle/add/post',[VehicleController::class,'post'])->name('vehicle.post');//for add form
Route::get('/vehicle/list',[VehicleController::class,'list'])->name('vehicle.list');//for list
Route::get('/vehicle/list/view/{id}',[VehicleController::class,'viewvehicle'])->name('vehicle.view');//for vehicle list view
Route::get('/vehicle/edit/{id}',[VehicleController::class,'editvehicle'])->name('vehicle.edit');//for vehicle list view
Route::put('/vehicle/update/{id}',[VehicleController::class,'updatevehicle'])->name('vehicle.update');//for vehicle list view

//for floor
Route::get('/floor/add',[FloorController::class,'add'])->name('floor.add');//for add form
Route::post('/floor/add/post',[FloorController::class,'post'])->name('floor.post');//for add form
Route::get('/floor/list',[FloorController::class,'list'])->name('floor.list');//for list
Route::get('/total/block/{id}',[FloorController::class,'getallblock'])->name('floor.all.block');//for list
Route::get('/floor/delete/{id}',[FloorController::class,'delete'])->name('floor.delete');//for delete
Route::get('/floor/edit/{id}',[FloorController::class,'edit'])->name('floor.edit');//for delete
Route::get('/floor/view/{id}',[FloorController::class,'view'])->name('floor.view');//for delete

//for blocks

Route::get('/block/add',[BlockController::class,'add'])->name('block.add');//for add form
Route::post('/block/add/post',[BlockController::class,'post'])->name('block.post');//for add form
Route::get('/block/list',[BlockController::class,'list'])->name('block.list');//for list
Route::get('/total/slot/{id}',[BlockController::class,'gettotalslot'])->name('block.all.slot');//for list
Route::get('/block/delete/{id}',[BlockController::class,'delete'])->name('block.delete');//for delete
Route::get('/block/edit/{id}',[BlockController::class,'edit'])->name('block.edit');//for delete
Route::post('/block/update/{id}',[BlockController::class,'update'])->name('block.update');//for delete
//for slots

Route::get('/slot/add',[SlotController::class,'add'])->name('slot.add');//for add form
Route::post('/slot/add/post',[SlotController::class,'post'])->name('slot.post');//for post form
Route::get('/slot/list',[SlotController::class,'list'])->name('slot.list');//for list
Route::get('/slot/delete/{id}',[SlotController::class,'delete'])->name('slot.delete');
Route::get('/slot/edit/{id}',[SlotController::class,'edit'])->name('slot.edit');
Route::post('/slot/update/{id}',[SlotController::class,'update'])->name('slot.update');


//for slot Type

Route::get('/type/add',[SlotTypeController::class,'add'])->name('type.add');//for add form
Route::post('/type/add/post',[SlotTypeController::class,'post'])->name('type.post');//for post form
Route::get('/type/list',[SlotTypeController::class,'list'])->name('type.list');//for list
Route::get('/total/slot-type/{id}',[SLotTypeController::class,'gettotalslot'])->name('slot.all');//for list
Route::get('/slottype/delete/{id}',[SlotTypeController::class,'delete'])->name('slottype.delete');//for delete
Route::get('/type/edit/{id}',[SlotTypeController::class,'edit'])->name('slottype.edit');//for edit
Route::post('/slottype/update/{id}',[SlotTypeController::class,'update'])->name('slotype.update');//for update
//for parkings

Route::get('/parking/add',[ParkingController::class,'add'])->name('parking.add');//for add form
Route::post('/parking/post',[ParkingController::class,'post'])->name('parking.post');//for post
Route::get('/parking/list',[ParkingController::class,'list'])->name('parking.list');//for list
Route::get('/parking/add/form/{id}',[ParkingController::class,'addform'])->name('parking.addform'); 
Route::get('/parking/delete/{id}',[ParkingController::class,'delete'])->name('parking.delete');//for delete
Route::get('/parking/edit/{id}',[ParkingController::class,'edit'])->name('parking.edit');//for edit
Route::post('/parking/update/{id}',[ParkingController::class,'update'])->name('parking.update');//for edit


//for log in
Route::get('/',[HomeController::class,'show'])->name('login.show');
Route::get('/reg',[HomeController::class,'showform'])->name('reg.show');

//for payment


Route::get('/payment',[PaymentController::class,'list_for_payment'])->name('payment');
Route::get('/payment/form/{id}',[PaymentController::class,'add'])->name('payment.form');
Route::post('/payment/post/{id}',[PaymentController::class,'form_post'])->name('payment.post');
Route::get('/paryment/list',[PaymentController::class,'payment_list'])->name('payment.list');
Route::get('/payment/delete/{id}',[PaymentController::class,'delete'])->name('payment.delete');

//for searching

Route::get('/search',[PaymentController::class,'search'])->name('payment.search');
//for hour cost
Route::get('/hour/cost',[PaymentController::class,'phc'])->name('hour.cost');
Route::post('/hour/cost/post',[PaymentController::class,'post'])->name('cost.post');
Route::get('/hour/cost/list',[PaymentController::class,'list'])->name('cost.list');
Route::get('/cost/edit/{id}',[PaymentController::class,'edit'])->name('cost.edit');
Route::post('/cost/update/{id}',[PaymentController::class,'update'])->name('cost.update');
