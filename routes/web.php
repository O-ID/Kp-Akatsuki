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
})->name('pengunjung.struktur');
Route::get('/struktur', function () {
    $struktur  = Struktur::get();
    $a = [];
    foreach ($struktur as $key => $value) {
        $a[$value->nama_jabatan] = $value->nama_pejabat;
    }
    return view('page.struktur', [
        'struktur' => $a,
    ]);
})->name('pengunjung.denah');

//ody zone
Route::resource('/', 'kontakkuc', [
    "names" => [
        'index' => 'pengunjung.index',
        'store' => 'pendaftar.store',
    ]
]);
Route::get('/kelulusan', 'kontakkuc@show')->name('pengunjung.kelulusan');
Route::get('/daftar', 'kontakkuc@daftar')->name('pengunjung.daftar');
Route::post('/daftar/store','kontakkuc@store')->name('form.formSubmit');
//adminzone
Route::get('/register', function () {
    return view('page.register');
});
Route::post('/registerPost', 'adminzone@registerPost');
Route::post('/LoginAdmin', 'adminzone@LoginAdmin');
Route::get('/logout', 'adminzone@logout');
// Route::get('/validasi', 'adminzone@getBasic');
Route::get('/basic', 'adminzone@getBasicdata')->name('get.basicdata');

Route::prefix('/admin')->group( function() {

    Route::prefix('/struktur')->group( function() {
        Route::get('/table', 'StrukturController@dataTable')->name('admin.struktur.dataTable');
        Route::get('/', 'StrukturController@index')->name('admin.struktur.index');
        Route::get('/form/{id}', 'StrukturController@edit')->name('admin.struktur.edit');
        Route::post('/', 'StrukturController@store')->name('admin.struktur.store');
        Route::put('/{id}', 'StrukturController@update')->name('admin.struktur.put');
    });
    Route::get('/manajemen', 'adminzone@getManajemen');
    Route::prefix('/jangka-daftar')->group(function(){
        Route::get('/jkdaftar', 'adminzone@getJkdaftar')->name('admin.getjkdaftar');
        Route::post('/store', 'adminzone@storeJkdaftar')->name('admin.storejkdaftar');

    });
    Route::prefix('/tapel')->group(function(){
        Route::get('/gettapel', 'adminzone@getTapel')->name('admin.gettapel');
        Route::put('/update/{id}', 'adminzone@update')->name('admin.tapel.put');
        Route::post('/store', 'adminzone@storeTapel')->name('admin.tapel.store');
    });
    Route::prefix('/pendaftar')->group( function() {
        Route::get('/table', 'PendaftarController@dataTable')->name('admin.pendaftar.dataTable');
        Route::get('/', 'PendaftarController@index')->name('admin.pendaftar.index');
        Route::get('/status/{id}/{status}', 'PendaftarController@status')->name('admin.pendaftar.status');
    });
});
