<?php

namespace controller;

class controllerHome
{
    public function index()
    {
        echo "test";
        $title = "Accueil";
        require_once("view/generic/header.php");
        require_once("view/generic/footer.php");
    }
}