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
    <title>Dobrodošli | Booky</title>
</head>
<body>
    <?php
        include "./views/menu.php";
        return_menu(0);

        include "./views/header.php";
    ?>

    <section class="banner">
        <div class="banner__text">
            <h1 class="banner__text-title">
                Sjajni popusti na odabrane naslove!
            </h1>
            
            <p class="banner__text-p">
                Ostvarite popuste od <span class="highlight">20 do 50%!</span>
            </p>

            <a href="#" class="btn btn--primary banner__text-btn">Pogledaj popuste</a>
        </div>

        <div class="banner__books">
            <div class="banner__books-container">
                <div class="book book--1"></div>
                <div class="book book--2"></div>
                <div class="book book--3"></div>
            </div>
        </div>
    </section>

    

    <?php
        include "controllers/book_controller.php";

        get_editors_choice();
        get_best_sellers();
    ?>

    <section class="genres">
        <h1 class="title">Otkrijte nove žanrove</h1>

        <div class="genres__container">
            <div class="genres__container__genre genres__container__genre--fantasy">
                <h1 class="title">Epska fantastika</h1>
                <a href="#" class="genres__container__genre-link btn btn--primary">
                    Vidi
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                </a>
            </div>
            <div class="genres__container__genre genres__container__genre--classics">
                <h1 class="title">Klasici</h1>
                <a href="#" class="genres__container__genre-link btn btn--primary">
                    Vidi
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                </a>
            </div>
            <div class="genres__container__genre genres__container__genre--philosophy">
                <h1 class="title">Filozofija</h1>
                <a href="#" class="genres__container__genre-link btn btn--primary">
                    Vidi
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                </a>
            </div>
            <div class="genres__container__genre genres__container__genre--drama">
                <h1 class="title">Drame</h1>
                <a href="#" class="genres__container__genre-link btn btn--primary">
                    Vidi
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                </a>
            </div>
        </div>
    </section>

    <?php
        include "views/footer.php";
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>