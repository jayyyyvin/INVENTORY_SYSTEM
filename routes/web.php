<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Controller;
use App\Models\Transaction;

Route::get('/', function () {
     return view('welcome');
    });


 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/welcome', [AuthController::class, 'logout'])->name('logout');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/editprofile', [AuthController::class, 'edit'])->name('editprofile');
    Route::post('/editprofile', [AuthController::class, 'update'])->name('editprofile');
    Route::get('/userlist', [AuthController::class, 'index'])->name('userlist');
    Route::delete('/userlist/{user}', [AuthController::class, 'destroy'])->name('userlist.destroy');
    Route::get('/forgotpass', [AuthController::class, 'forgotpass'])->name('forgotpass');
    Route::post('/forgotpass', [AuthController::class, 'newpassword'])->name('forgotpass');
    Route::get('/changepassword', [AuthController::class, 'changepass'])->name('changepassword');
    Route::post('/changepassword', [AuthController::class, 'changepassword'])->name('changepassword');

    Route::resource('/products', ProductController::class);
    Route::get('/reportall',[ProductController::class,'reportall']);
    Route::get('search_data',[ ProductController::class, 'search_data']);

    Route::get('/reportallsuppliers',[SupplierController::class,'reportallsupplier']);
    Route::resource('/suppliers', SupplierController::class);

    Route::get('/reportalltransactions',[TransactionController::class,'reportalltransaction']);
    Route::resource('/transactions', TransactionController::class);
    Route::get('search_data_transaction',[ TransactionController::class, 'search_data_transaction']);
    Route::get('search_transaction',[ TransactionController::class, 'search_transaction']);
    
  
});



Route::middleware(['Supervisor', 'Warehouseman'])->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/forgotpass', [AuthController::class, 'forgotpass'])->name('forgotpass');
    Route::post('/forgotpass', [AuthController::class, 'newpassword'])->name('forgotpass');
    Route::get('/userlist', [AuthController::class, 'index'])->name('userlist');
    Route::delete('/userlist/{user}', [AuthController::class, 'destroy'])->name('userlist.destroy');
});



Route::group(['middleware' => 'Warehouseman'], function(){
    Route::get('search_data',[ ProductController::class, 'search_data']);
    Route::resource('/products', ProductController::class);
    Route::resource('/suppliers', SupplierController::class);
 
});



