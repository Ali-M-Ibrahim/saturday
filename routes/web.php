<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\Resource2Controller;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\InovkableController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('route1',function (){
    return "Hello class, this is the first route";
});

Route::get('route2',function (){
    return 2;
});

Route::get('route3',function (){
    return true;
});

Route::get('route4',function (){
    return "Hi, your GPA is: " . 4;
});

Route::get('route5',function (){
    return response()->json(["first_name","ali","last_name","ibrahim"]);
});

Route::get('route6',function (){
    return response()->json(["first_name","ali","last_name","ibrahim"])
        ->header("secret","789456123ABC")
        ->header('content-type',"application/json");
});

Route::get('route7',function (){
    return response()->json(["first_name","ali","last_name","ibrahim"])
        ->withHeaders([
            'secret'=>'123',
            'tst'=>456
        ]);
});

Route::get('route8',function (){
$a = 5;
$b= 6;
$c = $a+$b;
return $c;
});

Route::get('route9/{id}/{name}',function ($id,$name){
    return "the id is: " . $id . " and the name is: ".$name;
});

Route::get('route10/{id?}',function ($id=1){
    return "the id is: " . $id ;
});




Route::get('route11',[FirstController::class,'index'])->name('my-route');
Route::get('route11',[FirstController::class,'create']);
Route::get('route11/{id}',[FirstController::class,'store']);
Route::get('route12','App\Http\Controllers\FirstController@index');
Route::get('route13',[
    'uses'=>'App\Http\Controllers\FirstController@index',
    'as'=>"test"
]);

Route::get('route14','App\Http\Controllers\SecondController@index');
Route::get('route15',[SecondController::class,'create']);
Route::get('route16',[
    'uses'=>'App\Http\Controllers\SecondController@store',
    'as'=>"route-16"
]);

Route::resource('student',ResourceController::class);




Route::resource('except',ResourceController::class)->except(['destroy']);
Route::resource('only',ResourceController::class)->only(['destroy']);
Route::apiResource('api',ApiController::class);

Route::resources([
    'student2'=>ResourceController::class,
    'student3'=>Resource2Controller::class
]);


Route::apiResources([

]);


Route::get('invoke', InovkableController::class);


Route::get("param/{id}",[SecondController::class,'update']);



Route::resource('item',ItemController::class);
Route::get('item2',[ItemController::class,'create2']);
Route::get('delete/{id}',[ItemController::class,'delete']);
Route::put('updateByName/{name}',[ItemController::class,'updateByName']);

Route::get('getItemById/{id}',[ItemController::class,'getItemById']);
Route::get('getItemByName/{name}',[ItemController::class,'getItemByName']);
Route::get('getFirstItemByName/{name}',[ItemController::class,'getFirstItemByName']);
Route::get('getItemByNameAndPrice/{name}/{price}',[ItemController::class,'getItemByNameAndPrice']);
Route::get('getItemByNameOrPrice/{name}/{price}',[ItemController::class,'getItemByNameOrPrice']);
Route::get('getItemBySeveralId/{id1}/{id2}/{id3}',[ItemController::class,'getItemBySeveralId']);
Route::get('getItemInSeveralId/{id1}/{id2}/{id3}',[ItemController::class,'getItemInSeveralId']);
Route::get('getItemWherePriceBetween/{price1}/{price2}',[ItemController::class,'getItemWherePriceBetween']);
Route::get('getNameAndPriceByName/{name}',[ItemController::class,'getNameAndPriceByName']);
Route::get('getItemByNameMax/{name}',[ItemController::class,'getItemByNameMax']);

Route::get('getItemOrFailById/{id}',[ItemController::class,'getItemOrFailById']);
Route::get('getItemOrById/{id}',[ItemController::class,'getItemOrById']);

Route::get('getFirstOrFailItemByName/{name}',[ItemController::class,'getFirstOrFailItemByName']);
Route::get('getFirstOrItemByName/{name}',[ItemController::class,'getFirstOrItemByName']);

Route::get('customer',[CustomerController::class,'index']);

Route::get('first',[WebsiteController::class,'index']);
Route::get('template',[WebsiteController::class,'template']);
Route::get('course',[WebsiteController::class,'course']);
Route::get('deleteCategory/{id}',[CategoryController::class,'destroy'])->name('delete-category');


Route::get('API',[ApiController::class,'index'])
//->middleware('checkSecret')
;


Route::get('APICreate',[ApiController::class,'store']);

Route::resource('product',ProductController::class);
Route::resource('category',CategoryController::class);

Route::middleware('checkSecret')->group(function () {


});
