<?php
require_once "config/connexion.php";
require_once 'app/Utils/Route.php';

Connexion::connect();

foreach (glob("controller/*.{php}", GLOB_BRACE) as $file) {
    require_once($file);
}

include 'routes/web.php';
include 'routes/api.php';
