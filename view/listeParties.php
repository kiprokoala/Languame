<?php
    foreach ($parties as $partie){
        echo "Partie n°".$partie->get('id_partie')." / ".$partie->get('titre')." 
        <form action='/play' method='post'>
            <input type='hidden' name='id_partie' value='".$partie->get('id_partie')."'></input>
            <input type='submit' value='Jouer'></input>
        </form>";
    }
?>