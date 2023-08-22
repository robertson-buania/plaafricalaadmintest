<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\AvocatController::class,'avocats'])->middleware(['auth', 'verified'])->name("avocat");

Route::get('/avocat', function () {
    return view('avocat');
})->middleware(['auth', 'verified'])->name('avocat');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/ajouterpersonnel', ["PersonnelController","create"])->middleware(['auth', 'verified']) ->name("personnels.create");

Route::get('/newsletter', [\App\Http\Controllers\BuaniaController::class,'newsletter'])->middleware(['auth', 'verified'])->name("newsletter");

Route::get('/', [\App\Http\Controllers\AvocatController::class,'avocats'])->middleware(['auth', 'verified'])->name("avocat");

Route::get('/detail/{id}', [\App\Http\Controllers\AvocatController::class,'show'])->middleware(['auth', 'verified'])->name("avocat.detail");

Route::get('/add', [\App\Http\Controllers\AvocatController::class,'add'])->middleware(['auth', 'verified'])->name("avocat.add");

Route::get('/add-fonction', [\App\Http\Controllers\AvocatController::class,'add_fonction'])->middleware(['auth', 'verified'])->name("avocat.add-fonction");

Route::get('/edit-fonction/{id}', [\App\Http\Controllers\AvocatController::class,'edit_fonction'])->middleware(['auth', 'verified'])->name("avocat.edit-fonction");


/**
 * Etapes de modifications
 */


Route::post('/save-avocat', [\App\Http\Controllers\AvocatController::class,'save'])->middleware(['auth', 'verified'])->name("avocat.save");
Route::post('/save-fonct', [\App\Http\Controllers\AvocatController::class,'save_fonction'])->middleware(['auth', 'verified'])->name("avocat.save_fonct");
Route::post('/update-fonct/{id}', [\App\Http\Controllers\AvocatController::class,'update_fonction'])->middleware(['auth', 'verified'])->name("avocat.update_fonction");
Route::post('/delete-fonct/{id}', [\App\Http\Controllers\AvocatController::class,'delete_fonction'])->middleware(['auth', 'verified'])->name("avocat.delete_fonction");

Route::post('/save-fonction', [\App\Http\Controllers\AvocatController::class,'save_fonction'])->middleware(['auth', 'verified'])->name("avocat.save-fonction");
Route::post('/edit-avocat/{id}', [\App\Http\Controllers\AvocatController::class,'update'])->middleware(['auth', 'verified'])->name("avocat.update");


Route::get('/avocat', [\App\Http\Controllers\AvocatController::class,'avocats'])->middleware(['auth', 'verified'])->name("avocat");

/**
 * Expertise
 */

Route::get('/expertise', [\App\Http\Controllers\ExpertiseController::class,'all'])->middleware(['auth', 'verified'])->name("expertise");

Route::get('/detail-expertise/{id}', [\App\Http\Controllers\ExpertiseController::class,'show'])->middleware(['auth', 'verified'])->name("expertise.detail");

Route::get('/add-expertise', [\App\Http\Controllers\ExpertiseController::class,'add'])->middleware(['auth', 'verified'])->name("expertise.add");

Route::get('/edit-expertise', [\App\Http\Controllers\ExpertiseController::class,'edit'])->middleware(['auth', 'verified'])->name("expertise.edit");

Route::post('/save-expertise', [\App\Http\Controllers\ExpertiseController::class,'save'])->middleware(['auth', 'verified'])->name("expertise.save");
Route::post('/save-fonction', [\App\Http\Controllers\ExpertiseController::class,'save_fonction'])->middleware(['auth', 'verified'])->name("expertise.save-fonction");
Route::post('/edit-expertise/{id}', [\App\Http\Controllers\ExpertiseController::class,'update'])->middleware(['auth', 'verified'])->name("expertise.update");
Route::post('/delete-expertise/{id}', [\App\Http\Controllers\ExpertiseController::class,'destroy'])->middleware(['auth', 'verified'])->name("expertise.delete");


/**
 * Publication
 *
 */

 Route::get('/publication', [\App\Http\Controllers\PublicationController::class,'all'])->middleware(['auth', 'verified'])->name("publication");

Route::get('/detail-publication/{id}', [\App\Http\Controllers\PublicationController::class,'show'])->middleware(['auth', 'verified'])->name("publication.detail");

Route::get('/add-publication', [\App\Http\Controllers\PublicationController::class,'add'])->middleware(['auth', 'verified'])->name("publication.add");
Route::get('/add-domaine-pub', [\App\Http\Controllers\PublicationController::class,'add_domaine_pub'])->middleware(['auth', 'verified'])->name("publication.add-domaine-pub");

Route::get('/edit-publication', [\App\Http\Controllers\PublicationController::class,'edit'])->middleware(['auth', 'verified'])->name("publication.edit");

Route::post('/save-publication', [\App\Http\Controllers\PublicationController::class,'save'])->middleware(['auth', 'verified'])->name("publication.save");

Route::post('/save-domaine-pub', [\App\Http\Controllers\PublicationController::class,'save_domaine'])->middleware(['auth', 'verified'])->name("publication.save_domaine");
Route::post('/delete-publication/{id}', [\App\Http\Controllers\PublicationController::class,'destroy'])->middleware(['auth', 'verified'])->name("publication.delete");


Route::get('/bureau', [\App\Http\Controllers\BureauController::class,'all'])->middleware(['auth', 'verified'])->name("bureau");

Route::get('/detail-bureau', [\App\Http\Controllers\BureauController::class,'show'])->middleware(['auth', 'verified'])->name("bureau.detail");

Route::get('/add-bureau', [\App\Http\Controllers\BureauController::class,'add'])->middleware(['auth', 'verified'])->name("bureau.add");

Route::get('/edit-bureau/{id}', [\App\Http\Controllers\BureauController::class,'edit'])->middleware(['auth', 'verified'])->name("bureau.edit");
Route::post('/update-bureau/{id}', [\App\Http\Controllers\BureauController::class,'update'])->middleware(['auth', 'verified'])->name("bureau.update");


Route::post('/save-bureau', [\App\Http\Controllers\BureauController::class,'save'])->middleware(['auth', 'verified'])->name("bureau.save");
