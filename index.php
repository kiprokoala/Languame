<?php

use app\Utils\Database;

session_start();
function includeFilesRecursive($dir)
{
    $files = glob($dir . '/*');

    foreach ($files as $file) {
        if (is_file($file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
            require_once($file);
        } elseif (is_dir($file)) {
            includeFilesRecursive($file);
        }
    }
}

// On inclut les helpers puis les classes utilitaires
includeFilesRecursive('app/Helpers');
includeFilesRecursive('app/Utils');

// Et enfin le reste. On inclut objet en premier car les autres modèles en dépendent
require_once "app/Models/Objet.php";
includeFilesRecursive('app');

Database::connect();

includeFilesRecursive('controller');

include 'routes/web.php';
include 'routes/api.php';
