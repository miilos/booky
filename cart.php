<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Milos Popovic">
    <meta name="description" content="Home of the best bookstore on the web">
    <meta name="robots" content="index,follow">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>Cart | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(-1);

        include "views/header.php";

        $books = [];
        $order_total = 0;

        if($_SERVER['REQUEST_METHOD'] === "POST")
            session_destroy();
        else {
            include "controllers/book_controller.php";

            foreach($_SESSION['books'] as $cart_book) {
                $book = get_book_by_id($cart_book);
                array_push($books, $book);
            }
        }
    ?>

    <div class="cart-container">
        <div class="cart">
            <h1 class="title">Vaša korpa</h1>

            <div class="cart-items">
                <?php
                    if(!$books) {
                        echo "<p class=\"empty-cart__msg\">Vaša korpa je prazna</p>";
                    }
                    else {
                        foreach($books as $book) {
                            $discounted_price = null;

                            if($book['discount']) {
                                $discounted_price = round($book['price'] -  $book['price'] * ($book['discount'] / 100.0), 2);
                                $order_total += $discounted_price;

                                echo
                                "
                                    <div class=\"cart-item\">
                                        <img src=\"{$book['cover_img']}\" alt=\"{$book['title']}\" class=\"cart-item__img\">

                                        <div class=\"cart-item__text\">
                                            <h2 class=\"cart-item__text__title\">{$book['title']}</h2>
                                            <p class=\"cart-item__text__author\">{$book['author']}</p>
                                        </div>

                                        <div class=\"cart-item__price-container\">
                                            <h2 class=\"cart-item__price cart-item__price--discounted\">{$book['price']}</h2>
                                            <h2 class=\"cart-item__price\">{$discounted_price}</h2>
                                        </div>
                                    </div>      
                                ";
                            }
                            else {
                                $order_total += $book['price'];

                                echo
                                "
                                    <div class=\"cart-item\">
                                        <img src=\"{$book['cover_img']}\" alt=\"{$book['title']}\" class=\"cart-item__img\">

                                        <div class=\"cart-item__text\">
                                            <h2 class=\"cart-item__text__title\">{$book['title']}</h2>
                                            <p class=\"cart-item__text__author\">{$book['author']}</p>
                                        </div>

                                        <h2 class=\"cart-item__price\">{$book['price']}</h2>
                                    </div>      
                                ";
                            }
                        }

                        echo
                        "
                            <div class=\"cart-items__total\">
                                <p class=\"cart-items__total__p\">Ukupno: </p>
                                <h2 class=\"cart-items__total__price\">{$order_total}</h2>
                            </div>

                            <form action=\"cart.php\" method=\"post\" class=\"cart-items__clear\">
                                <button type=\"submit\" class=\"btn btn--primary btn--arrow form-btn\">
                                    <span class=\"material-symbols-outlined\">
                                        delete
                                    </span>
                                    Isprazni korpu
                                </button>
                            </form>
                        ";
                    }
                ?>
            </div>
        </div>

        <form action="place_order.php" method="post" class="admin-form order-data-form">
            <h1 class="admin-form__title">Lični podaci</h1>

            <input type="hidden" name="total" value="<?php echo $order_total ?>">
            <input type="text" name="first_name" class="admin-form__input" placeholder="Ime">
            <input type="text" name="last_name" class="admin-form__input" placeholder="Prezime">
            <input type="text" name="address" class="admin-form__input" placeholder="Adresa"> 
            <input type="text" name="city" class="admin-form__input" placeholder="Mesto">
            <input type="number" name="zip" class="admin-form__input" placeholder="Poštanski broj">
            <input type="submit" value="Naruči" class="form-btn admin-form__btn">
        </form>
    </div>

    <?php
        include "views/footer.php";
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>