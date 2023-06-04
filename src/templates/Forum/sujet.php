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
    <link rel="stylesheet" href="../../assets/css/forum.css">
    <link rel="stylesheet" href="../../assets/css/pico.min.css">
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <style>
        * {
            font-family: 'Montserrat', system-ui, -apple-system, 'Segoe UI', sans-serif;
        }
    </style>
</head>
<html>
<body style="margin: 0">
<h1>Category <?=$cat_id?></h1>
<a href="/Forum/forum" class="button">Forum homepage</a>
<table class="table">
    <tr>
        <th>Titre</th>
        <th>Date</th>
        <th>Par</th>
    </tr>
    <?php
    foreach ($topics as $top) {
        ?>
        <tr>
            <td class="colone_titre">
                <a href="/Forum/topic?id=<?= $top['id']?>"><?= $top['titre']?></a>
            </td>
            <td>
                <?= $top['date_creation']?>
            </td>
            <td>
                <?= $top['pseudo']?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
<footer style="background-color: #4A86E8; margin-top: 10px">
    <?php include "footer.php";?>
</footer>
</html>




