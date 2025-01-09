<?php

include "models/authors_model.php";

function get_all_authors() {
    $authors = get_all_authors_info();
    return $authors;
}