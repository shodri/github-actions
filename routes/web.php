<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\DTypeController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () { return view('index'); });
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/avatar', [ProfileController::class, 'avatar'])->name('profile.avatar');
    Route::post('/profile/avatar', [ProfileController::class, 'avatar_update'])->name('profile.avatar_update');
    Route::get('/profile/developer', [ProfileController::class, 'developer'])->name('profile.developer');

    Route::resource('/developers', DeveloperController::class);
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dtype/json/{integer}', [DtypeController::class, 'json']);

Route::get('/language/{locale}', function (string $locale) {
    session(['my_locale' => $locale]);
    return redirect()->back();
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/login', [App\Http\Controllers\Admin\AdminAuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AdminAuthController::class, 'postLogin'])->name('loginPost');

    
    Route::group(['middleware' => 'adminauth'], function () {
        Route::post('/logout', [App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('logout');
        Route::delete('/developers/{developer}/brochure',[App\Http\Controllers\Admin\DeveloperController::class, 'brochureDelete'])->name('developers.brochure.delete');
        Route::resource('/developers', \DeveloperController::class);
        Route::delete('/brokers/{developer}/brochure',[App\Http\Controllers\Admin\BrokerController::class, 'brochureDelete'])->name('brokers.brochure.delete');
        Route::resource('/brokers', \BrokerController::class);
        Route::post('/develops/create', [App\Http\Controllers\Admin\DevelopController::class, 'setType'])->name('develops.setType');
        Route::get('/develops/{dtype}/create', [App\Http\Controllers\Admin\DevelopController::class, 'create'])->name('develops.createWithType');
        Route::resource('/develops', \DevelopController::class);
        Route::get('/', function () {
            return view('admin.index');
        })->name('index');
    });

});


