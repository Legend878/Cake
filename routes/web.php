<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuestionController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//Route::middleware(['guest'])->group(function () { 
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/about',[AboutController::class,'index'])->name('about');
    
    Route::get('/catalog',[CatalogController::class,'index'])->name('catalog');
    
    Route::get('/Question',[QuestionController::class,'index'])->name('question');
    Route::get('/delivery',[DeliveryController::class,'index'])->name('delivery');
    
    Route::get('/basket',[OrderController::class,'show'])->name('basket');
    Route::post('/basket/{id}',[OrderController::class,'addBasket'])->name('basketAdd');
    Route::post('/basket',[OrderController::class,'ShowOrder'])->name('ShowOrder');


//});


Auth::routes();


Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginVhod');


Route::middleware('admin')->group(function () {
     Route::get('/bashboard',[DashboardController::class,'show'])->name('dashboard');
     Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
     Route::get('/Create',[CreateController::class,'index'])->name('Create');
    Route::post('/Create',[CreateController::class,'CreateAdd'])->name('Create.product');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
