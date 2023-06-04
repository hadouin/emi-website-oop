<?php
/**
 * @var $categories
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
        .button {
            background-color: #4A86E8;
            color: white;
            border: 2px solid #4A86E8;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            border-radius: 4px;
            margin: 20px auto;
        }

        .button:hover {
            background-color: white;
            color: #4A86E8;
        }
    </style>
<body style="display: flex; flex-grow: 1; flex-direction: column">
<div style="display: flex; flex-direction: column; flex-grow: 1">
    <h1>LE FORUM</h1>
    <div style="justify-content: left">
        <a href="/Welcome" class="button">HOME</a>
        <?php if(isset($_SESSION["userId"])) {
            ?>
        <a href="/Forum/createTopic" class="button">Create new topic</a>
        <?php
        }
        ?>
    </div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Titre</th>
        </tr>
        <?php
            foreach ($categories as $cat) {
                ?>
                    <tr>
                        <td>
                            <?= $cat['id']?>
                        </td>
                        <td class="colone_titre">
                            <a href="/Forum/sujet?id=<?= $cat['id']?>"><?= $cat['titre']?></a>
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
