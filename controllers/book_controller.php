<?php

include "models/book_model.php";
include "views/book_track.php";

function get_all_books() {
    global $conn;

    $query = "SELECT * FROM books";

    $res = mysqli_query($conn, $query);

    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_editors_choice() {
    $editors_choice = array(
        "Ime vetra",
        "Strah mudroga",
        "Put kraljeva",
        "Jedna Svanova ljubav",
        "Normalni ljudi"
    );

    $books = array();

    foreach($editors_choice as $curr_title) {
        $book = get_book_by_title($curr_title);

        if($book)
            array_push($books, $book);
    }

    display_book_track("Editor's choice", $books);
}

function get_best_sellers() {
    $best_sellers = array(
        "Zenica sveta",
        "Veliki lov",
        "Ponovorođeni zmaj",
        "Priča o dva grada",
        "Crveno i crno",
    );

    $books = array();

    foreach($best_sellers as $curr_title) {
        $book = get_book_by_title($curr_title);

        if($book)
            array_push($books, $book);
    }

    display_book_track("Best sellers", $books);
}

function get_book() {
    $url_title = $_GET['title'];
    $title = ucfirst(str_replace('_', ' ', $url_title));

    $book = get_full_book_info_from_title($title);
    
    return $book;
}

function get_similar_books($book_id) {
    $similar_books = get_similar_books_info($book_id);
    display_book_track("Slični naslovi", $similar_books);
}

function get_showcase_books($filter, $value) {
    $books = get_showcase_books_info($filter, $value);
    $title = 'Nema podataka';

    if($books) {
        if($filter === 'author_id')
            $title = $books[0]['author'];
        
        if($filter === 'genre')
            $title = $value;
    }

    display_book_track($title, $books);
}

function get_discounted_books() {
    $books = get_discounted_books_info();
    display_book_track('Naslovi na popustu', $books);
}

function get_books_search($query) {
    $books = get_books_search_info($query);
    display_book_track('Rezultat pretrage', $books);
}

function add_book($title, $summary, $price, $author_id, $genre, $publisher_id, $num_pages, $binding, $pub_year, $cover_img) {
    $status = create_book($title, $summary, $price, $author_id, $genre, $publisher_id, $num_pages, $binding, $pub_year, $cover_img);
    return $status;
}