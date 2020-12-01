<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaController;

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

Route::get('storage/{name}', function ($name) {

    $path = storage_path($name);

    $mime = \File::mimeType($path);

    header('Content-type: ' . $mime);

    return readfile($path);

})->where('name', '(.*)');

// Route::group(function () {
    Route::view('/{any}', 'app')->where('any', '.*');
// Route::get("/{search}?", "SPAController@index")->where('any_path', '(.*)');
// });

Route::get('/', function () {
    return view('app');
});
