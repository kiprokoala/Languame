<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Languizz</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="/resources/css/styles.css" rel="stylesheet">
</head>

<body>
<input type=hidden id="inputAllParties" value="<?php echo($all_parties); ?>" />
    <div class="xrapper">
        <div class="warning">
            <div class="separation">
                <h2>Bonjour <?php echo $user->get('login') ?> !</h2>
                <?php if ($user->get('isAdmin')) { ?><button>
                        <span>Admin
                        </span>
                    </button>
                <?php } ?>
            </div>
            <p>A vous d'organiser le jeu.</p>
            <h4>Gestion d'une partie</h4>
            <hr style="width:100%">
            <div id="btnsModale">
                <button onclick="toggleClass(1)" class="afficherModaleBtn">
                    <span class="material-symbols-outlined">
                        add_circle
                    </span>Créer un jeu</button>
                <button onclick="toggleClass(2)" class="afficherModaleBtn">
                    <span class="material-symbols-outlined">
                        group_add
                    </span>Créer une équipe</button>
                <button onclick="toggleClass(3)" class="afficherModaleBtn">
                    <span class="material-symbols-outlined">
                        history
                    </span>Historique des parties</button>
            </div>
        </div>
        <div class="content">
            <h1>Modale</h1>
            <div id="divForModals" class="content-modal">
                <!-- MODALE CREER JEU -->
                <div id="displayCreeJeu" class="display">
                    <div id="modaleCreerJeuDiv">
                        <form id="formCreerJeuDiv" action="/createGame" method="POST">
                            <div class="ligneDiv">
                                <label class="textModale1 ligneSubDivLeft" for="titreJeu">Titre du jeu</label>
                                <input class="ligneSubDivRight" type="text" id="titreJeu" name="titreJeu" required minlength="1" maxlength="20" placeholder="Titre du jeu...">
                            </div>
                            <div class="ligneDiv">
                                <div class="ligneSubDivLeft">
                                    <div id="themeTextDiv">
                                        <span class="textModale1" for="themes-select">Thèmes</span>
                                        <span class="textModale3">(choisir 4 parmi la liste)</span>
                                    </div>
                                </div>

                                <div class="ligneSubDivRight">
                                    <fieldset>
                                        <div id="listeCheckboxThemes">
                                            <?php echo $themes ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="ligneDiv">
                                <span class="textModale1 ligneSubDivLeft">Equipes</span>
                                <select class="ligneSubDivRight scroller" id="equipesLanguesSelect" name="teams[]" multiple>
                                    <?php echo $teams; ?>
                                </select>
                            </div>


                            <!-- Footer (btns) -->
                            <div id="footerModalCreerJeu">
                                <button class="btnFooterModal" id="annulerBtn">Annuler</button>
                                <input class="btnFooterModal" id="validerBtn" type="submit" value="Créer jeu">
                            </div>
                        </form>
                    </div>
                </div>



                <!-- MODALE Créer équipe -->
                <div id="displayCreeEquipe" class="displayNone">

                    <div id="modaleCreerEquipe">
                        <form id="formCreerEquipeDiv" action="/createEquipe" method="POST">
                            <div class="ligneDiv">
                                <label class="textModale1 ligneSubDivLeft" for="nomEquipe">Nom de l'équipe</label>
                                <input class="ligneSubDivRight" type="text" id="nomEquipe" name="nomEquipe" required minlength="1" maxlength="20" placeholder="Nom de l'équipe...">
                            </div>

                            <div class="ligneDiv">
                                <span class="textModale1 ligneSubDivLeft">Groupe de langues</span>
                                <select class="ligneSubDivRight" id="id_groupeLangue" name="id_groupeLangue" required>
                                    <?php echo $groupeLangues ?>
                                </select>
                            </div>
                            <div class="ligneDiv">
                                <span class="textModale1 ligneSubDivLeft">Membres</span>
                                <select class="ligneSubDivRight" id="id_utilisateur" name="id_utilisateur[]" multiple required>
                                    <?php echo $users ?>
                                </select>
                            </div>
                            <div class="ligneDiv">
                                <span class="textModale1 ligneSubDivLeft">Chef d'équipe</span>
                                <select class="ligneSubDivRight" id="idChefEquipe" name="idChefEquipe" required>
                                    <?php echo $chiefs ?>
                                </select>
                            </div>


                            <!-- Footer (btns) -->
                            <div id="footerModalCreerEquipe">
                                <button class="btnFooterModal" id="annulerBtn">Annuler</button>
                                <input class="btnFooterModal" id="validerBtn" type="submit" value="Créer équipe">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- MODALE Historique partie -->
                <div id="displayHistoriquePartie" class="displayNone">
                    <div id="modaleHistoriquePartie">

                        <!-- HISTORIQUE PARTIE -->
                        <div id="displayHistoricDiv" class="displayBlock">

                            <div id="toFillWithCompos">
                                <!-- A remplir avec des composants parties -->
                                <div id="componentPartie" class="" onclick="togglePartie()">
                                    <div class="partieLeftDiv">
                                        <div><span class="textModale1"> Nom du jeu </span> <span class="tagGdl">Groupe de langue</span> </div>
                                        <div class="equipesEtThemesListe">
                                            <span style="font-size: 12px;">Equipes</span>
                                            <!-- A remplir avec les data equipes -->
                                            <div></div>
                                        </div>
                                        <div class="equipesEtThemesListe">
                                            <span style="font-size: 12px;">Thèmes</span>
                                            <!-- A remplir avec les data thèmes -->
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="partieRightDiv">
                                        <img class="fit-picture" src="/resources/images/medal.png">
                                        <button class="btnEquipe"> Equipe </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PARTIE DETAIL -->
                        <div id="displayPartieDiv" class="displayNone">
                            <div id="partieModal">
                                <div>
                                    <div id="titlePartieDiv">
                                        <span>Titre de la partie</span>
                                        <span class="material-symbols-outlined clickable" onclick="toggleHistoric()">
                                            close
                                        </span>
                                    </div>
                                    <span class="textModale1">Membres</span>
                                    <!-- A remplir avec des composants membres-->
                                    <div id="divMembresComponent">
                                        <div class="membreComponent">
                                            <span class="material-symbols-outlined iconImgMember">
                                                account_circle
                                            </span>
                                            <span class="pseudoMembre">pseudo</span>
                                        </div>
                                        <div class="membreComponent">
                                            <span class="material-symbols-outlined iconImgMember">
                                                account_circle
                                            </span>
                                            <span class="pseudoMembre">pseudo</span>
                                        </div>
                                        <div class="membreComponent">
                                            <span class="material-symbols-outlined iconImgMember">
                                                account_circle
                                            </span>
                                            <span class="pseudoMembre">pseudo</span>
                                        </div>
                                    </div>

                                </div>
                                <div style="padding-top:25px">
                                    <span class="textModale1">Stats</span>
                                    <div id="divStatsBox">
                                        <div class="statsBox">
                                            <span class="textModale1">Resultats</span>
                                            <div id="resultatsSubDiv">
                                                <div class="winSubDiv">
                                                    <span id="resultWin">5</span>
                                                    <span class="material-symbols-outlined winIcon">
                                                        done
                                                    </span>
                                                </div>
                                                <div class="winSubDiv"> <span id="resultLoose">3</span>
                                                    <span class="material-symbols-outlined looseIcon">
                                                        close
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="statsBox">
                                            <span class="textModale1">Score final (ud)</span>
                                            <div>3e </div>
                                            <div>75pts</div>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding-top:25px">
                                    <span class="textModale1">Alignements</span>
                                    <!-- A remplir avec des composants alignements-->
                                    <div id="subDivAligmenents">
                                        <div class="alignementHistorique">
                                            <div class="membreAlignementHistorique">
                                                <span class="material-symbols-outlined">
                                                    account_circle
                                                </span>
                                                <span class="pseudoMembre">pseudo</span>
                                            </div>
                                            <div id="contentAlignementHistorique">
                                                <div id="expressionDiv">
                                                    <span class="expressionEtSensSpan">
                                                        Expression
                                                    </span>
                                                    <div class="expressionsListe">
                                                        <span>1</span>
                                                        <span>2</span>
                                                        <span>3</span>
                                                        <span>4</span>
                                                        <span>5</span>
                                                        <span>6</span>
                                                        <span>7</span>
                                                        <span>8</span>
                                                        <span>9</span>
                                                        <span>10</span>
                                                        <span>11</span>
                                                        <span>12</span>
                                                    </div>
                                                </div>
                                                <div id="sensDiv">
                                                    <span class="expressionEtSensSpan">
                                                        Sens
                                                    </span>
                                                    <div class="sensListe">
                                                        <span>a</span>
                                                        <span>b</span>
                                                        <span>b</span>
                                                        <span>b</span>
                                                        <span>c</span>
                                                        <span>d</span>
                                                        <span>b</span>
                                                        <span>a</span>
                                                        <span>d</span>
                                                        <span>a</span>
                                                        <span>d</span>
                                                        <span>d</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>



<script>
    //Recuperer chaque modale
    var displayCreeJeu = document.getElementById("displayCreeJeu");
    var displayCreeEquipe = document.getElementById("displayCreeEquipe");
    var displayHistoriquePartie = document.getElementById("displayHistoriquePartie");
    var divForModals = document.getElementById("divForModals");

    function toggleClass(modaleToDisplay) {
        switch (modaleToDisplay) {
            case 1:
                displayCreeJeu.classList.remove("displayNone");
                displayCreeJeu.classList.add("displayBlock")

                displayCreeEquipe.classList.remove("displayBlock");
                displayCreeEquipe.classList.add("displayNone");
                displayHistoriquePartie.classList.remove("displayBlock");
                displayHistoriquePartie.classList.add("displayNone");


                console.log("Afficher la modale 1");
                break;

            case 2:
                displayCreeEquipe.classList.remove("displayNone");
                displayCreeEquipe.classList.add("displayBlock");

                displayCreeJeu.classList.remove("displayBlock");
                displayCreeJeu.classList.add("displayNone");
                displayHistoriquePartie.classList.remove("displayBlock");
                displayHistoriquePartie.classList.add("displayNone");

                console.log("Afficher la modale 2");
                break;

            case 3:
                displayHistoriquePartie.classList.remove("displayNone");
                displayHistoriquePartie.classList.remove("displayBlock");

                displayCreeJeu.classList.remove("displayBlock");
                displayCreeJeu.classList.add("displayNone");
                displayCreeEquipe.classList.remove("displayBlock");
                displayCreeEquipe.classList.add("displayNone");

                console.log("Afficher la modale 3");
                break;

            default:
                // Action à effectuer si modaleToDisplay ne correspond à aucun des cas précédents
                console.log("Valeur invalide pour modaleToDisplay");
                break;
        }
    }



    // PARTIE HISTORIQUE
    //Recuperer chaque modale de display
    var displayHistoricDiv = document.getElementById("displayHistoricDiv");
    var displayPartieDiv = document.getElementById("displayPartieDiv");
    // div pour remplir les parties
    var toFillWithCompos = document.getElementById("toFillWithCompos");


    var resultWin = document.getElementById("resultWin");
    var resultLoose = document.getElementById("resultLoose");

    function togglePartie(idPartieToShow) {
        // remplir detail partie
        resultWin.innerHTML = "1"
        resultLoose.innerHTML = "1"
        // afficher div détail partie, et cacher div historique
        displayHistoricDiv.classList.remove("displayBlock");
        displayHistoricDiv.classList.add("displayNone");
        displayPartieDiv.classList.remove("displayNone");
        displayPartieDiv.classList.add("displayBlock");
    }

    function toggleHistoric() {
        // afficher div historique et cacher div partie
        displayHistoricDiv.classList.remove("displayNone");
        displayHistoricDiv.classList.add("displayBlock");
        displayPartieDiv.classList.remove("displayBlock");
        displayPartieDiv.classList.add("displayNone");
    }

    // Remplir l'historique de parties
    const imgMedal = document.createElement('img');
    imgMedal.className = "fit-picture";
    imgMedal.src = "/resources/images/medal.png";


    function remplirHist() {
        var inputAllParties = document.getElementById('inputAllParties');
        var allParties = inputAllParties.value;
        console.log(typeof(inputAllParties));
    }


    // aaas.forEach((aaa) => {
    //     let componentPartie = document.createElement("div");
    //     componentPartie.id = "componentPartie";
    //     componentPartie.className="clickable";
    //     componentPartie.addEventListener("click", togglePartie());

    //     let partieLeftDiv = document.createElement("div");
    //     partieLeftDiv.id = "partieLeftDiv";

    //     let partieRightDiv = document.createElement("div");
    //     partieRightDiv.id = "partieRightDiv";

    //     let spanNomDuJeu = document.createElement("span");
    //     componentPartie.className="textModale1";
    //     spanNomDuJeu.textContent = "Nom du jeu"

    //     let divequipeEtThemesListe1 = document.createElement("div");
    //     componentPartie.className="equipesEtThemesListe";

    //     let spanEquipes = document.createElement("span");
    //     spanNomDuJeu.textContent = "Equipes"
    //     spanNomDuJeu.className="spanEquipesEtThemes";

    //     let spanThemes = document.createElement("span");
    //     spanThemes.textContent = "Themes"
    //     spanThemes.className="spanEquipesEtThemes";

    //     let divequipeEtThemesListe2 = document.createElement("div");
    //     componentPartie.className="equipesEtThemesListe";

    //     let btnEquipeWin = document.createElement("button");
    //     spanThemes.textContent = "equipe"

    //     divequipeEtThemesListe1.appendChild(spanEquipes);
    //     //ici , ajouter dans divequipeEtThemesListe1 chaque equipes   

    //     divequipeEtThemesListe2.appendChild(spanThemes);
    //     //ici , ajouter dans divequipeEtThemesListe1 chaque themes  

    //     partieLeftDiv.appendChild(spanNomDuJeu);
    //     partieLeftDiv.appendChild(divequipeEtThemesListe1);

    //     partieRightDiv.appendChild(imgMedal);
    //     partieRightDiv.appendChild(btnEquipe);

    //     componentPartie.appendChild(partieLeftDiv);
    //     componentPartie.appendChild(partieRightDiv);
    //     toFillWithCompos.appendChild(componentPartie);
    // });

    // MODALE CREER JEU
    //---------------------------------------------------------------------------------------------------------------------ADD DATA HERE
    // -----REMPLIR LES BOUTONS "Thèmes"-----
    // Remplacer ce Tableau
    // var themes = ["Theme 1", "Theme 2", "Theme 3", "Theme 4"];

    // Récupérer l'élement conteneur des checkboxes
    // var listeCheckboxThemes = document.getElementById("listeCheckboxThemes");

    // themes.forEach((theme) => {
    //     const checkbox = document.createElement("input");
    //     checkbox.type = "checkbox";
    //     checkbox.id = theme;
    //     checkbox.className = "checkbox-button";

    //     const label = document.createElement("label");
    //     label.htmlFor = theme;
    //     label.textContent = theme;

    //     listeCheckboxThemes.appendChild(checkbox);
    //     listeCheckboxThemes.appendChild(label);
    // });


    //---------------------------------------------------------------------------------------------------------------------ADD DATA HERE
    // -----REMPLIR LE SELECT 'Equipes'-----
    // Remplacer ce Tableau
    // var exemples = ["", "Option 1", "Option 2", "Option 3", "Option 4"];

    // // Récupérer l'élément select
    // var selectElement = document.getElementById("equipesLanguesSelect");
    // var recupTeams = document.getElementById("recupTeams");

    // var teams = recupTeams.innerHTML;

    // // Boucle pour ajouter les options au select
    // for (var i = 0; i < exemples.length; i++) {
    //     var option = document.createElement("option");
    //     option.value = exemples[i];
    //     option.text = exemples[i];
    //     selectElement.appendChild(option);
    // }
</script>

</html>