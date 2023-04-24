<?php
    function getConnection() {
        try {
            $connection = new PDO('mysql:host=localhost;dbname=projeto-escola', "root", "");
            return $connection;
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Error!: " . $e->getMessage() . "</p>";
            die();
        }
    }
?>