<?php
include "session.php";

$cart_num = 0;

if(isset($_SESSION['books']) && $_SESSION['books'] > 0)
    $cart_num = count($_SESSION['books']);

$display_num = ($cart_num > 0) ? "<span class=\"header__link__item-count\">{$cart_num}</span>" : "";

echo "
    <header class=\"header\">
        <div class=\"header__left\">
            <span class=\"material-symbols-outlined open-btn\">
                menu
            </span>

            <h1 class=\"logo logo--dark\">Booky</h1>
        </div>

        <a href=\"./cart.php\" class=\"header__link\">
            <span class=\"material-symbols-outlined\">
                shopping_cart
            </span>

            {$display_num}
        </a>
    </header>
";