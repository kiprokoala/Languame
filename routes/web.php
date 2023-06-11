<?php

use app\Utils\Route;
use controller\controllerHome;

session_start();

// app\Models\Partie utilisateurs
Route::get('/', [controllerHome::class, 'index']);

//app\Models\Utilisateur
Route::get('/users', [controllerUtilisateur::class, 'lireObjets']);
Route::get('/profil', [controllerUtilisateur::class, 'profil']);
Route::get('/connecting', [controllerUtilisateur::class, 'connect']);
Route::get('/formConnect', [controllerUtilisateur::class, 'formConnect']);
Route::get('/disconnect', [controllerUtilisateur::class, 'disconnect']);
Route::get('/subscribing', [controllerUtilisateur::class, 'subscribing']);
Route::get('/modifyAccount', [controllerUtilisateur::class, 'modifyAccount']);
Route::get('/addingLang', [controllerUtilisateur::class, 'addingLang']);
Route::get('/removingLang', [controllerUtilisateur::class, 'removingLang']);

// Nationality
Route::get('/nationality', [controllerHome::class, 'nationality']);

// app\Models\Alignement
Route::get('/alignement/home', [controllerAlignement::class, 'home']);
Route::get('/alignement/submitAlignement', [controllerAlignement::class, 'submitAlignement']);

// app\Models\Partie
Route::get('/createGame', [controllerPartie::class, 'createGame']);
Route::get('/play', [controllerPartie::class, 'getQuestionsForPartie']);
Route::get('/seeParties', [controllerUtilisateur::class, 'getAllParties']);
