<?php

include "models/publishers_model.php";

function get_all_publishers() {
    $publishers = get_all_publishers_info();
    return $publishers;
}