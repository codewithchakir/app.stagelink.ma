<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StagereqController;
use App\Http\Controllers\ProfspaceController;
use App\Http\Controllers\SoutnanceController;
use App\Http\Controllers\AdminspaceController;
use App\Http\Controllers\StageofferController;
use App\Http\Controllers\SupervisorspaceController;

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

Route::get('/stagereq/download-cv/{studentId}', [StagereqController::class, 'downloadCV'])->name('stagereq.downloadCV');

Route::resource(name:'companies', controller:CompanyController::class);

Route::resource(name:'soutnances', controller:SoutnanceController::class);

Route::resource(name:'stageoffer', controller:StageofferController::class);

Route::resource(name:'stagereq', controller:StagereqController::class);

Route::resource(name:'stage', controller:StageController::class);

Route::get('admin', [AdminspaceController::class, 'index'])->name('admin.dashboard')->middleware(['isAdmin']);
Route::get('users', [AdminspaceController::class, 'users'])->name('admin.users')->middleware(['isAdmin']);
Route::get('admin/new', [AdminspaceController::class, 'admin'])->name('admin.new')->middleware(['isAdmin']);
Route::post('admin/store', [AdminspaceController::class, 'adminstore'])->name('admin.store')->middleware(['isAdmin']);



Route::get('prof', [ProfspaceController::class, 'index'])->name('prof.dashboard')->middleware(['isProf']);
Route::get('students', [ProfspaceController::class, 'students'])->name('prof.students')->middleware(['isProf']);
Route::get('prof/soutnances', [ProfspaceController::class, 'soutnances'])->name('prof.soutnances')->middleware(['isProf']);


Route::get('/create/stage/{supervisorId}/{studentId}', [SupervisorspaceController::class, 'createstage'])->name('create.stage');
Route::post('/store/stage', [SupervisorspaceController::class, 'storestage'])->name('store.stage');
Route::put('/accept/stage', [SupervisorspaceController::class, 'acceptstage'])->name('accept.stage');


require __DIR__.'/auth.php';
