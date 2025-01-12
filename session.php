<?php

session_start();

if(!isset($_SESSION['books']))
    $_SESSION['books'] = [];