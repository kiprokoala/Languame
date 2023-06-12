<?php
    foreach ($parties as $partie){
        echo "Partie n°".$partie->get('id_partie')." / ".$partie->get('titre')." 
        <form action='/play' method='post'>
            <input type='hidden' name='id_partie' value='".$partie->get('id_partie')."'></input>
            <input type='submit' value='Jouer'></input>
        </form>";
    }

foreach ($parties_chef as $partie){
    echo "Partie n°".$partie->get('id_partie')." / ".$partie->get('titre')." 
        <form action='/answer' method='post'>
            <input type='hidden' name='id_partie' value='".$partie->get('id_partie')."'></input>
            <input type='submit' value='Donner réponse'></input>
        </form>";
}
?>