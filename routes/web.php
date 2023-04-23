<?php

use App\Http\Controllers\ProfileController;
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

// Welcome Page
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/archivedPaths', [\App\Http\Controllers\HomeController::class, 'archivedPaths'])->name('archivedPaths');
Route::get('/rating/page/{id}', [\App\Http\Controllers\HomeController::class, 'rating'])->name('rating');
Route::post('/rating/{id}', [\App\Http\Controllers\HomeController::class, 'ratingStore'])->name('rating.store');

Route::get('/path/{id}', [\App\Http\Controllers\HomeController::class, 'showPath'])
    ->name('user.show.path');
Route::get('/area/{id}', [\App\Http\Controllers\HomeController::class, 'showArea'])
    ->name('user.show.area');
Route::get('/searchHome', [\App\Http\Controllers\HomeController::class , 'search'])->name('search.home');
Route::post('/register/coordinator', [\App\Http\Controllers\CoordinatorController::class , 'store'])->name('reg.coor');

Route::get('admin/', function (){
    return redirect('admin/login');
});



// User Dashboard
Route::get('/dashboard', [\App\Http\Controllers\dashboardController::class, 'index'])->middleware(['auth:web', 'verified'])->name('dashboard');
Route::get('/addArea', [\App\Http\Controllers\dashboardController::class, 'addArea'])->middleware(['auth:web'])->name('add.area');
Route::post('/addArea', [\App\Http\Controllers\dashboardController::class, 'storeArea'])->middleware(['auth:web'])->name('store.area');
Route::post('/addBalance', [\App\Http\Controllers\dashboardController::class, 'addBalance'])->middleware(['auth:web'])->name('add.balance');
Route::post('/mark-as-read', [\App\Http\Controllers\AdminDashboardController::class, 'markNotificationUser'])->name('markNotificationUser');

// require __DIR__.'/auth.php';


// Admin Routes
Route::middleware('auth:admin')
    ->prefix('admin')
    ->group(function () {
        // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/search', [\App\Http\Controllers\AdminDashboardController::class, 'search'])->name('search');


        // Area
    Route::resource('/areas', \App\Http\Controllers\AreaController::class);
    Route::resource('services', \App\Http\Controllers\ServiceController::class);
    Route::resource('sliders', \App\Http\Controllers\SliderController::class);
    Route::post('/mark-as-read', [\App\Http\Controllers\AdminDashboardController::class, 'markNotification'])->name('markNotification');

});

// Admin Auth
// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
//     require __DIR__.'/auth.php';
// });

// Coordinator Routes
Route::middleware('auth:coordinator')
    ->prefix('coordinator')
    ->group(function () {
        // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\CoordinatorDashboardController::class, 'index'])->name('coordinator.dashboard');
    Route::get('/subscribers', [\App\Http\Controllers\CoordinatorDashboardController::class, 'allSubscribers'])->name('coordinator.subscribers');

});

// Coordinator Auth
Route::group(['prefix' => 'coordinator', 'as' => 'coordinator.'], function(){
    // require __DIR__.'/auth.php';

    Route::resource('/paths', \App\Http\Controllers\PathCOOController::class)
        ->middleware('auth:coordinator');

});

// Paths
Route::resource('admin/paths', \App\Http\Controllers\PathController::class)
    ->middleware('auth:admin');




if (\Illuminate\Support\Facades\Auth::guard('admin')){
    Route::resource('admin/subscriptions', \App\Http\Controllers\SubscriptionController::class)
        ->middleware('auth:admin');
}
 //create subscription to  coordinator
if (\Illuminate\Support\Facades\Auth::guard('coordinator')){
    Route::resource('coordinator/coosubscriptions', \App\Http\Controllers\CoordinatorSubscriptionController::class)
        ->middleware('auth:coordinator');
}




//if (\Illuminate\Support\Facades\Auth::guard('web')){
//    Route::resource('admin/subscriptions', \App\Http\Controllers\SubscriptionController::class)
//        ->middleware('auth:web');
//}

Route::resource('admin/path-subscription', \App\Http\Controllers\PathSubscriptionController::class)
    ->middleware('auth:admin,web');

Route::resource('admin/users', \App\Http\Controllers\UserController::class)
    ->middleware('auth:admin');

Route::resource('admin/coordinators', \App\Http\Controllers\CoordinatorController::class)
    ->middleware('auth:admin');

Route::resource('admin/admins', \App\Http\Controllers\AdminController::class)
    ->middleware('auth:admin');

Route::resource('admin/messages', \App\Http\Controllers\MessageController::class);


Route::middleware('auth:web,admin,coordinator')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
