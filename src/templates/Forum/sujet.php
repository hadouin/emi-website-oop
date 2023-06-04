<?php $title = "Emi - Topics" ?>
<?php ob_start();
use Emi\model\entities\Role;
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
    <script>
        function supprimerLigne(userId, catId) {
            var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");

            if (confirmation) {
                // Redirection vers la page de suppression avec l'ID de l'utilisateur
                window.location.href = "/Forum/supprimerSujet?Id=" + userId + "&catId=" + catId;
            } else {
                console.log("Suppression annulée !");
            }
        }
    </script>
</head>
<html>
<body style="margin: 0; display: flex;flex-direction: column; flex-grow: 1">
<div style="flex-grow: 1">
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
            <?php
            if(isset($_SESSION['userRole'])) {
                if($_SESSION['userRole'] === Role::ADMIN) {?>
                    <td>
                        <button onclick="supprimerLigne(<?=$top['id']; ?>, <?= $cat_id ?>)" style="font-size: 0.9em; width: 50%">Supprimer</button>
                    </td>
                    <?php
                }
            }
            ?>
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




