<?php

include "models/book_model.php";
include "views/book_track.php";

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