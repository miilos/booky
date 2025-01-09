<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(isset($name) && isset($email) && isset($message)) {
        include "controllers/messages_controller.php";
        send_message($name, $email, $message);
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
    <title>Hvala! | Booky</title>
</head>
<body>
    <?php
        include "views/menu.php";
        return_menu(-1);

        include "views/header.php";

        $msg = "Hvala";

        if(!empty($_GET['src'])) {
            if($_GET['src'] == 'msg')
                $msg .= " na poruci";

            if($_GET['src'] == 'order')
                $msg .= " na porudžbini";
        }

        $msg .= "!";
    ?>

    <div class="container">
        <div class="text-container">
            <h1 class="thank_you-title"><?php echo $msg ?></h1>
        </div>
        <a href="index.php" class="btn btn--primary thank_you-btn">
            <span class="material-symbols-outlined">
                arrow_back_ios
            </span>
            Nazad na početnu stranu
        </a>
    </div>

    <script src="./js/toggleMenu.js"></script>
</body>
</html>