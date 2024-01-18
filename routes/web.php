<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    MailController,
    DataBaseController
};

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
    return view('index');
});

Route::post('/send/assembly', [MailController::class, 'sendAssemblyMail']);
Route::post('/send/door-to-door', [MailController::class, 'sendDoorToDoorMail']);

Route::get('/al-style/get-product/{id}', [DataBaseController::class, 'getAlStyle']);
Route::get('/al-style/get-categories', [DataBaseController::class, 'getCategories']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
