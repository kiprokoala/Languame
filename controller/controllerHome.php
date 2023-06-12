<?php

namespace controller;

class controllerHome
{
    public function index()
    {
        require_once("view/homeView.php");
    }

    public function nationality()
    {
        require_once("resources/views/nationalite/index.php");
    }
}