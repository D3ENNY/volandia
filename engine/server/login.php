<?php
    include 'Autoloader.php';
    $userManager = new UserManager();

    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $pw = isset($_POST['password']) ? $_POST['password'] : "";
    $table = strpos($email, "@roadtrip.it") ? 'PERSONALE' : 'USERS';
    
    //sarch user
    $data = $userManager -> searchUser($email, $table);

    //login
    $userManager -> loginUser($data[0], $pw, $data[1]);
?>