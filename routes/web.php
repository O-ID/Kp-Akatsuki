<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kontakkuc;
use App\Struktur;
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
    $struktur  = Struktur::get();
    $a = [];
    foreach ($struktur as $key => $value) {
        $a[$value->nama_jabatan] = $value->nama_pejabat;
    }
    return view('page.struktur', [
        'struktur' => $a,
    ]);
});

//ody zone
Route::resource('/', 'kontakkuc');
Route::get('/kelulusan', 'kontakkuc@show');
Route::get('/daftar', 'kontakkuc@daftar');
Route::post('/daftar/store','kontakkuc@store')->name('form.formSubmit');
//adminzone
Route::get('/register', function () {
    return view('page.register');
});
Route::post('/registerPost', 'adminzone@registerPost');
Route::post('/LoginAdmin', 'adminzone@LoginAdmin');
Route::get('/logout', 'adminzone@logout');
Route::get('/validasi', 'adminzone@getBasic');
Route::get('/basic', 'adminzone@getBasicdata')->name('get.basicdata');

Route::prefix('/admin')->group( function() {
    Route::prefix('/struktur')->group( function() {
        Route::get('/table', 'StrukturController@dataTable')->name('admin.struktur.dataTable');
        Route::get('/', 'StrukturController@index')->name('admin.struktur.index');
        Route::get('/form/{id}', 'StrukturController@edit')->name('admin.struktur.edit');
        Route::post('/', 'StrukturController@store')->name('admin.struktur.store');
        Route::put('/{id}', 'StrukturController@update')->name('admin.struktur.put');
    });
});
