<?php
    include "controllers/book_controller.php";

    $filter = $_GET['filter'] ?? null;
    $value = $_GET['value'] ?? null;
    $discounted = $_GET['discount'] ?? null;
?>

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
    <title><?php echo $value ?> | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(-1);

        include "views/header.php";
    ?>

    <div class="showcase__container">
        <?php
            if(($filter && $value) && ($filter === 'author_id' || $filter === 'genre'))
                get_showcase_books($filter, $value);
            else if($discounted === 'show')
                get_discounted_books();
        ?>
    </div>

    <?php
        include "views/footer.php";
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>