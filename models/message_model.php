<?php

include "db.php";

function create_message($name, $email, $message) {
    global $conn;

    $query = "INSERT INTO user_messages(name, email, message) VALUES('{$name}', '{$email}', '{$message}')";

    mysqli_query($conn, $query);
}