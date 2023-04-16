<?php

use controller\VitrineController;
include 'app/tools/Route.php';

// Partie utilisateurs
Route::get('/', [VitrineController::class, 'index']);