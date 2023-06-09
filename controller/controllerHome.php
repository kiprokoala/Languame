<?php

namespace controller;

class controllerHome
{
    public function index()
    {
        require_once("view/homeView.html");
    }

    public function nationality(){
        include('view/generic/header.php');
        require_once("view/nationalite/index.php");
        include('view/generic/footer.php');
    }
}