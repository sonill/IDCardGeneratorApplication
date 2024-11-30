<?php

use App\Http\Controllers\AuthAdmin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenerateIDController;
use App\Http\Middleware\valideUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
Route::get('/test',[AuthAdmin::class,'TestPage']);
// Home page route
// Route::get('/defult', function () {
//     return view('Home.Index'); 
// });

// Default route for testing purposes (welcome view)
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('login', [AuthController::class, 'index'])->name('login'); // Show login form
Route::post('login', [AuthController::class, 'LoginAuth'])->name('loginMatch');  // Handle login submission

Route::get('register', [AuthController::class, 'registerSave'])->name('register');  // Show registration form
Route::post('register', [AuthController::class, 'register']);  // Handle registration submission
Route::get('home', [AuthController::class, 'home'])->name('home')->middleware(valideUser::class);

// Route::middleware('auth')->get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::get( 'dashboard',[AuthController::class,'dashboardPage'])->name('dashboard');
Route::get( 'logout',[AuthController::class,'logout'])->name('logout');

Route::get('/GenerateID',[AuthAdmin::class,'GenerateID'])->name('GenerateID')->middleware(valideUser::class);
Route::get('/printID',[AuthAdmin::class,'printID'])->name('printID')->middleware(valideUser::class);
// Route::get('/ViewID',[AuthAdmin::class,'ViewID'])->name('ViewID')->middleware(valideUser::class);
Route::get('/ManageStudents',[AuthAdmin::class,'ManageStudents'])->name('ManageStudents')->middleware(valideUser::class);
Route::get('/manageSetting',[AuthAdmin::class,'manageSetting'])->name('manageSetting')->middleware(valideUser::class);

Route::get('/ViewID',[AuthAdmin::class,'showStudents'])->name('ViewID');

Route::post('/generate-id', [GenerateIDController::class, 'store'])->name('store1');
Route::post('/UpdateData', [GenerateIDController::class, 'store'])->name('updateData');

Route::get('/edit/{id}', [AuthAdmin::class, 'editStudent'])->name('edit')->middleware(valideUser::class);
Route::post('/update/{id}', [GenerateIDController::class, 'updateStudent'])->name('update')->middleware(valideUser::class);
// route for delete
Route::delete('/DeleteX/{id}',[AuthAdmin::class,'removeID_Details'])->name('removeID');


Route::get('/dashboardHome', [DashboardController::class, 'indexDash']);

