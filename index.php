<?php
require_once 'app/tools/Route.php';

foreach (glob("controller/*.{php}", GLOB_BRACE) as $file) {
    require_once($file);
}

include 'routes/web.php';
include 'routes/api.php';


?>
