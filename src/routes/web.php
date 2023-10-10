<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectTypeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


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

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
        'google_id' => $user->id,
    ], [
        'name' => $user->name,
        'email' => $user->email,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
    //dd($user);
    // $user->token
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/avatar', [ProfileController::class, 'avatar'])->name('profile.avatar');
    Route::post('/profile/avatar', [ProfileController::class, 'avatar_update'])->name('profile.avatar_update');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/projectType/json/{integer}', [ProjectTypeController::class, 'json']);

Route::get('/language/{locale}', function (string $locale) {
    session(['my_locale' => $locale]);
    return redirect()->back();
});
