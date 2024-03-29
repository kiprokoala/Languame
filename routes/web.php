<?php

use app\Utils\Route;
use controller\controllerAlignement;
use controller\controllerHome;
use controller\controllerNationality;
use controller\controllerPartie;
use controller\controllerUtilisateur;
use controller\controllerEquipe;

// Partie utilisateurs
Route::get('/', [controllerHome::class, 'index']);

// Utilisateur
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
Route::get('/nationality', [controllerNationality::class, 'home']);
Route::get('/search', [controllerNationality::class, 'search']);
Route::get('/Expression', [controllerExpression::class, 'expression']);
Route::get('/Traitement', [controllerExpression::class, 'Traitement']);

// Alignement
Route::get('/alignement/home', [controllerAlignement::class, 'home']);
Route::get('/alignement/submitAlignement', [controllerAlignement::class, 'submitAlignement']);

// Partie
Route::get('/createGame', [controllerPartie::class, 'createGame']);
Route::get('/play', [controllerPartie::class, 'getQuestionsForPartie']);
Route::get('/seeParties', [controllerUtilisateur::class, 'getAllParties']);

// Equipe
Route::get('/createEquipe', [controllerEquipe::class, 'createEquipe']);