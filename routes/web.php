<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Settings\AccountController;
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


Route::middleware(['auth','verified'])->group(function(){

    /* Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show'); */



    // route data binding customization
/*     Route::get('/contacts/{contact:first_name}', [ContactController::class, 'show'])->name('contacts.show');
 */

//Route::resource('/contacts', ContactController::class)->only('create','update','edit','destroy','store');
//Route::resource('/contacts', ContactController::class)->except(['index','show']);

// Changing route parameters name
/* Route::resource('/contacts', ContactController::class)->parameters([
    'contacts' => 'kontak'
]); */

// changing routes names
/* Route::resource('/contacts', ContactController::class)->names([
    'index' => 'contacts.all',
    'show' => 'contacts.view'
]); */
//Nested resources
//Route::resource('/companies.contacts', ContactController::class);
Route::resources([
        '/contacts' => ContactController::class,
        '/companies' => CompanyController::class
    ]);

    /* Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/',[ContactController::class, 'index'])->name('contacts.index'); */
});



Auth::routes(['verify' => true]);

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/settings/account', [AccountController::class, 'index']);
