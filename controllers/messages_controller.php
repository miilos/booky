<?php

include "models/message_model.php";

function send_message($name, $email, $message) {
    create_message($name, $email, $message);
}