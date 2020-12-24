<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kontakkuc;
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
Route::get('/', function () {
    return view('page.index');
});
Route::resource('/table', 'kontakkuc');
Route::get('/daftar', 'kontakkuc@daftar');
Route::post('/table/store','kontakkuc@store')->name('form.formSubmit');
Route::post('/table/destroy/{id}', 'kontakkuc@destroy');
Route::get('/table/edit/{id}', 'kontakkuc@edit');
Route::post('/table/update', 'kontakkuc@update');

// Route::get('/profile', function () {
//     return view('profile');
// });
// Route::get('/typo', function () {
//     return view('typo');
// });
// Route::get('/icon', function () {
//     return view('icon');
// });
// Route::get('/map', function () {
//     return view('map');
// });
// Route::get('/notif', function () {
//     return view('notif');
// });
