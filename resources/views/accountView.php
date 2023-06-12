<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Languizz</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="/resources/css/styles.css" rel="stylesheet">
</head>

<body>
    <form action="modifyAccount" method="POST">
        <!-- Container général -->
        <div id="generalContainerAccountView">
            <!-- Container partie gauche -->
            <div id="leftContainerAccountView">
                <!-- Container titre + icone retour -->
                <div style="padding-bottom: 15px;">
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
                    <div id="infosUserHeader" style="height:30%">
                        <span class="material-symbols-outlined defaultAvatar">
                            account_circle
                        </span> <span id="firstnameLastname"><?php echo $user->get("login") ?></span>
                    </div>
                    <!-- Langues de l'utilisateur -->
                    <div id="languesUserContainer" style="height:30%">
                        <div id="languesListe">
                            <span id="languesTitle"> Langues :</span>
                            <?php if ($all_langs) {
                                echo $all_langs;
                            } else {
                                echo "Pas de langues renseignées pour le moment.";
                            } ?>
                        </div>
                    </div>
                    <!-- Statistiques de parties -->
                    <div id="containerStatsDeco" style="height: 30%">
                        <!-- Statistiques du joueur -->
                        <div class="statsContainer">

                            <div class="statsSubContainer">
                                <img src="/resources/images/game-controller.png" alt="Game controller Icon" width="50px"
                                     height="50px"/>
                                <div class="nbStat" id="games">12</div>
                            </div>
                            <div class="statsSubContainer">
                                <div class="statsSubSubContainer">
                                    <img src="/resources/images/medal.png" alt="Medal Icon" width="50px" height="50px"/>
                                    <div class="nbStat" id="wins">8</div>
                                </div>
                                <div class="statsSubSubContainer">
                                    <img src="/resources/images/skull.png" alt="Skull Icon" width="50px" height="50px"/>
                                    <div class="nbStat" id="losses">4</div>
                                </div>
                            </div>
                        </div>
                        <!-- Bouton déconnexion -->
                        <a class="deconnectBtn" href="/disconnect"><button>Déconnexion</button></a>
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
                            <label class="titleChamps" for="profilePicture">Photo de profil</label> <input type="file" id="profilePicture" name="profilePicture">
                        </div>
                    </div>
                    <div id="profileInfoContainer">
                        <div class="subBlock">
                            <div class="inputContainer">
                                <!-- nom -->
                                <label class="titleChamps" for="lastname">Nom</label> <input type="text" id="lastname" name="nom" value='<?php echo $user->get("nom") ?>'>
                            </div>
                            <div class="inputContainer">
                                <!-- prenom -->
                                <label class="titleChamps" for="firstname">Prénom</label> <input type="text" id="firstname" name="prenom" value='<?php echo $user->get("prenom") ?>'>
                            </div>
                        </div>
                        <div class="subBlock">
                            <div class="inputContainer">
                                <!-- email -->
                                <label class="titleChamps" for="email">E-mail</label> <input type="email" id="email" name="email" value='<?php echo $user->get("email") ?>'>
                            </div>
                            <div class="inputContainer">
                                <!-- mdp -->
                                <label class="titleChamps" for="password">Mot de passe</label> <input type="password" id="password" name="mdp">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="containerBottomItems"  style="padding-top:20px;">
                    <div id="langBlock">
                        <div style="padding-bottom: 15px;">
                            <label class="titleChamps" for="langs">Langues</label>
                            <div class="ajouterLangBtn">
                                <select id="langs" name="langs">
                                    <?php echo $available_langs ?>
                                </select>
                                <button id="addLangBtn" type="submit" formaction="addingLang">Ajouter</button>
                                <!--<button id="addLangBtn" onclick="return addLang()" type="submit">Ajouter</button>-->
                            </div>

                        </div>

                        <div>
                            <label class="titleChamps" for="langs">Langue native</label>
                            <?php if ($lang != '') { ?>
                                <div>
                                    <select id="langs" name="id_langue">
                                        <?php echo $available_langs ?>
                                    </select>
                                </div>
                            <?php } ?>
                            <div>
                                <span id="languesListe"><?php if ($langs) {
                                echo $langs;
                            } else {
                                echo "Pas de langue native renseignée.";
                            } ?></span>
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