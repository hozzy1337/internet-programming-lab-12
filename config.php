<?php
function DB()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=lab12storage', 'mysql', 'mysql');
        return $db;
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}
?>