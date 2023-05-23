<?php session_start()?>
<?php ob_start();
/**
 *@var $categories
 */
?>

<html>
<head>
    <link rel="stylesheet" href="../../assets/css/forum.css">
    <style>
        * {
            font-family: 'Montserrat', system-ui, -apple-system, 'Segoe UI', sans-serif;
        }
        /* Centrer le formulaire */
        .form-createTopic {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Styliser le formulaire */
        .form-createTopic form {
            background-color: #f2f2f2;
            border-radius: 5px;
            padding: 20px;
            width: 400px;
        }

        .form-createTopic select,
        .form-createTopic input[type="text"],
        .form-createTopic textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .form-createTopic select:focus,
        .form-createTopic input[type="text"]:focus,
        .form-createTopic textarea:focus {
            outline: none;
            border-color: #7289da;
        }

        .form-createTopic button {
            background-color: #7289da;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-createTopic button:hover {
            background-color: #5a68a5;
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

        header {

        }

    </style>
</head>
<header>
    <a href="/Forum/forum" class="button">Accueil</a>
</header>
<body>
<div class="form-createTopic">
<form action="/Forum/createTopic" method="post">
    <div class="category">
        <select name="category">
            <option disabled selected>Select your category</option>
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
</div>
</body>
</html>
