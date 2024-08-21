<?php

use App\Http\Middleware\Authenticate;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\adminController;
//use App\Http\Controllers\propertiesController;
use App\Http\Controllers\carsController;
use App\Http\Controllers\leasesController;
use App\Http\Controllers\locationsController;
use App\Http\Controllers\emailsController;
use App\Http\Controllers\workerController;
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

//Route::view('/', 'login1');
//Route::view('/', 'auth.login1')->name('login1');
//Route::view('/register1', 'auth.register1')->name('register1');

Auth::routes();
//about us
        //linkname                                                  //function         //name or label for access on route
Route::get('/about', [App\Http\Controllers\workerController::class, 'aboutus'])->name('abtus');


// admin Routes
Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('dashboard');

// Route::post('/locations/store', [App\Http\Controllers\locationsController::class, 'store']);

// new login and register

Route::get('/',[workerController::class,'login'])->name('/')->middleware('isLoggedIn');
Route::post('logged',[workerController::class,'loginuser'])->name('logged');
Route::get('register',[workerController::class,'register'])->name('register')->middleware('notLoggedIn');
Route::post('registered',[workerController::class,'registeruser'])->name('registered');
Route::get('edit/{id}',[workerController::class,'edit'])->middleware('notLoggedIn');
Route::post('edited',[workerController::class,'edituser']);
Route::get('/accountlist',[workerController::class,'list'])->middleware('notLoggedIn');
Route::get('delete/{id}',[workerController::class,'deleteuser']);

// cars
Route::prefix('cars')->group(function () {
    Route::get('/', [App\Http\Controllers\carsController::class, 'index'])->name('cars')->middleware('notLoggedIn');
    Route::get('/create', [App\Http\Controllers\carsController::class, 'create'])->middleware('notLoggedIn');
    Route::post('/store', [App\Http\Controllers\carsController::class, 'store'])->name('create.car');
    Route::get('/delete/{carid}', [App\Http\Controllers\carsController::class, 'destroy']);
    Route::get('/edit/{carid}', [App\Http\Controllers\carsController::class, 'edit'])->middleware('notLoggedIn');
    Route::post('/update/{carid}', [App\Http\Controllers\carsController::class, 'update'])->name('update.car');
});

// rentals
Route::prefix('rentals')->group(function () {
    Route::get('/', [App\Http\Controllers\rentalController::class, 'index'])->name('rentals')->middleware('notLoggedIn');
    Route::get('/create', [App\Http\Controllers\rentalController::class, 'create'])->middleware('notLoggedIn');
    Route::post('/store', [App\Http\Controllers\rentalController::class, 'store'])->name('create.rental');
    Route::get('/delete/{rentid}', [App\Http\Controllers\rentalController::class, 'destroy']);
    // Route::get('/edit/{rentid}', [App\Http\Controllers\rentalController::class, 'edit'])->name('Edit Rental');
    Route::post('/update/{rentid}', [App\Http\Controllers\rentalController::class, 'update'])->name('update.rental');
});

// customers
Route::prefix('customers')->group(function () {
    Route::get('/', [App\Http\Controllers\customersController::class, 'index'])->name('customers')->middleware('notLoggedIn');
    Route::get('/create', [App\Http\Controllers\customersController::class, 'create'])->name('Create Customer')->middleware('notLoggedIn');
    Route::post('/store', [App\Http\Controllers\customersController::class, 'store'])->name('create.customer');
    Route::get('/delete/{id}', [App\Http\Controllers\customersController::class, 'destroy']);
    Route::get('/edit/{id}', [App\Http\Controllers\customersController::class, 'edit'])->middleware('notLoggedIn');
    Route::post('/update/{id}', [App\Http\Controllers\customersController::class, 'update'])->name('update.customer');
});

//Route::middleware([Authenticate::class])->group(function () {

    // Cars
    // Route::prefix('cars')->group(function () {
    //     Route::get('/', [App\Http\Controllers\carsController::class, 'index'])->name('cars');
    //     Route::get('/create', [App\Http\Controllers\carsController::class, 'create']);
    //     Route::post('/store', [App\Http\Controllers\carsController::class, 'store'])->name('create.car');
    //     Route::get('/delete/{carid}', [App\Http\Controllers\carsController::class, 'destroy']);
    //     Route::get('/edit/{carid}', [App\Http\Controllers\carsController::class, 'edit']);
    //     Route::post('/update/{carid}', [App\Http\Controllers\carsController::class, 'update'])->name('update.car');
    // });

    // Rentals
    // Route::prefix('rentals')->group(function () {
    //     Route::get('/', [App\Http\Controllers\rentalController::class, 'index'])->name('rentals');
    //     Route::get('/create', [App\Http\Controllers\rentalController::class, 'create']);
    //     Route::post('/store', [App\Http\Controllers\rentalController::class, 'store'])->name('create.rental');
    //     Route::get('/delete/{rentid}', [App\Http\Controllers\rentalController::class, 'destroy']);
    //     // Route::get('/edit/{rentid}', [App\Http\Controllers\rentalController::class, 'edit'])->name('Edit Rental');
    //     Route::post('/update/{rentid}', [App\Http\Controllers\rentalController::class, 'update'])->name('update.rental');
    // });

    // Customers
    // Route::prefix('customers')->group(function () {
    //     Route::get('/', [App\Http\Controllers\customersController::class, 'index'])->name('customers');
    //     Route::get('/create', [App\Http\Controllers\customersController::class, 'create'])->name('Create Customer');
    //     Route::post('/store', [App\Http\Controllers\customersController::class, 'store'])->name('create.customer');
    //     Route::get('/delete/{id}', [App\Http\Controllers\customersController::class, 'destroy']);
    //     Route::get('/edit/{id}', [App\Http\Controllers\customersController::class, 'edit']);
    //     Route::post('/update/{id}', [App\Http\Controllers\customersController::class, 'update'])->name('update.customer');
    // });

//});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');