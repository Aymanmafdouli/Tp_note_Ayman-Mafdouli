<?php

class Connexion
{
    private static $conn;

    public static function getConnexion()
    {
        if (!self::$conn) {
            try {
                $connString = "mysql:host=127.0.0.1;dbname=streaming;port=3306;charset=utf8";
                self::$conn = new PDO($connString, "root", "");
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
