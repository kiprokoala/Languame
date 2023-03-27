<?php
class Pays extends Objet {
    
    // attributs de classe
	protected static $objet = "Pays";

    protected $id_pays;
    protected $nomPays;
    protected $raccourciPays;
    protected $latitudeCapitalePays;
    protected $longitudeCapitalePays;

    function afficher(){
        Pays::$objet . " n°" . $this->id_pays . " a pour nom " . $this->nomPays . ". Son raccoursi est " . $this->raccourciPays . ". Il a pour latitude " . $this->latitudeCapitalePays . " et pour longitude " . $this->longitudeCapitalePays;
    }

    public function getExpressionsByPays(){
        $requete = "SELECT id_expression FROM Expression WHERE id_pays = ".$this->get("id_pays").";";
        try {
            $resultat = Connexion::pdo()->query($requete);
            $resultat->setFetchmode(PDO::FETCH_NUM);
            return $resultat->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>