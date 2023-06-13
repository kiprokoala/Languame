<?php

use app\Utils\Route;
use controller\controllerNationality;

Route::get('/nationalite/charger-code-par-pays', [controllerNationality::class, 'chargetCodeParPays']);