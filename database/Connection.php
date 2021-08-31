<?php


class Connection
{
    public static function make()
    {
        $dsn = 'mysql:dbname=pendu;host=localhost';
        $user = 'root';
        $password = '';

        try {
            return new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

}