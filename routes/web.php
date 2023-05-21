<?php

use app\tools\Route;
use controller\controllerHome;


// Partie utilisateurs
Route::get('/', [controllerHome::class, 'index']);

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