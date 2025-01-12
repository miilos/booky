<?php

include "models/orders_model.php";

function place_order($total, $first_name, $last_name, $address, $city, $zip, $books) {
    $status = create_order($total, $first_name, $last_name, $address, $city, $zip, $books);
    return $status;
}