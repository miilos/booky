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
    <title>Cart | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(-1);

        include "views/header.php";

        var_dump($_SESSION['books']);

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $total = $_POST['total'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $zip = $_POST['zip'];

            $err = "";
            if(empty($first_name) ||
                empty($last_name) ||
                empty($address) ||
                empty($city) ||
                empty($zip)) {
                    $err .= "Morate uneti sve podatke!";
                }
            else {
                try {
                    include "controllers/orders_controller.php";

                    $res = place_order($total, $first_name, $last_name, $address, $city, $zip, $_SESSION['books']);
                }
                catch(Exception $e) {
                    $err .= $e->getMessage();
                }
            }

            if(!$err) {
                session_destroy();

                echo "
                    <div class=\"admin-msg admin-msg--success\">
                        <p class=\"admin-msg__text\">Uspešna porudžbina!</p>
                        <a href=\"index.php\" class=\"btn btn--primary btn--arrow\">
                            <span class=\"material-symbols-outlined\">
                                chevron_left
                            </span>
                            Nazad na početnu
                        </a>
                    </div>
                ";
            }
            else {
                echo "
                    <div class=\"admin-msg admin-msg--error\">
                        <p class=\"admin-msg__text\">{$err}</p>
                        <a href=\"cart.php\" class=\"btn btn--primary btn--arrow\">
                            <span class=\"material-symbols-outlined\">
                                chevron_left
                            </span>
                            Nazad
                        </a>
                    </div>
                ";
            }
        }
    ?>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>