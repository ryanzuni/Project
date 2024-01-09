<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PengunjungController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentsController;

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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['is_admin','auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // booking
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index', 'destroy']);
    // travel packages
    Route::resource('travel_packages', \App\Http\Controllers\Admin\TravelPackageController::class)->except('show');
    Route::resource('travel_packages.galleries', \App\Http\Controllers\Admin\GalleryController::class)->except(['create', 'index','show']);
    // pengunjungs
    Route::resource('pengunjungs', \App\Http\Controllers\Admin\PengunjungController::class)->except('show');
    Route::get('pengunjungs/print', [\App\Http\Controllers\Admin\PengunjungController::class, 'print'])->name('pengunjungs.print');
    Route::get('admin/pengunjungs/grafik', 'PengunjungController@grafik')->name('admin.pengunjungs.grafik');
    // categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except('show');
    // abouts
    Route::resource('abouts', \App\Http\Controllers\Admin\AboutController::class)->except('show');
    // profile
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
// travel packages
Route::get('travel-packages',[\App\Http\Controllers\TravelPackageController::class, 'index'])->name('travel_package.index');
Route::get('travel-packages/{travel_package:slug}',[\App\Http\Controllers\TravelPackageController::class, 'show'])->name('travel_package.show');
Route::post('travel-packages/{travel_package}/comments', [\App\Http\Controllers\TravelPackageController::class, 'storeComment'])
    ->name('comments.store');
// abouts
Route::get('abouts', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('abouts/{about:slug}', [\App\Http\Controllers\AboutController::class, 'show'])->name('about.show');
Route::get('abouts/category/{category:slug}', [\App\Http\Controllers\AboutController::class, 'category'])->name('about.category');
// contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');
// booking
Route::post('booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
// Route using the CommentsController with a named route
//Route::get('/contact', [CommentsController::class, 'index'])->name('contact.index');
