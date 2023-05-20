<?php $title = "Emi - Forum" ?>
<?php ob_start();
/**
 * @var $categories
 */
session_start();
?>
<head>
    <link rel="stylesheet" href="../assets/css/forum.css">
</head>
<html>
<body>
<h1>LE FORUM</h1>
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
                        <a href="/Forum/topics?id=<?= $cat['id']?>"><?= $cat['titre']?></a>
                    </td>
                </tr>
        <?php
        }
    ?>
</table>
</body>
</html>
