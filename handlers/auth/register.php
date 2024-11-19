<?php

session_start();

include "../../database/db_connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $db = database_connect();
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");


    try{
        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":password", $hashedPassword);

        $stmt->execute();

        echo "Registered successfully! <a href='../../pages/auth/login_form.php'> Continue to Log In</a>";
    }catch(PDOException $e){
        if($e->getCode() == "23000"){
            die("Username already taken");
        }else{
            die("Something went wrong"  . $e->getMessage());
        }
    }
}
