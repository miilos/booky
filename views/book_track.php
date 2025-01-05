<?php

function display_book_track($title, $books) {
    $track_html = "
        <section class=\"book__track\">
            <h1 class=\"title\">{$title}</h1>

            <div class=\"book__track-books\">
    ";

    foreach($books as $book) {
        $track_html .= display_book_card($book);
    }

    $track_html .= "
         </div>
        </section>
    ";

    echo $track_html;
}

function display_book_card($book) {
    $book_link = str_replace(' ', '_', strtolower($book['title']));

    $book_html = "
        <div class=\"book__card\">
            <img src=\"{$book['cover_img']}\" alt=\"{$book['title']}\" class=\"book__card__img\">
            
            <div class=\"book__card__text\">
                <h1 class=\"book__card__text-title\">{$book['title']}</h1>
                <h3 class=\"book__card__text-author\">{$book['author']}</h3>
                <p class=\"book__card__text-price\">{$book['price']}</p>
            </div>

            <a href=\"./book.php?title={$book_link}\" class=\"btn btn--primary book__card__cta\">Vidi detalje</a>
        </div>
    ";

    return $book_html;
}