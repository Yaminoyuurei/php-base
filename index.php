<?php

$pdo = require_once './data/database.php';

$stmt = $pdo->prepare('SELECT * FROM product');
$stmt->execute();
$fruits = $stmt->fetchAll();

$title = "PHP - Les bases (dans une variable)";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fruit = $_POST['name'];

    if (!$fruit) {
        $error = 'Champ à renseigner';
    }


    if (!$error) {
        $stmtCreate = $pdo->prepare('INSERT INTO product VALUES (DEFAULT, :name, :userid)');
        $stmtCreate->bindValue(':name', $fruit);
        $stmtCreate->bindValue(':userid', 1);
        $stmtCreate->execute();

        header('Location: ' . $_SERVER['PHP_SELF']);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?>
    </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include_once './includes/header.php'; ?>

    <section class="product">
        <h2>Listes de produit</h2>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text" name="name" id="name" placeholder="Nouveau fruit">
            <button type="submit">Envoyer</button>
            <?php if ($error) : ?>
                <span><?= $error ?></span>
            <?php endif; ?>
        </form>

        <ul>
            <?php foreach ($fruits as $fruit) : ?>
                <li><?= $fruit['name'] ?>
                <a href="edit-fruit.php?id=<?= $fruit['id'] ?>">Modifier</a>
                <a href="delete-fruit.php?id=<?= $fruit['id'] ?>">Supprimer</a>
                </li>
                
            <?php endforeach; ?>
        </ul>
    </section>


    <?php include_once './includes/footer.php'; ?>

</body>

</html>