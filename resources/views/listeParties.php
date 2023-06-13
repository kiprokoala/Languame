<div id="listGamesContainerMain">
    <div id="listGamesContainer">


<div class="blockGames">
    <div style="  font-weight: 600;
  font-size: 1.8em;
  padding: 10px;
  color:white;">Jeux - tout joueurs</div>
    <div style="color:white; padding: 20px;">Liste des jeux disponibles</div>
    <div style="height: 80%;overflow-y:scroll; padding: 10px;">
    <?php
    foreach ($parties as $partie) {
        echo "<div class='gameItem'><div style='padding-right: 15px;'>Partie n°" . $partie->get('id_partie') . " / " . $partie->get('titre') . '</div>' ." 
            <form action='/play' method='post'>
                <input type='hidden' name='id_partie' value='" . $partie->get('id_partie') . "'></input>
                <input id='btnPlay' type='submit' value='Jouer'></input>
            </form></div>";
    }
    if (!$parties) {
        echo "Pas de parties disponibles pour le moment.";
    }
    ?></div>
</div>
<div class="blockGames">
<div style="  font-weight: 600;
  font-size: 1.8em;
  padding: 10px;
  color:white;">Jeux - chef</div>
<div style="color:white; padding: 20px;">Liste des jeux disponibles</div>
<div style="overflow-y:scroll">
<?php
foreach ($parties_chef as $partie) {
    echo "<div class='gameItem'><div style='padding-right: 15px;'>Partie n°" . $partie->get('id_partie') . " / " . $partie->get('titre') . '</div>' ." 
        <form action='/answer' method='post'>
            <input type='hidden' name='id_partie' value='" . $partie->get('id_partie') . "'></input>
            <input id='btnPlay' type='submit' value='Donner réponse'></input>
        </form></div>";
}
if (!$parties_chef) {
    echo "<div style='color:white; padding-left: 20px; font-weight: 300;'>Vous n'êtes le chef d'aucun jeu pour le moment</div>";
}
?></div>
</div>
</div>    </div>