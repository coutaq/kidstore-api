<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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
    return view('welcome');
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});
Auth::routes();

Route::get('/categories', function () {
    return view('categories.index');
});
Route::get('/categories/{id}', function ($id) {
    return view('categories.show', compact('id'));
});

Route::get('/brands', function () {
    return view('brands.index');
});
Route::get('/brands/{id}', function ($id) {
    return view('brands.show', compact('id'));
});
Route::get('/products/{id}', function ($id) {
    return view('products.show', compact('id'));
});
Route::put('profile/edit', function (Request $request) {
    $user = Auth::user();
    $user->update($request->all());
    return redirect()->route('profile');
})->name('user.edit');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/orders', function () {
    return view('orders');
});
Route::get('/basket', function () {
    return view('basket');
});
Route::get('/admin', function () {
    return redirect()->route('category.index');
});

Route::prefix('admin')->group(function () {
    Route::resource('category', App\Http\Controllers\AdminCategoryController::class);
    Route::resource('product', App\Http\Controllers\AdminProductController::class);
    Route::resource('subcategory', App\Http\Controllers\AdminSubcategoryController::class);
    Route::resource('brand',  App\Http\Controllers\AdminBrandController::class);
    Route::resource('order', App\Http\Controllers\AdminSubcategoryController::class);
});