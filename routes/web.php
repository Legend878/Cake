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
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PoliticsController;
use App\Http\Controllers\TagsController;


// Route::get('/send-mail', [CategoryController::class, 'sendMail']);
Route::middleware(['CSP'])->group(function (){
//Route::middleware(['guest'])->group(function () { 
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/about',[AboutController::class,'index'])->name('about');
    
    Route::get('/catalog',[CatalogController::class,'index'])->name('catalog');
    Route::get('/bentos',[CatalogController::class,'ShowBento'])->name('bentos');
    Route::get('/capcakes',[CatalogController::class,'ShowCapcakes'])->name('capcakes');
    Route::get('/classic',[CatalogController::class,'ShowClassic'])->name('classic');
    Route::get('/pack',[CatalogController::class,'Showpack'])->name('pack');

    
    Route::get('/Question',[QuestionController::class,'index'])->name('question');
    Route::get('/delivery',[DeliveryController::class,'index'])->name('delivery');
    
    Route::get('/basket',[OrderController::class,'show'])->name('basket');
    Route::post('/checkAvailability', [OrderController::class, 'checkAvailability'])->name('checkAvailability');

    Route::post('/basket/delivery',[OrderController::class,'addDelivery'])->name('addDelivery');
    Route::post('/basket/remove',[OrderController::class,'removeDelivery'])->name('removeDelivery');
    Route::get('/basket/cart', [OrderController::class, 'getCart'])->name('basket.cart');

    // Route::post('/basket/{id}',[OrderController::class,'addBasket'])->name('basketAdd');
    Route::post('/basket/bento',[OrderController::class,'addBasketBento'])->name('addBasketBento');
    Route::post('/basket/cake',[OrderController::class,'addBasketCake'])->name('addBasketCake');
    Route::post('/basket/cupcakes',[OrderController::class,'addBasketCapcakes'])->name('addBasketCapcakes');

    Route::post('/basketdelete',[OrderController::class, 'DeleteBasket'])->name('deletebasket');

    Route::post('/tags',[TagsController::class,'Tags'])->name('tags');
    Route::get('/products/tag/{id}', [TagsController::class, 'TagsShow'])->name('TagsShow');


    Route::post('/create-payment', [PaymentController::class, 'createPayment'])->name('pay');
    Route::get('/status',[StatusController::class,'status'])->name('status');
     Route::get('/politics',[PoliticsController::class,'showPolitics'])->name('politics');
    //  Route::get('/password/reset',[PoliticsController::class,'showPolitics'])->name('politics');

//});


Route::post('/payment', [PaymentController::class, 'createPayment']);
// Auth::routes();


Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginVhod');
Route::get('/verification', [LoginController::class, 'showVerificationForm'])->name('verification.form');
Route::post('/verification', [LoginController::class, 'verifyCode'])->name('verification.verify');

});


Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/bashboard',[DashboardController::class,'show'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/Create',[CreateController::class,'index'])->name('Create');
    Route::post('/Create',[CreateController::class,'CreateAdd'])->name('Create.product');
    Route::get('/admin',[AdminController::class,'checkPaymentStatus'])->name('admin');
    Route::get('/admin/confirmed',[AdminController::class,'confirmed'])->name('confirmed');
    Route::get('/admin/rejected',[AdminController::class,'rejected'])->name('rejected');

    Route::get('/products',[AdminProductController::class,'show'])->name('allproductAdmin');
    Route::post('/products/{id}',[AdminProductController::class,'DeleteProduct'])->name('DeleteProduct');
    Route::post('/confirmorder/{id}',[AdminController::class,'confirmorder'])->name('confirm');
    Route::post('/rejectorder/{id}',[AdminController::class,'rejectorder'])->name('reject');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
