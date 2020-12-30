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
// Route::get('/', function () {
//     return view('page.index');
// });
Route::get('/denah', function () {
    return view('page.denah');
});
Route::get('/struktur', function () {
    return view('page.struktur');
});

//ody zone
Route::resource('/', 'kontakkuc');
Route::get('/kelulusan', 'kontakkuc@show');
Route::get('/daftar', 'kontakkuc@daftar');
Route::post('/table/store','kontakkuc@store')->name('form.formSubmit');
Route::post('/table/destroy/{id}', 'kontakkuc@destroy');
Route::get('/table/edit/{id}', 'kontakkuc@edit');
Route::post('/table/update', 'kontakkuc@update');
Route::get('/register', function () {
    return view('page.register');
});
Route::post('/registerPost', 'kontakkuc@registerPost');
Route::post('/LoginAdmin', 'kontakkuc@LoginAdmin');
Route::get('/logout', 'kontakkuc@logout');
