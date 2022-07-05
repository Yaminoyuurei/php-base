<?php
$pdo = require_once './data/database.php';
$id = $_GET['id'] ?? '';

if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $fruit = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fruit = $_POST['name'];
    $stmtUpdate = $pdo->prepare('UPDATE product SET name = :name WHERE id = :id');
    $stmtUpdate->bindValue(':name', $fruit);
    $stmtUpdate->bindValue(':id', $id);
    $stmtUpdate->execute();
    header('Location: /php-base');
}
?>


<form action="" method="POST">

    <input type="text" name="name" id="name" value="<?= $fruit['name'] ?>">
    <button>Confirmer</button>

</form>