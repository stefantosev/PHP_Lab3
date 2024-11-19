<?php
session_start();

include "../../database/db_connection.php";
require "../../jwt_helper.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $db = database_connect();

    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindValue(":username", $username);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if($user && password_verify($password, $user["password"])){
        $token = createJWT($user["id"], $user["username"]);

        session_regenerate_id(true);
        $_SESSION["jwt"] = $token;

        header('Location: ../../index.php');
        exit;
    }else{
        echo "Invalid username or password";
        echo "<a href='../../pages/auth/login_form.php'>Go back !</a>";
        exit();
    }
}
?>