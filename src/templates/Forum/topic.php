<?php $title = "Emi - Sujets" ?>
<?php ob_start();
/**
 * @var $chosenTopic
 * @var $comments
 */
session_start();
?>
    <html data-theme="light">
    <head>
        <link rel="stylesheet" href="../../assets/css/forum.css">
        <link rel="stylesheet" href="../../assets/css/pico.min.css">
        <link rel="stylesheet" href="../../assets/css/custom.css">
        <link rel="icon" type="image/png" sizes="32x32" href="../../assets/icons/favicon-32x32.png">

        <style>
            * {
                font-family: 'Montserrat', system-ui, -apple-system, 'Segoe UI', sans-serif;
            }

            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-bottom: 10px;
                font-size: 16px;
            }

            button, .button {
                background-color: #7289da;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
        </style>
    </head>
    <body style="display: flex; flex-direction: column; flex-grow: 1">
    <h1>Titre : <?= $chosenTopic['titre']?></h1>
    <div style="width: 65%; margin-left: auto; margin-right: auto; background: white; box-shadow: 0 5px 15px rgba(0, 0, 0, .15); padding: 5px 10px; border-radius: 10px">
        <a href="/Forum/sujet?id=<?=$chosenTopic['id_forum']?>" class="button">return to category <?=$chosenTopic['id_forum']?></a>
        <h3>Contenu</h3>
        <div style="font-size: 1.4em"><?= $chosenTopic['contenu']?> </div>
        <div style="color: #CCC; font-size: 10px; text-align: right">
            <?= $chosenTopic['date_creation']?>
            par
            <?= $chosenTopic['pseudo']?>
        </div>
    </div>
    <?php if(isset($_SESSION['userId'])) {
    ?>
        <div style="width: 65%; margin-left: auto; margin-right: auto; background: white; box-shadow: 0 5px 15px rgba(0, 0, 0, .15);
        padding: 5px 10px; border-radius: 10px; margin-top: 15px">
        <h3>Fell free to comment !</h3>
            <form method="post" action="/Forum/comment">
                <div>
                    <textarea name="comment" rows="4" placeholder="Comment here"></textarea>
                </div>
                <div>
                    <textarea name="topicId" hidden="hidden"><?=$chosenTopic['id']?></textarea>
                </div>
            <button type="submit" name="create-comment">Comment</button>
            </form>
    </div>
    <?php
    }
    ?>

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
    </div>
    </body>
    <footer style="background-color: #4A86E8; margin-top: 20px">
        <?php include "footer.php";?>
    </footer>
    </html>
