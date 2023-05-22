<?php session_start()?>
<?php ob_start();
/**
 *@var $categories
 */
?>

<html>
<head></head>
<body>
<form action="/Forum/createTopic" method="post">
    <div class="category">
        <select name="category">
            <option selected>Select your category</option>
            <?php
                foreach ($categories as $cat) {
                ?>
                    <option value="<?=$cat['id']?>"> <?= $cat['titre']?> </option>
                <?php
                }
            ?>
        </select>
    </div>
    <div class="title">
        <input type="text" name="title" id="titre" placeholder="title" required>
    </div>
    <div class="content">
        <textarea name="content" id="content" rows="3" placeholder="your Topic" required></textarea>
    </div>
    <div>
        <button type="submit" name="create-topic">Create</button>
    </div>
</form>
</body>
</html>
