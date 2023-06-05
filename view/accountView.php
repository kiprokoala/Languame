<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Languizz</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="/styles/styles.css" rel="stylesheet">
</head>

<body>
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
                    </span>
                    <span id="firstnameLastname">Nom Prénom</span>
                </div>
                <!-- Langues de l'utilisateur -->
                <div id="languesUserContainer">
                    <span id="languesTitle"> Langues :</span>
                    <div id="languesListe">
                        <span>Français</span>
                        <span>Anglais</span>
                        <span>Portugais</span>
                        <span>Espagnol</span>
                    </div>
                </div>
                <!-- Statistiques de parties -->
                <div id="containerStatsDeco">
                    <!-- Statistiques du joueur -->
                    <div class="statsContainer">

                        <div class="statsSubContainer">
                            <img src="/assets/game-controller.png" alt="Game controller Icon" width="50px"
                                height="50px" />
                            <div class="nbStat" id="games">12</div>
                        </div>
                        <div class="statsSubContainer">
                            <div class="statsSubSubContainer">
                                <img src="/assets/medal.png" alt="Medal Icon" width="50px" height="50px" />
                                <div class="nbStat" id="wins">8</div>
                            </div>
                            <div class="statsSubSubContainer">
                                <img src="/assets/skull.png" alt="Skull Icon" width="50px" height="50px" />
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
                        <label class="titleChamps" for="profilePicture">Photo de profil</label>
                        <input type="file" id="profilePicture" name="profilePicture">
                    </div>
                </div>
                <div id="profileInfoContainer">
                    <div class="subBlock">
                        <div class="inputContainer">
                            <!-- nom -->
                            <label class="titleChamps" for="lastname">Nom</label>
                            <input type="text" id="lastname" name="lastname" value='<?php echo $user->get("nom") ?>'>
                        </div>
                        <div class="inputContainer">
                            <!-- prenom -->
                            <label class="titleChamps" for="firstname">Prénom</label>
                            <input type="text" id="firstname" name="" firstname value='<?php echo $user->get("prenom") ?>'>
                        </div>
                    </div>
                    <div class="subBlock">
                        <div class="inputContainer">
                            <!-- email -->
                            <label class="titleChamps" for="email">E-mail</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="inputContainer">
                            <!-- mdp -->
                            <label class="titleChamps" for="password">Mot de passe</label>
                            <input type="password" id="password" name="password">
                        </div>
                    </div>
                </div>
            </div>
            <div id="containerBottomItems">
                <div id="langBlock">
                    <div class="inputContainer">
                        <label class="titleChamps" for="langs">Langues</label>
                        <input type="text" id="langs" name="langs">
                    </div>
                    <div id="tagsContainer">
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                        <div class="tagLang">Français <img src="/assets/close.png" id="imgClose" /></div>
                    </div>
                </div>
                <div id="btnsContainer">
                    <button id="btnSave">Enregistrer</button>
                    <button id="btnCancel">Annuler</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>