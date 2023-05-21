<?php
    include 'Autoloader.php';
    $pageManager = new PageManager();

    $page = isset($_GET) ? $_GET : '404';

    $page = $pageManager -> getPage($page);
    $pageManager -> sendPage($page);
?>