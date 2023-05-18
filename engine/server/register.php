<?php
    include 'Autoloader.php';
    $userManager = new UserManager();

    $userData = array(
        'username' => isset($_POST['username']) ? $_POST['username'] : "",
        'email' => isset($_POST['email']) ? $_POST['email'] : "",
        'pw' => isset($_POST['password']) ? $_POST['password'] : ""
    );
    
    //sarch user
    $user = $userManager -> searchUser($userData['email'])[0];

    //register
    $userManager -> registerUser($user, $userData);
    
    //autologin
    $user = $userManager -> searchUser($userData['email'])[0];
    $userManager -> loginUser($user, $userData['pw']);




    //TODO: inserimento dati utente

        /*$userData = array(
        'name' => isset($_POST['name']) ? $_POST['name'] : "",
        'surname' => isset($_POST['surname']) ? $_POST['surname'] : "",
        'date' => isset($_POST['date']) ? date('Y-m-d', strtotime($_POST['date'])) : "",
        'nationality' => isset($_POST['nationality']) ? $_POST['nationality'] : "",
        'routeType' => isset($_POST['route_type']) ? $_POST['route_type'] : "",
        'route' => isset($_POST['route']) ? $_POST['route'] : "",
        'city' => isset($_POST['city']) ? $_POST['city'] : "",
        'number' => isset($_POST['number']) ? $_POST['number'] : "",
        'fc' => isset($_POST['fc']) ? $_POST['fc'] : "",
        'email' => isset($_POST['email']) ? $_POST['email'] : "",
        'pw' => isset($_POST['password']) ? $_POST['password'] : "" */

?>                  