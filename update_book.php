<?php
    $id = $_GET['book_id'];
    
    if(empty($id)) {
        header("Location: update_msg.php");
        exit();
    }

    include "controllers/book_controller.php";
    $book = get_book_by_id($id);

    if(empty($book)) {
        header("Location: update_msg.php");
        exit();
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
    <title>Update book | Booky</title>
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
        <form action="update_msg.php" method="post" class="admin-form">
            <h1 class="admin-form__title">Ažurirajte knjigu</h1>

            <?php
                if(!empty($err))
                    echo "<p class=\"admin-form__err\">{$err}</p>";

                if(isset($res) && $res)
                    echo "<p class=\"admin-form__success\">Uspešne izmene!</p>";
            ?>

            <input type="hidden" name="book_id" value="<?php echo $book['book_id'] ?>">
            <input type="text" name="title" class="admin-form__input admin-form__input__title" placeholder="Naslov" value="<?php echo $book['title'] ?>">
            <textarea name="summary" class="admin-form__textarea" placeholder="Opis"><?php echo $book['summary'] ?></textarea>
            <input type="number" name="price" class="admin-form__input admin-form__input__price" placeholder="Cena" value="<?php echo $book['price'] ?>">
            <select name="author_id" class="admin-form__select admin-form__select__author">
                <option value="-">izaberite autora</option>
                <?php
                    foreach($authors as $author) {
                        $author_name = $author['first_name'] . ' ' . $author['last_name'];
                        $selected = $author['author_id'] === $book['author_id'] ? "selected" : "";

                        echo "<option value=\"{$author['author_id']}\" {$selected}>{$author_name}</option>";
                    }
                ?>
            </select>
            <input type="text" name="genre" class="admin-form__input admin-form__input__genre" placeholder="Žanr" value="<?php echo $book['genre'] ?>"> 
            <select name="publisher_id" class="admin-form__select">
                <option value="-">izaberite izdavača</option>
                <?php
                    foreach($publishers as $pub) {
                        $selected = $pub['pub_id'] === $book['publisher_id'] ? "selected" : "";
                        echo "<option value=\"{$pub['pub_id']}\" {$selected}>{$pub['name']}</option>";
                    }
                ?>
            </select>
            <input type="number" name="num_pages" class="admin-form__input" placeholder="Broj strana" value="<?php echo $book['num_pages'] ?>">
            <select name="binding" class="admin-form__select">
                <option value="-">povez</option>
                <option value="mek" <?php echo $book['binding'] === "mek" ? "selected" : ""; ?>>mek</option>
                <option value="tvrd" <?php echo $book['binding'] === "tvrd" ? "selected" : ""; ?>>tvrd</option>
            </select>
            <input type="number" name="pub_year" class="admin-form__input" placeholder="Godina izdavanja" value="<?php echo $book['pub_year'] ?>">
            <input type="text" name="cover_img" class="admin-form__input" placeholder="Slika" value="<?php echo $book['cover_img'] ?>">
            <input type="number" name="discount" class="admin-form__input" placeholder="Popust" value="<?php echo $book['discount'] ?>">
            <input type="submit" value="Ažuriraj" class="form-btn admin-form__btn">
        </form>
    </div>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>