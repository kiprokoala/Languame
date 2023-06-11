<?php

namespace controller;

class controllerHome
{
    public function index()
    {
        require_once("resources/views/homeView.html");
    }

    public function nationality()
    {
        require_once("resources/views/nationalite/index.php");
    }
}