<?php

namespace controller;

use Connexion;


class controllerNationality
{

    public function search()
    {

        $secure = htmlspecialchars($_GET['term']);
        $req = Connexion::pdo()->prepare("SELECT * FROM pays  WHERE nomPays LIKE '$secure%' LIMIT 10");
        $req->execute();
        $data = $req->fetchAll();
        echo json_encode($data);
    }
}
