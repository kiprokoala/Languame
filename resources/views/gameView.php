<!DOCTYPE html>
<html lang="fr">
<?php
use app\Models\Expression;
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Languizz</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="/resources/css/styles.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/resources/images/l.png">
</head>

<body>

<div id="gameContainerBlock">
    <div id="gameLeftBlock">
    bloc gauche
        <!-- Mon code de bourrin -->

        <form action='/alignement/submitAlignement' method='POST'>
            <?php var_dump($questions);?>
            <input type='submit' value='Proposer alignement'>
        </form>

        <!-- La fin de mon code de bourrin -->
    </div>
    <div id="gameRightBlock">
    bloc droite
    </div>
</div>

</body>
</html>