<?php

function display_book_track($title, $books) {
    $track_html = "
        <section class=\"book__track\">
            <h1 class=\"title\">{$title}</h1>

            <div class=\"book__track-books\">
    ";

    if(count($books) === 0) {
        $track_html .= "<p class=\"book__track__err-message\">Nema rezultata :(</p>";
    }
    else {
        foreach($books as $book) {
            $track_html .= display_book_card($book);
        }
    }

    $track_html .= "
         </div>
        </section>
    ";

    echo $track_html;
}

function display_book_card($book) {
    $book_link = str_replace(' ', '_', strtolower($book['title']));
    $book_html = '';
    
    if($book['discount']) {
        $discounted_price = $book['price'] -  $book['price'] * ($book['discount'] / 100.0);

        $book_html = "
            <div class=\"book__card\">
                <img src=\"{$book['cover_img']}\" alt=\"{$book['title']}\" class=\"book__card__img\">
                
                <div class=\"book__card__text\">
                    <h1 class=\"book__card__text-title\">{$book['title']}</h1>
                    <h3 class=\"book__card__text-author\">{$book['author']}</h3>
                    <p class=\"book__card__text-price book__card__text-price--discounted\">{$book['price']}</p>
                    <p class=\"book__card__text-price\">{$discounted_price}</p>
                </div>

                <a href=\"./book.php?title={$book_link}\" class=\"btn btn--primary book__card__cta\">Vidi detalje</a>
            </div>
        ";
    }
    else {
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
    }

    return $book_html;
}