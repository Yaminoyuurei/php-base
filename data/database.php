<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=sql_base', 'root', 'root',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
    return $pdo;
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>