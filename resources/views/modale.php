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
                                <div id="recupTeams" style="visibility: hidden;"><?php echo $teams ?></div>
                                <select class="ligneSubDivRight" id="equipesLanguesSelect" name="teams[]" multiple>
                                    <?php echo $teams; ?>
                                </select>
                            </div>
                        </form>

                        <!-- Footer (btns) -->
                        <div id="footerModalCreerJeu">
                            <button class="btnFooterModal" id="annulerBtn">Annuler</button>
                            <input class="btnFooterModal" id="validerBtn" type="submit" value="Créer jeu">
                        </div>
                    </div>
                </div>

                <!-- MODALE Créer équipe -->
                <div id="displayCreeEquipe" class="displayNone">

                    <div id="modaleCreerEquipe">
                        <form id="formCreerEquipeDiv" action="" method="POST">
                            

                        </form>
                    </div>
                </div>

                <!-- MODALE Historique partie -->
                <div id="displayHistoriquePartie"  class="displayNone">

                    <div id="modaleHistoriquePartie">
                        <?php
                        echo $all_parties;
                        ?>
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