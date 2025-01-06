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
    <title>Pretraga | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(1);

        include "views/header.php";
    ?>

    <div class="search-container">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get" class="search">
            <input type="text" name="query" class="search__input" placeholder="Pretražite naslove..." >
            <input type="submit" name="search" value="Search" class="search__btn">
        </form>

        <?php
            include "controllers/book_controller.php";

            $query = $_GET['query'] ?? null;

            if($query) {
                get_books_search($query);
            }
        ?>
    </div>

    <?php
        include "views/footer.php";
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>