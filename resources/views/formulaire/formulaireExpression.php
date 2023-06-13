<?php
require_once('template/header.html');

use app\Models\Langue;
use app\Models\Pays;
use app\Models\Theme;

$pays = Pays::getAllPays();
$langue = Langue::getAllLangues();
$theme = Theme::getAllTheme();


?>


<style>
    html,
    body {
        width: 100%;
        height: 100%;
        overflow: hidden;
        padding: 0;
        margin: 0;
    }

    body {
        background-image: url("assets/fond.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 100%;
    }
</style>

<body>
    <div class="container d-flex justify-content-center" style="width: max-width; height: max-height; margin-top: 100px;">

        <div id="form1" class="card text-dark bg-light mt-5 shadow" style="width: 400px; border-radius: 15px;">
            <div class="card-body">
            <a href="/"><button class="btn text-light mb-3" style="background-color:  #9374a1;">Retour à la page d'accueil</button></a>
                <div class="mb-3">
                    <label for="paysId" class="form-label">Pays :</label>
                    <select class="form-select" name="pays" id="paysId">
                        <?php foreach($pays as $pays1) { ?>
                            <option value="<?php echo $pays1->id_pays; ?>"><?php echo $pays1->nomPays; ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="langueId" class="form-label">Langue :</label>
                    <select class="form-select" name="langue" id="langueId">
                    <?php foreach($langue as $langue) { ?>
                        <option value="<?php echo $langue->id_langue; ?>"><?php echo $langue->nomLangue; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button id="btnSuivant1" class="btn form-control text-light" style="background-color:  #5a6d9a;">Suivant</button>
            </div>
        </div>

        <div id="form2" class="card text-dark bg-light mb-3 mt-5 shadow" style="width: 400px; border-radius: 15px; display:none;">
            <div class="card-body">
                <button id="btnRetour2" class="btn text-light mb-3" style="background-color:  #9374a1;">Retour</button>
                <div class="mb-3">
                    <button class="btn form-control text-light btnSuivant2" style="background-color:  #5a6d9a;" value="Difficilement_traduisible" name="difficilTraduisible">Difficilement traduisible</button>
                </div>
                <div class="mb-3">
                    <button class="btn form-control text-light btnSuivant2" style="background-color:  #5a6d9a;" value="Qui_vise_un_pays" name="visePays">Qui vise un pays</button>
                </div>
                <div>
                    <button class="btn form-control text-light btnSuivant2" style="background-color:  #5a6d9a;" value="Exprimer_un_sens_donnee" name="sensDonnee">Exprimer un sens donnée</button>
                </div>
            </div>
        </div>

        <div id="form3" class="card text-dark bg-light mt-5 shadow" style="width: 400px; border-radius: 15px; display:none;">
            <div class="card-body">
                <button id="btnRetour3" class="btn text-light mb-3" style="background-color:  #9374a1;">Retour</button>
                <div class="mb-3">
                    <label for="origineId3" class="form-label">Expression dans la langue d'origine :</label>
                    <input type="text" class="form-control" id="origineId3" name="origine" placeholder="Expression dans la langue d'origine">
                </div>
                <div class="mb-3">
                    <label for="translitterationId3" class="form-label">Translittération (si nécessaire) :</label>
                    <input type="text" class="form-control" id="translitterationId3" name="translitteration" placeholder="Translittération (si nécessaire)">
                </div>
                <div class="mb-3">
                    <label for="litteraleId3" class="form-label">Signification littérale :</label>
                    <input type="text" class="form-control" id="litteraleId3" name="litterale" placeholder="Signification littérale">
                </div>
                <div class="mb-3">
                    <label for="idiomatiqueId3" class="form-label">Signification idiomatique :</label>
                    <input type="text" class="form-control" id="idiomatiqueId3" name="idiomatique" placeholder="Signification idiomatique *">
                </div>
                <button id="btnSuivant3" class="btn form-control text-light" style="background-color:  #5a6d9a;">Valider</button>
            </div>
        </div>

        <div id="form4" class="card text-dark bg-light mt-5 shadow" style="width: 400px; border-radius: 15px; display:none;">
            <div class="card-body">
                <button id="btnRetour4" class="btn text-light mb-3" style="background-color:  #9374a1;">Retour</button>
                <div class="mb-3">
                    <label for="expressionId4" class="form-label">Expression dans la langue d'origine :</label>
                    <input type="text" class="form-control" id="origineId4" name="origine" placeholder="Expression dans la langue d'origine">
                </div>
                <div class="mb-3">
                    <label for="translitterationId4" class="form-label">Translittération (si nécessaire) :</label>
                    <input type="text" class="form-control" id="translitterationId4" name="translitteration" placeholder="Translittération (si nécessaire)">
                </div>
                <div class="mb-3">
                    <label for="significationId4" class="form-label">Signification littérale :</label>
                    <input type="text" class="form-control" id="litteraleId4" name="litterale" placeholder="Signification littérale">
                </div>
                <div class="mb-3">
                    <label for="sigIdiomatiqueId4" class="form-label">Signification idiomatique :</label>
                    <input type="text" class="form-control" id="idiomatiqueId4" name="sigIdiomatique" placeholder="Signification idiomatique *">
                </div>
                <div class="mb-3">
                    <label for="paysViseId4" class="form-label">Pays visée :</label>
                    <select class="form-select" name="paysVise" id="paysViseId4">
                        <?php foreach($pays as $paysVise) { ?>
                            <option value="<?php echo $paysVise->id_pays; ?>"><?php echo $paysVise->nomPays; ?></option>
                        <?php } ?>
                    </select>
                </div>
               
                <button id="btnSuivant4" class="btn form-control text-light" style="background-color:  #5a6d9a;">Valider</button>
            </div>
        </div>

        <div id="form5" class="card text-dark bg-light mt-5 shadow" style="width: 400px; border-radius: 15px; display:none">
            <div class="card-body">
                <button id="btnRetour5" class="btn text-light mb-3" style="background-color:  #9374a1;">Retour</button>
                <div class="mb-3">
                    <label for="themeId5" class="form-label text-center">Selectionner un thème :</label>
                    <select class="form-select" name="theme" id="themeId5">
                        <?php foreach($theme as $theme3) { ?>
                            <option value="<?php echo $theme3->id_theme; ?>"><?php echo $theme3->nomTheme; ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="origineId5" class="form-label">Expression dans la langue d'origine :</label>
                    <input type="text" class="form-control" id="origineId5" name="origine" placeholder="Expression dans la langue d'origine">
                </div>
                <div class="mb-3">
                    <label for="translitterationId5" class="form-label">Translittération (si nécessaire) :</label>
                    <input type="text" class="form-control" id="translitterationId5" name="translitteration" placeholder="Translittération (si nécessaire)">
                </div>
                <div class="mb-3">
                    <label for="litteraleId5" class="form-label">Signification littérale :</label>
                    <input type="text" class="form-control" id="litteraleId5" name="significationLitterale" placeholder="Signification littérale *">
                </div>
                <div class="mb-3">
                    <label for="idiomatiqueId5" class="form-label">Signification idiomatique :</label>
                    <input type="text" class="form-control" id="idiomatiqueId5" name="idiomatique" placeholder="Signification idiomatique *">
                </div>

                <button id="btnSuivant5" class="btn form-control text-light" style="background-color:  #5a6d9a;">Valider</button>
            </div>
        </div>

    </div>
</body>

<script>
    var btnSuivant1 = document.getElementById('btnSuivant1');
    var btnSuivant2 = document.getElementsByClassName('btnSuivant2');
    var btnSuivant3 = document.getElementById('btnSuivant3');
    var btnSuivant4 = document.getElementById('btnSuivant4');
    var btnSuivant5 = document.getElementById('btnSuivant5');
    
    var btnRetour2 = document.getElementById('btnRetour2');
    var btnRetour3 = document.getElementById('btnRetour3');
    var btnRetour4 = document.getElementById('btnRetour4');
    var btnRetour5 = document.getElementById('btnRetour5');

    var form1 = document.getElementById('form1');
    var form2 = document.getElementById('form2');
    var form3 = document.getElementById('form3');
    var form4 = document.getElementById('form4');
    var form5 = document.getElementById('form5');

    var pays = "";
    var langue = "";

    var typeExpression = "";

    var expression = "";
    var transliteration = "";
    var significationLitterale = "";
    var significationIdiomatique = "";

    var paysVise = "";

    var theme = "";

    btnSuivant1.addEventListener('click', function() {
        langue = document.getElementById('langueId').value;
        pays = document.getElementById('paysId').value;
        if (langue != "") {
            form1.style.display = 'none';
            form2.style.display = 'block';
        } else {
            alert('Veuillez remplir le champ langue !');
        }
    });

    for (var i = 0; i < btnSuivant2.length; i++) {
        if (i == 0) {
            btnSuivant2[i].addEventListener('click', function() {
                form2.style.display = 'none';
                form3.style.display = 'block';
            });
        } else if (i == 1) {
            btnSuivant2[i].addEventListener('click', function() {
                form2.style.display = 'none';
                form4.style.display = 'block';
            });
        } else {
            btnSuivant2[i].addEventListener('click', function() {
                form2.style.display = 'none';
                form5.style.display = 'block';
            });
        }
    }

    btnSuivant3.addEventListener('click', function() {
        expression = document.getElementById('origineId3').value;
        transliteration = document.getElementById('translitterationId3').value;
        significationLitterale = document.getElementById('litteraleId3').value;
        significationIdiomatique = document.getElementById('idiomatiqueId3').value;
        if (expression != "" && significationLitterale != "" && significationIdiomatique != "") {
            alert('Merci pour votre participation !');
            var data = {
                'expression' : expression,
                'translitteration' : transliteration,
                'significationLitterale' : significationLitterale,
                'significationIdiomatique' : significationIdiomatique,
                'pays' : pays,
                'langue' : langue,
                'typeExpression' : typeExpression,
                'paysVise' : null,
                
            };
            $.ajax({
                type: "POST",
                url: "resources/views/formulaire/traitement/traitementFormulaire.php",
                data: data,
                success: function(data) {
                    let donnees = JSON.parse(data);
                    console.log(donnees);
                }
            });
            window.location.href = "/";
        
        } else {
            alert('Veuillez remplir les champs obligatoires !');
        }
    });

    btnSuivant4.addEventListener('click', function() {
        expression = document.getElementById('origineId4').value;
        transliteration = document.getElementById('translitterationId4').value;
        significationLitterale = document.getElementById('litteraleId4').value;
        significationIdiomatique = document.getElementById('idiomatiqueId4').value;
        paysVise = document.getElementById('paysViseId4').value;
        if (expression != "" && significationLitterale != "" && significationIdiomatique != "") {
            alert('Merci pour votre participation !');
            var data = {
                'expression' : expression,
                'translitteration' : transliteration,
                'significationLitterale' : significationLitterale,
                'significationIdiomatique' : significationIdiomatique,
                'pays' : pays,
                'langue' : langue,
                'typeExpression' : null,
                'paysVise' : paysVise,
                
            };
            $.ajax({
                type: "POST",
                url: "resources/views/formulaire/traitement/traitementFormulaire.php",
                data: data,
                success: function(data) {
                    let donnees = JSON.parse(data);
                    console.log(donnees);
                }
            });
            window.location.href = "/";
        } else {
            alert('Veuillez remplir les champs obligatoires !');
        }
    });

    btnSuivant5.addEventListener('click', function() {
        theme = document.getElementById('themeId5').value;
        expression = document.getElementById('origineId5').value;
        transliteration = document.getElementById('translitterationId5').value;
        significationLitterale = document.getElementById('litteraleId5').value;
        significationIdiomatique = document.getElementById('idiomatiqueId5').value;
        if (expression != "" && significationLitterale != "" && significationIdiomatique != "") {
            alert('Merci pour votre participation !');
            var data = {
                'expression' : expression,
                'translitteration' : transliteration,
                'significationLitterale' : significationLitterale,
                'significationIdiomatique' : significationIdiomatique,
                'pays' : pays,
                'langue' : langue,
                'typeExpression' : null,
                'paysVise' : null,
                'theme' : theme
            };
            $.ajax({
                type: "POST",
                url: "resources/views/formulaire/traitement/traitementFormulaire.php",
                data: data,
                success: function(data) {
                    let donnees = JSON.parse(data);
                    console.log(donnees);
                }
            });
            window.location.href = "/";
        } else {
            alert('Veuillez remplir les champs obligatoires !');
        }
    });


    btnRetour2.addEventListener('click', function() {
        form2.style.display = 'none';
        form1.style.display = 'block';
    });

    btnRetour3.addEventListener('click', function() {
        form3.style.display = 'none';
        form2.style.display = 'block';
    });

    btnRetour4.addEventListener('click', function() {
        form4.style.display = 'none';
        form2.style.display = 'block';
    });

    btnRetour5.addEventListener('click', function() {
        form5.style.display = 'none';
        form2.style.display = 'block';
    });
</script>

<?php
require_once('template/footer.html');
?>
