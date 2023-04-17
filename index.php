<?php
foreach(glob("controller/*.{php}", GLOB_BRACE) AS $file) {
    require_once($file);
}

if(!empty($_GET["cible"]) AND !empty($_GET["action"])){
    $cible = $_GET["cible"];
    if (in_array($_GET["action"],get_class_methods("controller$cible"))){
        $action = $_GET["action"];
        ("controller$cible")::$action();
    }else{
        controllerSite::error404();
    }
}else{
    controllerSite::homePage();
}


?>
