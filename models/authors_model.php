<?php

include "db.php";

function get_all_authors_info() {
    global $conn;

    $query = "SELECT * FROM authors";

    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}