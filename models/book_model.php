<?php

include "db.php";

function get_book_by_title($title) {
    global $conn;

    $query = "SELECT b.title, b.price, CONCAT(a.first_name, ' ', a.last_name) AS author, b.cover_img
                FROM books b INNER JOIN authors a
                ON b.author_id = a.author_id
                WHERE title = \"$title\"";

    $res = mysqli_query($conn, $query);

    return mysqli_fetch_array($res, MYSQLI_ASSOC);
}

function get_full_book_info_from_title($title) {
    global $conn;

    $query = "SELECT b.book_id, b.title, b.summary, b.price, b.discount, b.genre, p.name AS publisher,
                b.num_pages, b.binding, b.pub_year, b.cover_img,
                CONCAT(a.first_name, ' ', a.last_name) AS author
                FROM books b INNER JOIN authors a
                ON b.author_id = a.author_id
                INNER JOIN publishers p
                ON b.publisher_id = p.pub_id
                WHERE title = \"$title\"";

    $res = mysqli_query($conn, $query);

    return mysqli_fetch_array($res, MYSQLI_ASSOC);
}