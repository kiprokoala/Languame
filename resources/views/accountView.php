<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Languizz</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link href="/styles/styles.css" rel="stylesheet">
</head>

<body>
    <form action="modifyAccount" method="POST">
        <!-- Container général -->
        <div id="generalContainerAccountView">
            <!-- Container partie gauche -->
            <div id="leftContainerAccountView">
                <!-- Container titre + icone retour -->
                <div>
                    <a id="btnBack" href="/">
                        <span class="material-symbols-outlined iconBack">
                            arrow_back
                        </span>
                        <div id="titleAccountView">Profil Utilisateur</div>
                    </a>
                </div>
                <!-- Container infos principales -->
                <div id="infosUser">
                    <!-- Photo de profil + Nom/prénom -->
                    <div id="infosUserHeader">
                        <span class="material-symbols-outlined defaultAvatar">
                            account_circle
                        </span> <span id="firstnameLastname">Nom Prénom</span>
                    </div>
                    <!-- Langues de l'utilisateur -->
                    <div id="languesUserContainer">
                        <span id="languesTitle"> Langues :</span>
                        <div id="languesListe">
                            <?php echo $all_langs ?>
                        </div>
                    </div>
                    <!-- Statistiques de parties -->
                    <div id="containerStatsDeco">
                        <!-- Statistiques du joueur -->
                        <div class="statsContainer">

                            <div class="statsSubContainer">
                                <img src="/assets/game-controller.png" alt="Game controller Icon" width="50px"
                                     height="50px"/>
                                <div class="nbStat" id="games">12</div>
                            </div>
                            <div class="statsSubContainer">
                                <div class="statsSubSubContainer">
                                    <img src="/assets/medal.png" alt="Medal Icon" width="50px" height="50px"/>
                                    <div class="nbStat" id="wins">8</div>
                                </div>
                                <div class="statsSubSubContainer">
                                    <img src="/assets/skull.png" alt="Skull Icon" width="50px" height="50px"/>
                                    <div class="nbStat" id="losses">4</div>
                                </div>
                            </div>
                        </div>
                        <!-- Bouton déconnexion -->
                        <a class="deconnectBtn" href="/disconnect">Déconnexion</a>
                    </div>
                </div>
            </div>
            <!-- Container partie droite -->
            <div id="rightContainerAccountView">
                <div id="titleAccountInfo">Modifier Informations</div>
                <div id="containerAccountInfoUser">
                    <div id="accountInfoUserTop">
                        <span class="material-symbols-outlined defaultAvatarModify">
                            account_circle
                        </span>
                        <div id="profilePicContainer">
                            <label class="titleChamps" for="profilePicture">Photo de profil</label> <input type="file"
                                                                                                           id="profilePicture"
                                                                                                           name="filename">
                        </div>
                    </div>
                    <div id="profileInfoContainer">
                        <div class="subBlock">
                            <div class="inputContainer">
                                <!-- nom -->
                                <label class="titleChamps" for="lastname">Nom</label> <input type="text" id="lastname"
                                                                                             name="nom"
                                                                                             value='<?php echo $user->get("nom") ?>'>
                            </div>
                            <div class="inputContainer">
                                <!-- prenom -->
                                <label class="titleChamps" for="firstname">Prénom</label> <input type="text" id="firstname"
                                                                                                 name="prenom"
                                                                                                 value='<?php echo $user->get("prenom") ?>'>
                            </div>
                        </div>
                        <div class="subBlock">
                            <div class="inputContainer">
                                <!-- email -->
                                <label class="titleChamps" for="email">E-mail</label> <input type="email" id="email"
                                                                                             name="email" value='<?php echo $user->get("email") ?>'>
                            </div>
                            <div class="inputContainer">
                                <!-- mdp -->
                                <label class="titleChamps" for="password">Mot de passe</label> <input type="password"
                                                                                                      id="password"
                                                                                                      name="mdp">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="containerBottomItems">
                    <div id="langBlock">
                        <div class="inputContainer">
                            <label class="titleChamps" for="langs">Langues</label>
                            <div>
                                <select id="langs" name="langs">
                                    <?php echo $available_langs ?>
                                </select>
                                <button id="addLangBtn" type="submit" formaction="addingLang">Ajouter</button>
                                <!--<button id="addLangBtn" onclick="return addLang()" type="submit">Ajouter</button>-->
                            </div>

                        </div>

                        <div class="inputContainer">
                            <label class="titleChamps" for="langs">Langue native</label>
                            <?php if($lang!=''){ ?>
                            <div>
                                <select id="langs" name="id_langue">
                                    <?php echo $available_langs ?>
                                </select>
                            </div>
                            <?php } ?>
                            <div>
                                <span><?php echo $lang ?></span>
                            </div>

                        </div>

                        <div id="tagsContainer">
                            <?php echo $tag_langs ?>
   <!--                         <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
                            <div class="tagLang">Français <img src="/assets/close.png" id="imgClose"/></div>
-->
                        </div>
                    </div>
                    <div id="btnsContainer">
                        <button id="btnSave" type="submit">Enregistrer</button>
                        <button id="btnCancel">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<?php

include("../conf/connexion.php");

function getAllImage() {
    try {
        // préparation de la requête
        $util = $_POST['id_utilisateur'];
        $sql = "UPDATE utilisateur
        SET filename = :filename
        WHERE id_utilisateur = $util";
        $req_prep = Connexion::pdo()->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_OBJ);
        $tabResults = $req_prep->fetchAll();
        // renvoi du tableau de résultats
        return $tabResults;
    } catch (PDOException $e) {
        echo $e->getMessage();
        die("Erreur lors de la recherche dans la base de données.");
    }
}

// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["filename"]) && $_FILES["filename"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["filename"]["name"];
        $filetype = $_FILES["filename"]["type"];
        $filesize = $_FILES["filename"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("Photos/" . $_FILES["filename"]["name"])){
                echo $_FILES["filename"]["name"] . " existe déjà.";
            } else{
                var_dump($_FILES["filename"]["tmp_name"]);
                move_uploaded_file($_FILES["filename"]["tmp_name"], "Photos/" . $_FILES["filename"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
                getAllImage();
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
        echo "Error: " . $_FILES["filename"]["error"];
    }
}
?>