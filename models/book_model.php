<?php

include "db.php";

function get_book_by_title($title) {
    global $conn;

    $query = "SELECT b.title, b.price, CONCAT(a.first_name, ' ', a.last_name) AS author, b.cover_img, b.discount
                FROM books b INNER JOIN authors a
                ON b.author_id = a.author_id
                WHERE title = \"$title\"";

    $res = mysqli_query($conn, $query);

    return mysqli_fetch_array($res, MYSQLI_ASSOC);
}

function get_full_book_info_from_title($title) {
    global $conn;

    $query = "SELECT b.author_id, b.book_id, b.title, b.summary, b.price, b.discount, b.genre, p.name AS publisher,
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

function get_similar_books_info($book_id) {
    global $conn;

    $query = "SELECT b.book_id, b.author_id, b.title, b.price, CONCAT(a.first_name, ' ', a.last_name) AS author, b.cover_img, b.discount
                FROM books b INNER JOIN authors a
                ON b.author_id = a.author_id
                WHERE (b.genre IN
                (SELECT genre FROM books WHERE book_id={$book_id})
                OR b.author_id IN
                (SELECT author_id FROM books WHERE book_id={$book_id}))
                AND b.book_id <> {$book_id}";

    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_showcase_books_info($filter, $value) {
    global $conn;

    $query = "SELECT b.book_id, b.author_id, b.title, b.price, CONCAT(a.first_name, ' ', a.last_name) AS author, b.cover_img, b.discount
                FROM books b INNER JOIN authors a
                ON b.author_id = a.author_id
                WHERE b.{$filter} = '{$value}'";
                
    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_discounted_books_info() {
    global $conn;

    $query = "SELECT b.book_id, b.author_id, b.title, b.price, CONCAT(a.first_name, ' ', a.last_name) AS author, b.cover_img, b.discount
                FROM books b INNER JOIN authors a
                ON b.author_id = a.author_id
                WHERE b.discount IS NOT NULL";

    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_books_search_info($search_query) {
    global $conn;

    $query = "SELECT b.book_id, b.author_id, b.title, b.price, CONCAT(a.first_name, ' ', a.last_name) AS author, b.cover_img, b.discount
                FROM books b INNER JOIN authors a
                ON b.author_id = a.author_id
                WHERE LOWER(b.title) LIKE '%{$search_query}%'
                OR LOWER(CONCAT(a.first_name, ' ', a.last_name)) LIKE '%{$search_query}%'";

    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}