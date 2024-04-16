<?php

use App\Http\Controllers\Admin\IndexController as Admin;
use App\Http\Controllers\Home\IndexController as Home;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::match((['get', 'post']), '/test', function () {
    echo '<h1>hi this is /test<h1>';
});

Route::get('/par/{id}', function ($id) {
    echo "用戶ID為{$id}";
});

Route::get('/par2/{id?}', function ($id = null) {
    echo "用戶ID為{$id}";
});

Route::get('/par3', function () {
    echo "用戶ID為{$_GET['id']}";
})->name('username');

Route::group(['prefix' => 'admin'], function () {
    Route::get('test1', function () {
        echo 'test1';
    });
    Route::get('test2', function () {
        echo 'test2';
    });
});

//控制器路由設定
// Route::get('/home/test/test1', 'App\Http\Controllers\TestController@show');

Route::get('/home/test/test1', [TestController::class, 'show']);

Route::get('/home/admin', [Admin::class, 'index']);
Route::get('/home/home', [Home::class, 'index']);

//資料庫
Route::group(['prefix' => '/home/test'], function () {
    Route::get('/add', [TestController::class, 'add']);
    Route::get('/del', [TestController::class, 'del']);
    Route::get('/update', [TestController::class, 'update']);
    Route::get('/select', [TestController::class, 'select']);
    Route::get('test3', function () {
        $date = date('Y-m-d H:i:s');
        $day = '三';
        $time = strtotime('+1 year');
        return view('home.test.test3', compact('date', 'day', 'time'));
    });
});

Route::get('/home/test/test4', [TestController::class, 'test4']);

//模板繼承
Route::get('home/test/test5', [TestController::class, 'test5']);

//csrf驗證
Route::get('/home/test/test6', [TestController::class, 'test6']);
Route::post('/home/test/test7', [TestController::class, 'test7'])->name('test7');

//模型的增刪改查
Route::any('/home/test/test8', [TestController::class, 'test8']);
Route::get('/home/test/test9', [TestController::class, 'test9']);
Route::get('/home/test/test10', [TestController::class, 'test10']);
Route::get('/home/test/test11', [TestController::class, 'test11']);
Route::get('/home/test/test12', [TestController::class, 'test12']);

//自動驗證
Route::any('/home/test/test13', [TestController::class, 'test13']);

//上傳文件
Route::match((['get', 'post']), '/home/test/test14', [TestController::class, 'test14']);

//分頁
Route::get('/home/test/test15', [TestController::class, 'test15']);

//ajax 響應
Route::get('/home/test/test16', [TestController::class, 'test16']);
Route::get('/home/test/test17', [TestController::class, 'test17']);

//會話控制
Route::get('/home/test/test18', [TestController::class, 'test18']);

//快取
Route::get('/home/test/test19', [TestController::class, 'test19']);

//連表查詢
Route::get('/home/test/test20', [TestController::class, 'test20']);

//關聯模型
//一對一
Route::get('/home/test/test21', [TestController::class, 'test21']);

//一對多
Route::get('home/test/test22', [TestController::class, 'test22']);