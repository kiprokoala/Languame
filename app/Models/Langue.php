<?php

namespace app\Models;

class Langue extends Objet
{

    // attributs de classe
    protected static $objet = "Langue";
    protected static $cle = "id_langue";

    protected $id_langue;
    protected $nomLangue;
    protected $codeLangue;
    protected $id_groupeLangue;

    public function afficher()
    {
        Langue::$objet . " n°" . $this->id_langue . " a pour nom " . $this->nomLangue . " et pour code " . $this->codeLangue . ". Il fait partie du groupe de langues n°" . $this->id_groupeLangue;
    }
}


?>