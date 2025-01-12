<?php
    include "controllers/book_controller.php";
    $books = get_all_books();
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
    ?>

    <div class="admin-container">
        <table class="books">
            <tr class="books__row">
                <th class="books__header">book_id</th>
                <th class="books__header">title</th>
                <th class="books__header">summary</th>
                <th class="books__header">price</th>
                <th class="books__header">author_id</th>
                <th class="books__header">discount</th>
                <th class="books__header">genre</th>
                <th class="books__header">publisher_id</th>
                <th class="books__header">num_pages</th>
                <th class="books__header">binding</th>
                <th class="books__header">pub_year</th>
                <th class="books__header">cover_img</th>
            </tr>
            <?php
                foreach($books as $book) {
                    $summary = substr($book['summary'], 0, 50) . '...';
                    
                    echo 
                    "
                    <tr class=\"books__row\">
                        <td class=\"books__data\">{$book['book_id']}</td>
                        <td class=\"books__data\">{$book['title']}</td>
                        <td class=\"books__data\">{$summary}</td>
                        <td class=\"books__data\">{$book['price']}</td>
                        <td class=\"books__data\">{$book['author_id']}</td>
                        <td class=\"books__data\">{$book['discount']}</td>
                        <td class=\"books__data\">{$book['genre']}</td>
                        <td class=\"books__data\">{$book['publisher_id']}</td>
                        <td class=\"books__data\">{$book['num_pages']}</td>
                        <td class=\"books__data\">{$book['binding']}</td>
                        <td class=\"books__data\">{$book['pub_year']}</td>
                        <td class=\"books__data\">{$book['cover_img']}</td>
                    </tr>
                    ";
                }
            ?>
        </table>

        <div class="forms">
            <form action="add_book.php" method="get" class="form-add">
                <input type="submit" value="Dodaj knjigu" class="form-btn">
            </form>
    
            <form action="update_book.php" method="get" class="form-update">
                <input type="number" name="book_id" placeholder="Id knjige" class="form-input" required>
                <input type="submit" value="Update knjige" class="form-btn">
            </form>
    
            <form action="delete_book.php" method="get" class="form-delete">
                <input type="number" name="book_id" placeholder="Id knjige" class="form-input" required>
                <input type="submit" value="Briši knjigu" class="form-btn">
            </form>
        </div>
    </div>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>