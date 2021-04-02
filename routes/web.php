<?php

use App\Http\Controllers\Panel\ExpenseController;
use App\Http\Controllers\Panel\SiteController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});
Route::group([
    'as' => 'panel.',
    'middleware' => 'auth',
    'prefix' => 'panel',
], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('sites', SiteController::class);

    Route::resource('expenses', ExpenseController::class)
        ->except(['show']);
});

require __DIR__.'/auth.php';
