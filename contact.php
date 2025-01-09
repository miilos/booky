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
    <title>Kontakt | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(3);

        include "views/header.php";
    ?>

    <div class="contact-container">
        <h1 class="title title--dark">Kontaktirajte nas!</h1>
        <form action="thank_you_page.php?src=msg" method="post" class="contact">
            <input type="text" name="name" id="name" placeholder="Ime">
            <input type="text" name="email" id="email" placeholder="E-mail">
            <textarea rows="10" name="message" id="message" placeholder="Poruka"></textarea>
            <input type="submit" value="Pošalji" class="contact__send-btn btn btn--primary">
        </form>
    </div>

    <?php
        include "views/footer.php";
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>