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
            <?php foreach ($questions as $question) {
            $expression = Expression::getObjetById($question->get("id_expression"));
            $themes = $question->getThemes(); ?>
            expression : <?php echo $expression->get('texteLangueExpression') ?><br>
            Traduction littérale : <?php echo $expression->get('litteralTradExpression') ?><br>
            A quel thème cette expression correspond ?<br>
            <fieldset>
                <label>
                    <input type='radio' value='<?php echo $themes[0]->get('id_theme')?>' name='question<?php echo $question->get('id_question')?>' checked>
                    <?php echo $themes[0]->get('nomTheme')?>
                </label>
                <label>
                    <input type='radio' value='<?php echo $themes[1]->get('id_theme')?>' name='question<?php echo $question->get('id_question')?>' checked>
                    <?php echo $themes[1]->get('nomTheme')?>
                </label>
                <label>
                    <input type='radio' value='<?php echo $themes[2]->get('id_theme')?>' name='question<?php echo $question->get('id_question')?>' checked>
                    <?php echo $themes[2]->get('nomTheme')?>
                </label>
                <label>
                    <input type='radio' value='<?php echo $themes[3]->get('id_theme')?>' name='question<?php echo $question->get('id_question')?>' checked>
                    <?php echo $themes[3]->get('nomTheme')?>
                </label>
            </fieldset>
        <?php }?>
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