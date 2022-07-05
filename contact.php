<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require_once './includes/header.php';

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';
$name = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? "";
}



?>

<section>
<div class="form">
    <form action="" method="POST">
        <label for="name">Nom du produit</label>
        <input type="text" name="name" placeholder="Nom">
        <button type="submit">Valider</button>
    </form>
</div>

<div>
    <p>résultat : <?= $name ?></p>
</div>
</section>






<?php
require_once './includes/footer.php';

?> 
</body>
</html>
