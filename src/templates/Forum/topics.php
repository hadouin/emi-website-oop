<?php $title = "Emi - Topics" ?>
<?php ob_start();
/**
 * @var $cat_id
 * @var $topics
 */
session_start();

if(empty($cat_id)) {
    header('Location: /Forum/forum');
    exit;
}
?>
<head>
    <link rel="stylesheet" href="../assets/css/forum.css">
</head>
<html>
<body>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Date</th>
    </tr>
    <?php
    foreach ($topics as $top) {
        ?>
        <tr>
            <td c>
                <?= $top['id']?>
            </td>
            <td class="colone_titre">
                <a href=""><?= $top['titre']?></a>
            </td>
            <td>
                <?= $top['date_creation']?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>




