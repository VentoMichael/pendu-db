<?php

function all(PDO $pdo): array{
    $statement = $pdo->prepare('SELECT * FROM words');
    $statement->execute();
    return $statement->fetchAll();
}