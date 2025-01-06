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
    <title>O nama | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(2);

        include "views/header.php";
    ?>

    <div class="about-container">
        <div class="about">
            <h1 class="title title--dark">O nama</h1>
            <p class="about__text">
                Booky je internet knjižara osnovana 2025. godine, bazirana u Bačkoj Topoli. Nudimo širok izbor naslova svih žanrova, uz stalne popuste i druge akcije.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. A, asperiores sit? Quia, amet quidem minima nihil accusamus obcaecati fuga dolore ipsam porro dolorem facere laudantium fugiat cumque asperiores quod incidunt at, rem inventore perferendis quas! Magnam consectetur earum vero ullam dolor illo est corporis eos autem laborum, repellendus sequi obcaecati similique debitis fugit necessitatibus voluptatum error, rerum tempora placeat nesciunt nemo? Earum blanditiis, perspiciatis a fugiat atque porro fugit dolorem tenetur repellendus commodi cum ut illum dolor praesentium culpa consequatur! Temporibus tenetur voluptate repudiandae, neque eligendi fugit ad tempore sequi officia assumenda laboriosam harum alias? Cum totam veritatis hic atque!
            </p>
        </div>
    </div>

    <?php
        include "views/footer.php";
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>