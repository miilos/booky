<?php

function return_menu($active_link) {
    $menu_items = array(
        array('./index.php', 'Home'),
        array('./search.php', 'Pretraga'),
        array('./about.php', 'O nama'),
        array('./contact.php', 'Kontaktirajte nas')
    );
    $menu_html = '
    <div class="menu">
        <span class="material-symbols-outlined close-btn">
            close
        </span>

        <ul class="menu__list">';  

    $i = 0;
    foreach($menu_items as $item) {
        if($i === $active_link) {
            $menu_html .= "<li class=\"menu__list-item menu__list-item--active\">
                                <a href=\"{$item[0]}\" class=\"menu__list-item__link\">{$item[1]}</a>
                                <span class=\"menu__list-item__background\"></span>
                            </li>";
        }
        else {
            $menu_html .= "<li class=\"menu__list-item\">
                                <a href=\"{$item[0]}\" class=\"menu__list-item__link\">{$item[1]}</a>
                                <span class=\"menu__list-item__background\"></span>
                            </li>";
        }

        $i++;
    }

    $menu_html .= '</ul></div>';

    echo $menu_html;
}