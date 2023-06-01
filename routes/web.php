<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfspaceController;
use App\Http\Controllers\SoutnanceController;
use App\Http\Controllers\AdminspaceController;
use App\Http\Controllers\StageofferController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource(name:'companies', controller:CompanyController::class);

Route::resource(name:'soutnances', controller:SoutnanceController::class);

Route::resource(name:'stageoffer', controller:StageofferController::class);

Route::get('admin', [AdminspaceController::class, 'index'])->name('admin.dashboard');
Route::get('users', [AdminspaceController::class, 'users'])->name('admin.users');
Route::get('admin/new', [AdminspaceController::class, 'admin'])->name('admin.new');


Route::get('prof', [ProfspaceController::class, 'index'])->name('prof.dashboard');
Route::get('students', [ProfspaceController::class, 'students'])->name('prof.students');
Route::get('prof/soutnances', [ProfspaceController::class, 'soutnances'])->name('prof.soutnances');

require __DIR__.'/auth.php';
