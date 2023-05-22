<?php $title = "Emi - Sujets" ?>
<?php ob_start();
/**
 * @var $chosenTopic
 * @var $comments
 */
session_start();
?>
    <head>
        <link rel="stylesheet" href="../assets/css/forum.css">
    </head>
    <html>
    <body>
    <h1>Titre <?= $chosenTopic['titre']?></h1>

    <div style="width: 65%; margin-left: auto; margin-right: auto; background: white; box-shadow: 0 5px 15px rgba(0, 0, 0, .15); padding: 5px 10px; border-radius: 10px">
        <h3>Contenu</h3>
        <div style="font-size: 1.4em"><?= $chosenTopic['contenu']?> </div>
        <div style="color: #CCC; font-size: 10px; text-align: right">
            <?= $chosenTopic['date_creation']?>
            par
            <?= $chosenTopic['pseudo']?>
        </div>
    </div>
    <div style="width: 65%; margin-left: auto; margin-right: auto; background: white; box-shadow: 0 5px 15px rgba(0, 0, 0, .15);
     padding: 5px 10px; border-radius: 10px; margin-top: 15px">
        <h3>Commentaires</h3>
        <table class="table">
            <tr>
                <th>Par</th>
                <th>Réponse</th>
                <th>Date</th>
            </tr>
            <?php
            foreach ($comments as $tc) {
                ?>
                <tr>
                    <td>
                        <?= $tc['pseudo']?>
                    </td>
                    <td>
                        <?= $tc['text']?>
                    </td>
                    <td>
                        <?= $tc['date_creation']?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div
    </body>
    </html>
