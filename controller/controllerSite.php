<?php

require_once("../model/objet.php");
require_once("../model/utilisateur.php");

class controllerSite{

protected $utilisateur = Utilisateur::getObjetById($_SESSION["id"]);

public static function homePage(){
    $title = "Accueil";
    require_once("view/generic/header.php");
    require_once("view/generic/footer.php");
}

public static function error404(){
    $page = "Erreur 404";
    require_once("view/header.php");
    require_once("view/footer.php");
}

public static function proposerAlignement(){
    if($utilisateur->estConnecte()){
        Alignement::creerAlignement($utilisateur->id_utilisateur, $alignement, $reponses);
    }    
}

public static function validerAlignement(){
    if ($utilisateur->isChef){
        Alignement::validerAlignement($alignement, $partie);
    }
}

public static function voirLesAlignementsProposes()
{
    if($utilisateur->estConnecte()){
        Alignement::getAllObjets();
    }
}

public function ajouterExpression()
{
    if($utilisateur->isAdmin){
        Expression::ajouterExpression($textelangue, $litteraltrad, $theme, $pays, $langue);
    }
}

public function modifierExpression()
{
    if($utilisateur->isAdmin){
        Expression::modifierExpression($expression, $textelangue, $litteraltrad, $theme, $pays, $langue);
    }
}

public function supprimerExpression()
{
    if($utilisateur->isAdmin){
        Expression::supprimerExpression($expression);
    }
}

public function ajouterLangue()
{
    if ($utilisateur->isAdmin){
        Langue::ajouterLangue($langue, $code, $groupelangue);
    }
}

public function modifierLangue()
{
    if ($utilisateur->isAdmin){
        Langue::modifierLangue($idlangue, $langue, $code, $groupelangue);
    }
}

public function supprimerLangue()
{
    if ($utilisateur->isAdmin){
        Langue::supprimerLangue($langue);
    }
}

}
?>