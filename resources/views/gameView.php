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
        <div id="titlePartie">
            <?php
            echo $partie->get('titre');
            ?>
        </div>
    
        <!-- Mon code de bourrin -->

        <form style="overflow-y: scroll; height: 92%; padding-right: 20px;" action='/alignement/submitAlignement' method='POST'>
            <?php foreach ($questions as $question) {
                $expression = Expression::getObjetById($question->get("id_expression"));
                $themes = $question->getThemes();
                $question_id = $question->get('id_question');

                ?>
                            <div class="questionBlock" onclick="load(<?php json_encode($questions) ?>)">
                                Expression : <?php echo $expression->get('texteLangueExpression') ?><br>
                                Traduction littérale : <?php echo $expression->get('litteralTradExpression') ?><br>
                            </div>

                            <!--A quel thème cette expression correspond ?<br>
                <fieldset>
                    <label>
                        <input type='radio' value='<?php echo $themes[0]->get('id_theme') ?>' name='question<?php echo $question->get('id_question') ?>' checked>
                        <?php echo $themes[0]->get('nomTheme') ?>
                    </label>
                    <label>
                        <input type='radio' value='<?php echo $themes[1]->get('id_theme') ?>' name='question<?php echo $question->get('id_question') ?>' checked>
                        <?php echo $themes[1]->get('nomTheme') ?>
                    </label>
                    <label>
                        <input type='radio' value='<?php echo $themes[2]->get('id_theme') ?>' name='question<?php echo $question->get('id_question') ?>' checked>
                        <?php echo $themes[2]->get('nomTheme') ?>
                    </label>
                    <label>
                        <input type='radio' value='<?php echo $themes[3]->get('id_theme') ?>' name='question<?php echo $question->get('id_question') ?>' checked>
                        <?php echo $themes[3]->get('nomTheme') ?>
                    </label>
                </fieldset>-->
            <?php } ?>
            <div style="text-align: center;">
                <input type='submit' id="submitAlignement" value='Proposer alignement'>
            </div>
        </form>

        <!-- La fin de mon code de bourrin -->
    </div>
    <div id="gameRightBlock">
        <div id="titleBlockGame">
            <div id="t1"style="display:flex;">Expression 1: <div id="t2">&nbsp; expression</div></div>
            <div id="t3">Traduction littérale</div>
        </div>
        <div id="choiceTheme">
            <div style="background-color:#6D8AB5">Sens 1</div>
            <div style="background-color:#D64D9F">Sens 2</div>
            <div style="background-color:#EF6E4E">Sens 3</div>
            <div style="background-color:#50BB95">Sens 4</div>
        </div>
    </div>
</div>
<script>

</script>
</body>
</html>