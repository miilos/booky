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
    <title>Delete book | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(4);

        include "views/header.php";

        $book_id = $_GET['book_id'];
        $err = "";

        if(empty($book_id)) {
            $err .= "Unesite id knjige za brisanje!";
        }
        else {
            include "controllers/book_controller.php";

            try {
                $res = delete_book($book_id);
                if(!$res)
                    $err .= "Nijedna knjiga nije obrisana!";
            }
            catch(Exception $e) {
                $err .= $e->getMessage();
            }
        }

        if(!$err) {
            echo "
                <div class=\"admin-msg admin-msg--success\">
                    <p class=\"admin-msg__text\">Uspešno brisanje!</p>
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