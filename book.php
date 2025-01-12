<?php
    include "controllers/book_controller.php";

    $title = $_GET['title'];
    $book = get_book($title);
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
    <title><?php echo $book['title'] ?> | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(-1);

        include "views/header.php";

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            array_push($_SESSION['books'], $_POST['book_id']);
        }
    ?>

    <div class="book-details">
        <img src="<?php echo $book['cover_img']; ?>" alt="<?php echo $book['title'] ?>" class="book-details__img">

        <div class="book-details__main-info">
            <h1 class="title"><?php echo $book['title']; ?></h1>

            <?php $author_link = "./showcase.php?filter=author_id&value={$book['author_id']}"; ?>
            <a href=<?php echo $author_link; ?> class="book-details__main-info__author"><?php echo $book['author']; ?></a>

            <p class="book-details__main-info__publisher"><?php echo $book['publisher']; ?></p>

            <?php
                $link_genre = str_replace(' ', '+', $book['genre']);
                $genre_link = "./showcase.php?filter=genre&value={$link_genre}";
            ?>
            <a href=<?php echo $genre_link; ?> class="book-details__main-info__genre"><?php echo $book['genre']; ?></a>

            <p class="book-details__main-info__summary"><?php echo $book['summary']; ?></p>
        </div>

        <div class="book-details__order">
            <table class="book-details__order__book-info">
                <tr>
                    <td class="td-margin">Broj strana: </td>
                    <td><?php echo $book['num_pages']; ?></td>
                </tr>
                <tr>
                    <td class="td-margin">Povez: </td>
                    <td><?php echo $book['binding']; ?></td>
                </tr>
                <tr>
                    <td class="td-margin">Godina izdanja: </td>
                    <td><?php echo $book['pub_year'] . "."; ?></td>
                </tr>
            </table>

            <div class="book-details__order__buy-section">
                <div class="book-details__order__buy-section__price">
                    
                    <?php 
                        if($book['discount']) {
                            $discounted_price = round($book['price'] -  $book['price'] * ($book['discount'] / 100.0), 2);

                            echo "
                            <h1 class=\"book-details__order__buy-section__price-text book-details__order__buy-section__price-text--discounted\">
                                {$book['price']}
                            </h1>

                            <h1 class=\"book-details__order__buy-section__price-text\">
                                {$discounted_price}
                            </h1>

                            <p class=\"book-details__order__buy-section__price-discount\">-{$book['discount']}%</p>
                            ";
                        }
                        else {
                            echo "
                            <h1 class=\"book-details__order__buy-section__price-text\">
                                {$book['price']}
                            </h1>
                            ";
                        }
                    ?>

                </div>

                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="book-details__order__buy-section__form">
                    <input type="hidden" value="<?php echo $book['book_id'] ?>" name="book_id">

                    <button type="submit" class="book-details__order__buy-section__form-btn">Dodaj u korpu</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        get_similar_books($book['book_id']);

        include "views/footer.php";
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>