<?php

use Illuminate\Support\Facades\Route;
/*
db: u911414181_pla2
user:u911414181_pla2
password:Pla2023@
*/

Route::post('/ajouterpersonnel', ["PersonnelController","create"]) ->name("personnels.create");

Route::get('/newsletter', [\App\Http\Controllers\BuaniaController::class,'newsletter'])->name("newsletter");

Route::get('/', [\App\Http\Controllers\AvocatController::class,'avocats'])->name("avocat");

Route::get('/detail/{id}', [\App\Http\Controllers\AvocatController::class,'show'])->name("avocat.detail");

Route::get('/add', [\App\Http\Controllers\AvocatController::class,'add'])->name("avocat.add");

Route::get('/add-fonction', [\App\Http\Controllers\AvocatController::class,'add_fonction'])->name("avocat.add-fonction");

Route::get('/edit-fonction/{id}', [\App\Http\Controllers\AvocatController::class,'edit_fonction'])->name("avocat.edit-fonction");


/**
 * Etapes de modifications
 */


Route::post('/save-avocat', [\App\Http\Controllers\AvocatController::class,'save'])->name("avocat.save");
Route::post('/save-fonct', [\App\Http\Controllers\AvocatController::class,'save_fonction'])->name("avocat.save_fonct");
Route::post('/update-fonct/{id}', [\App\Http\Controllers\AvocatController::class,'update_fonction'])->name("avocat.update_fonction");
Route::post('/delete-fonct/{id}', [\App\Http\Controllers\AvocatController::class,'delete_fonction'])->name("avocat.delete_fonction");

Route::post('/save-fonction', [\App\Http\Controllers\AvocatController::class,'save_fonction'])->name("avocat.save-fonction");
Route::post('/edit-avocat/{id}', [\App\Http\Controllers\AvocatController::class,'update'])->name("avocat.update");


Route::get('/avocat', [\App\Http\Controllers\AvocatController::class,'avocats'])->name("avocat");

/**
 * Expertise
 */

Route::get('/expertise', [\App\Http\Controllers\ExpertiseController::class,'all'])->name("expertise");

Route::get('/detail-expertise/{id}', [\App\Http\Controllers\ExpertiseController::class,'show'])->name("expertise.detail");

Route::get('/add-expertise', [\App\Http\Controllers\ExpertiseController::class,'add'])->name("expertise.add");

Route::get('/edit-expertise', [\App\Http\Controllers\ExpertiseController::class,'edit'])->name("expertise.edit");

Route::post('/save-expertise', [\App\Http\Controllers\ExpertiseController::class,'save'])->name("expertise.save");
Route::post('/save-fonction', [\App\Http\Controllers\ExpertiseController::class,'save_fonction'])->name("expertise.save-fonction");
Route::post('/edit-expertise/{id}', [\App\Http\Controllers\ExpertiseController::class,'update'])->name("expertise.update");
Route::post('/delete-expertise/{id}', [\App\Http\Controllers\ExpertiseController::class,'destroy'])->name("expertise.delete");


/**
 * Publication
 *
 */

 Route::get('/publication', [\App\Http\Controllers\PublicationController::class,'all'])->name("publication");

Route::get('/detail-publication/{id}', [\App\Http\Controllers\PublicationController::class,'show'])->name("publication.detail");

Route::get('/add-publication', [\App\Http\Controllers\PublicationController::class,'add'])->name("publication.add");
Route::get('/add-domaine-pub', [\App\Http\Controllers\PublicationController::class,'add_domaine_pub'])->name("publication.add-domaine-pub");

Route::get('/edit-publication', [\App\Http\Controllers\PublicationController::class,'edit'])->name("publication.edit");

Route::post('/save-publication', [\App\Http\Controllers\PublicationController::class,'save'])->name("publication.save");

Route::post('/save-domaine-pub', [\App\Http\Controllers\PublicationController::class,'save_domaine'])->name("publication.save_domaine");
Route::post('/delete-publication/{id}', [\App\Http\Controllers\PublicationController::class,'destroy'])->name("publication.delete");


Route::get('/bureau', [\App\Http\Controllers\BureauController::class,'all'])->name("bureau");

Route::get('/detail-bureau', [\App\Http\Controllers\BureauController::class,'show'])->name("bureau.detail");

Route::get('/add-bureau', [\App\Http\Controllers\BureauController::class,'add'])->name("bureau.add");

Route::get('/edit-bureau/{id}', [\App\Http\Controllers\BureauController::class,'edit'])->name("bureau.edit");
Route::post('/update-bureau/{id}', [\App\Http\Controllers\BureauController::class,'update'])->name("bureau.update");


Route::post('/save-bureau', [\App\Http\Controllers\BureauController::class,'save'])->name("bureau.save");


/* Route::fallback(function () {
    return view('errors.404');
}); */
/**
 * Routes sur l'expertise
 */
//Route::get('/expertises', 'ExpertiseController@index');

