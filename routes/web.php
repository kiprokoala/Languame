<?php

use app\tools\Route;
use controller\VitrineController;

// Partie utilisateurs
Route::get('/', [VitrineController::class, 'index']);
