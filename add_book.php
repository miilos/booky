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
    <title>Add book | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(4);

        include "views/header.php";

        include "controllers/authors_controller.php";
        $authors = get_all_authors();

        include "controllers/publishers_controller.php";
        $publishers = get_all_publishers();
    ?>

    <div class="admin-container">
        <form action="add_book_msg.php" method="post" class="admin-form">
            <h1 class="admin-form__title">Dodajte knjigu</h1>

            <input type="text" name="title" class="admin-form__input admin-form__input__title" placeholder="Naslov">
            <textarea name="summary" class="admin-form__textarea" placeholder="Opis"></textarea>
            <input type="number" name="price" class="admin-form__input admin-form__input__price" placeholder="Cena">
            <select name="author_id" class="admin-form__select admin-form__select__author">
                <option value="-">izaberite autora</option>
                <?php
                    foreach($authors as $author) {
                        $author_name = $author['first_name'] . ' ' . $author['last_name'];
                        echo "<option value=\"{$author['author_id']}\">{$author_name}</option>";
                    }
                ?>
            </select>
            <input type="text" name="genre" class="admin-form__input admin-form__input__genre" placeholder="Žanr"> 
            <select name="publisher_id" class="admin-form__select">
                <option value="-">izaberite izdavača</option>
                <?php
                    foreach($publishers as $pub) {
                        echo "<option value=\"{$pub['pub_id']}\">{$pub['name']}</option>";
                    }
                ?>
            </select>
            <input type="number" name="num_pages" class="admin-form__input" placeholder="Broj strana">
            <select name="binding" class="admin-form__select">
                <option value="-">povez</option>
                <option value="mek">mek</option>
                <option value="tvrd">tvrd</option>
            </select>
            <input type="number" name="pub_year" class="admin-form__input" placeholder="Godina izdavanja">
            <input type="text" name="cover_img" class="admin-form__input" placeholder="Slika">
            <input type="submit" value="Dodaj" class="form-btn admin-form__btn">
        </form>
    </div>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>