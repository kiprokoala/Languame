<?php
namespace app\Utils;

use PDO;

class Database
{
    // les attributs static caractéristiques de la connexion

    static private $tabUTF8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    // l'attribut static qui matérialisera la connexion
    static private $pdo;

    // le getter public de cet attribut
    static public function pdo()
    {
        return self::$pdo;
    }

    // la fonction static de connexion qui initialise $pdo et lance la tentative de connexion
    static public function connect()
    {
        $hostname = config("database.host");
        $database = config("database.name");
        $login = config("database.login");
        $password = config("database.password");
        $t = self::$tabUTF8;
        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database", $login, $password, $t);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage() . "<br>";
        }
    }
}


