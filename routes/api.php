<?php
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdressContriller;
use App\Http\Controllers\CategoriesContriller;
use App\Http\Controllers\OrderContriller;
use App\Http\Controllers\ProductContriller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');

    echo 'ok';
});


/*Сategories*/
Route::middleware('auth:api')->post('/add_categories', [CategoriesContriller::class ,'addCategories']);
Route::get('/get_categories', [CategoriesContriller::class ,'getCategories']);
Route::middleware('auth:api')->post('/edit_categories', [CategoriesContriller::class ,'editCategories']);
Route::middleware('auth:api')->get('/delete_categories/{id}', [CategoriesContriller::class ,'deleteCategories']);











/*Adress*/
Route::middleware('auth:api')->post('/add_adress', [AdressContriller::class ,'addAdress']);
Route::get('/adress', [AdressContriller::class ,'getAdress']);
Route::middleware('auth:api')->get('/adress_delete/{id}', [AdressContriller::class ,'deleteAdress']);


/*Order*/
Route::middleware('auth:api')->post('/add_order', [OrderContriller::class ,'addOrder']);
Route::middleware('auth:api')->get('/order', [OrderContriller::class ,'getOrder']);
// Route::middleware('auth:api')->get('/delete_order/{id}', [AdreOrderContrillerssContriller::class ,'deleteAdress']);
Route::middleware('auth:api')->post('/odered_product', [OrderContriller::class ,'editOrderItem']);




/*Product*/
Route::middleware('auth:api')->post('/edit_product', [ProductContriller::class ,'editProduct']);

Route::middleware('auth:api')->post('/add_product', [ProductContriller::class ,'addProduct']);
Route::get('/product', [ProductContriller::class ,'getProduct']);
Route::get('/product/{id}', [ProductContriller::class ,'getProductCatig']);
Route::get('/product_item/{id}', [ProductContriller::class ,'getProductItem']);
Route::middleware('auth:api')->get('/product_delete/{id}', [ProductContriller::class ,'deleteProduct']);
Route::post('/cart', [ProductContriller::class ,'getCartProduct']);


/*AUTH - USER */
Route::post('/login', [AuthController::class ,'login']);
Route::post('/register', [AuthController::class ,'reg']);
Route::middleware('auth:api')->post('/logout', [AuthController::class ,'logout']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->post('/updateprofile', [UserController::class ,'updateprofile']);

Route::middleware('auth:api')->get('/authadmincheck', [AuthController::class ,'authAdminCheck']);
Route::middleware('auth:api')->get('/authcheck', [AuthController::class ,'authCheck']);
Route::middleware('auth:api')->get('/gettokens', [AuthController::class ,'getTokens']);





