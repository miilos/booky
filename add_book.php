<?php
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $title = $_POST['title'];
        $summary = $_POST['summary'];
        $price = $_POST['price'];
        $author_id = $_POST['author_id'];
        $genre = $_POST['genre'];
        $publisher_id = $_POST['publisher_id'];
        $num_pages = $_POST['num_pages'];
        $binding = $_POST['binding'];
        $pub_year = $_POST['pub_year'];
        $cover_img = $_POST['cover_img'];

        $err = "";

        if(empty($title) ||
            empty($summary) ||
            empty($price) ||
            $author_id === "-" ||
            empty($genre) ||
            $publisher_id === "-" ||
            empty($num_pages) ||
            $binding === "-" ||
            empty($pub_year) ||
            empty($cover_img)) {
             $err .= "Morate uneti sva polja!";   
            }
        else {
            include "controllers/book_controller.php";

            $price = (double)$price;
            $author_id = (int)$author_id;
            $publisher_id = (int)$publisher_id;
            $num_pages = (int)$num_pages;
            $pub_year = (int)$pub_year;
            echo $release_year;

            $res = add_book($title, $summary, $price, $author_id, $genre, $publisher_id, $num_pages, $binding, $pub_year, $cover_img);
        }
    }
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
    <title>Admin | Booky</title>
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
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="add-form">
            <h1 class="add-form__title">Dodajte knjigu</h1>

            <?php
                if(!empty($err))
                    echo "<p class=\"add-form__err\">{$err}</p>";

                if(isset($res) && $res)
                    echo "<p class=\"add-form__success\">Uspešan upis!</p>";
            ?>

            <input type="text" name="title" class="add-form__input add-form__input__title" placeholder="Naslov">
            <textarea name="summary" class="add-form__textarea" placeholder="Opis"></textarea>
            <input type="number" name="price" class="add-form__input add-form__input__price" placeholder="Cena">
            <select name="author_id" class="add-form__select add-form__select__author">
                <option value="-">izaberite autora</option>
                <?php
                    foreach($authors as $author) {
                        $author_name = $author['first_name'] . ' ' . $author['last_name'];
                        echo "<option value=\"{$author['author_id']}\">{$author_name}";
                    }
                    ?>
            </select>
            <input type="text" name="genre" class="add-form__input add-form__input__genre" placeholder="Žanr"> 
            <select name="publisher_id" class="add-form__select">
                <option value="-">izaberite izdavača</option>
                <?php
                    foreach($publishers as $pub) {
                        echo "<option value=\"{$pub['pub_id']}\">{$pub['name']}";
                    }
                    ?>
            </select>
            <input type="number" name="num_pages" class="add-form__input" placeholder="Broj strana">
            <select name="binding" class="add-form__select">
                <option value="-">povez</option>
                <option value="mek">mek</option>
                <option value="tvrd">tvrd</option>
            </select>
            <input type="number" name="pub_year" class="add-form__input" placeholder="Godina izdavanja">
            <input type="text" name="cover_img" class="add-form__input" placeholder="Slika">
            <input type="submit" value="Dodaj" class="form-btn add-form__btn">
        </form>
    </div>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>