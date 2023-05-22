<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Créer un jeu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <style>

    .row{
        margin-top:2%;
        margin-bottom:2%;
        display:flex;
        align-items:center;
    }

    .mainLabel{
        margin-right:3%;
        width:25%;
        font-family:"Inter";
        font-weight:bold;
        font-size:1.5rem;
    }

    INPUT[type=text]{
        padding:1%;
        font-size:1.5rem;
        border-radius:5px;
        width:50%;
        font-family:"Inter";
        font-weight:bold;
        border:2px solid #A4A4A4;
        color:#EEEEEE;
    }

    SELECT{
        padding:2%;
        font-size:1rem;
        border-radius:5px;
        width:25%;
        font-family:"Inter";
        font-weight:bold;
        border:2px solid #A4A4A4;
    }

    SELECT OPTION{
        font-family:"Inter";
        font-weight:bold;
        color:#EEEEEE;
    }

    INPUT[type=checkbox]{
        display:none;
    }

    .labelCheckbox{
        margin-left:5px;
        margin-bottom:5px;
        display:inline-block;
        padding:10px 20px;
        background: #E76F51;
        border-radius:5px;
        cursor:pointer;
        font-family:"Inter";
        font-weight:bold;
        font-size:0.75rem;
        color:#FFFFFF;
        border:0;
    }

    .labelCheckbox:hover{
        background:#b43718;
    }

    input[type=checkbox]:checked + .labelCheckbox{
        background:#a0d8a0;
    }

    .listThemes{
        width:55%;
        display:flex;
        flex-wrap: wrap;
    }

    BUTTON{
        padding:1%;
        font-family:"Inter";
        font-weight:bold;
        font-size:1.5rem;
        color:#FFFFFF;
        border:0;
        border-radius:5px;
    }

    .cancel{
        background:#B5446E;
    }

    .create{
        background:#2A9D8F;
    }

    .between{
        justify-content:space-between;
    }
</style>
</head>
<body>
 <section>
    <div class="row">
        <label class="mainLabel">Titre du jeu</label>
        <input type="text" placeholder="Titre du jeu..."/>
    </div>
    <div class="row">
        <label class="mainLabel">Thèmes</label>
        <div class="listThemes">
        <?php 
                foreach($themes as $theme){
                    echo '<input type="checkbox" id="'.$theme->id.'" name="'.$theme->nom.'" value="Bike">';
                    echo '<label class="labelCheckbox" for="'.$theme->id.'">Manger</label>';
                }
        ?>
        </div>
    </div>
    <div class="row">
        <label class="mainLabel">Groupe de langues</label>
        <select name="langues" id="langues">
            <option value="">Choisir...</option>
            <?php 
                foreach($groupesLangues as $groupeLangues){
                    echo '<option value="'.$groupeLangues->id.'">'.$groupeLangues->nom.'</option>';
                }
            ?>
        </select>
    </div>
    <div class="row">
        <label class="mainLabel">Equipes</label>
        <select name="equipes" id="equipes">
            <option value="">Choisir...</option>
            <?php 
                foreach($equipes as $equipe){
                    echo '<option value="'.$equipe->id.'">'.$equipe->nom.'</option>';
                }
            ?>
        </select>
    </div>
    <div class="row between">
        <button class="cancel">Annuler</button>
        <button class="create">Créer un jeu</button>
    </div>
</section>
</body>
</html>