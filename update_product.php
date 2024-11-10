<?php
    include "db_connection.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["id"])){
        $id = intval($_POST["id"]);
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = intval($_POST["price"]);

        $db = database_connect();

        $stmt = $db->prepare("UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id");
        $stmt->bindValue(":name", $name, SQLITE3_TEXT);
        $stmt->bindValue(":description", $description, SQLITE3_TEXT);
        $stmt->bindValue(":price", $price, SQLITE3_INTEGER);
        $stmt->bindValue(":id", $id, SQLITE3_INTEGER);

        $stmt->execute();
        header('Location: index.php');

        $db->close();
    }
    else{
        echo "Invalid request and ID";
    }
?>