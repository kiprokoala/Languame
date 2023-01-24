<?php
class Objet {

	// getter g�n�rique
	public function get($attribut) {
		return $this->$attribut;
	}

	// setter g�n�rique
	public function set($attribut,$valeur) {
		$this->$attribut = $valeur;
	}

	// constructeur g�n�rique
	public function __construct($donnees = NULL) {
		if(!is_null($donnees)) {
			foreach ($donnees as $attribut => $valeur) {
				$this->set($attribut,$valeur);
			}
		}
	}

	}
?>