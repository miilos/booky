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

        include "controllers/book_controller.php";
        $books = [];

        foreach($_SESSION['books'] as $cart_book) {
            $book = get_book_by_id($cart_book);
            array_push($books, $book);
        }
    ?>

    <div class="cart-container">
        <div class="cart">
            <h1 class="title">Vaša korpa</h1>

            <div class="cart-items">
                <?php
                    foreach($books as $book) {
                        $discounted_price = null;

                        if($book['discount']) {
                            $discounted_price = $book['price'] -  $book['price'] * ($book['discount'] / 100.0);

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
                ?>
            </div>
        </div>
    </div>

    <?php
        include "views/footer.php";
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>