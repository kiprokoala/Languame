<?php

use app\tools\Route;
use controller\controllerHome;

session_start();

// Partie utilisateurs
Route::get('/', [controllerHome::class, 'index']);

//Utilisateur
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

// Exemple de routes déduites de votre ancien code présent ci-dessous, mais non fonctionnelles car contrôleurs sans méthodes
/* Route::get('/alignement', [controllerAlignement::class, 'alignement']);
Route::get('/equipe', [controllerEquipe::class, 'equipe']);
Route::get('/expression', [controllerExpression::class, 'expression']);
Route::get('/groupeLangue', [controllerGroupeLangue::class, 'groupeLangue']);
Route::get('/langue', [controllerLangue::class, 'langue']); */

/*if (!empty($_GET["cible"]) and !empty($_GET["action"])) {
    $cible = $_GET["cible"];
    if (in_array($_GET["action"], get_class_methods("controller$cible"))) {
        $action = $_GET["action"];
        ("controller$cible")::$action();
            }else{
                controllerSite::error404();
            }
        }else{
            controllerSite::homePage();
        }
    }
}*/