<?php

include "db.php";

function create_order($total, $first_name, $last_name, $address, $city, $zip, $books) {
    global $conn;

    $flag = true; /* true -> sve ok | false -> greska pri upisu */ 

    $create_order_query = "INSERT INTO orders(first_name, last_name, address, city, zip, total)
                            VALUES ('$first_name', '$last_name', '$address', '$city', '$zip', '$total')";

    mysqli_query($conn, $create_order_query);

    $order_id = mysqli_insert_id($conn);

    if($order_id) {
        foreach($books as $book_id) {
            $add_book_query = "INSERT INTO books_orders(book_id, order_id)
                                VALUES ('$book_id', '$order_id')";

            mysqli_query($conn, $add_book_query);

            if(mysqli_affected_rows($conn) === 0)
                $flag = false;
        }
    }
    else
        $flag = false;

    return $flag;
}