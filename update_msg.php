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

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $book_id = $_POST['book_id'];
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
            $discount = $_POST['discount'];
    
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

                if($discount == 0)
                    $discount = null;
    
                try {
                    $res = update_book($book_id, $title, $summary, $price, $author_id, $genre, $publisher_id, $num_pages, $binding, $pub_year, $cover_img, $discount);
                }
                catch(Exception $e) {
                    $err .= $e->getMessage();
                }
            }

            if(!$err) {
                echo "
                    <div class=\"admin-msg admin-msg--success\">
                        <p class=\"admin-msg__text\">Uspešno ažuriranje!</p>
                        <a href=\"admin.php\" class=\"btn btn--primary btn--arrow\">
                            <span class=\"material-symbols-outlined\">
                                chevron_left
                            </span>
                            Nazad na admin
                        </a>
                    </div>
                ";
            }
            else {
                echo "
                    <div class=\"admin-msg admin-msg--error\">
                        <p class=\"admin-msg__text\">{$err}</p>
                        <a href=\"update_book.php?book_id={$book_id}\" class=\"btn btn--primary btn--arrow\">
                            <span class=\"material-symbols-outlined\">
                                chevron_left
                            </span>
                            Nazad
                        </a>
                    </div>
                ";
            }
        }
        else {
            echo "
                <div class=\"admin-msg admin-msg--error\">
                    <p class=\"admin-msg__text\">Nepostojeći id knjige!</p>
                    <a href=\"admin.php\" class=\"btn btn--primary btn--arrow\">
                        <span class=\"material-symbols-outlined\">
                            chevron_left
                        </span>
                        Nazad
                    </a>
                </div>
            ";
        }
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>