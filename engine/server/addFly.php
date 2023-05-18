<?php
    include 'Autoloader.php';
    $flyManager = new FlyManager();

    $flyData = array(
        'number' => isset($_POST['number']) ? $_POST['number'] : "",
        'origin' => isset($_POST['origin']) ? ucfirst($_POST['origin']) : "",
        'destination' => isset($_POST['destination']) ? ucfirst($_POST['destination']) : "",
        'departureDate' => isset($_POST['departureDate']) ? $_POST['departureDate'] : "",
        'arrivalDate' => isset($_POST['arrivalDate']) ? $_POST['arrivalDate'] : "",
        'capacity' => isset($_POST['capacity']) ? $_POST['capacity'] : "",
        'codeIATA' => isset($_POST['codeIATA']) ? $_POST['codeIATA'] : "",
    );

    //aggiunge il volo
    $flyManager -> addFly($flyData);

    //genero i biglietti per questo volo
    $flyManager -> generateBoardingPass($flyData);

    //redirecta al menù dell'admin
    ob_start(); 
    header("Location: ../../pages/admin.php");
    ob_end_flush(); 

?>