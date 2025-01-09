<?php

include "db.php";

function get_all_publishers_info() {
    global $conn;

    $query = "SELECT * FROM publishers";

    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}