<?php
    foreach ($parties as $partie){
        echo "Partie n°".$partie->get('id_partie')." 
        <form action='/play' method='post'>
            <input type='hidden' name='id_partie' value='".$partie->get('id_partie')."'></input>
            <input type='submit'>Jouer</input>
        </form>";
    }
?>