<?php

use app\Utils\Route;
use controller\controllerNationality;

Route::get('/nationalite/charger-code-par-pays', [controllerNationality::class, 'chargerCodeParPays']);
Route::get('/nationalite/charger-donnees-mysql', [controllerNationality::class, 'chargerDonneesMySQL']);
Route::get('/nationalite/charger-expression-par-pays', [controllerNationality::class, 'chargerExpressionParPays']);
Route::get('/nationalite/charger-pays-par-code', [controllerNationality::class, 'chargerPaysParCode']);