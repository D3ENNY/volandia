<?php
    include 'Autoloader.php';
    $flyManager = new FlyManager();

    $flyData = array(
        'departure' => isset($_GET['departure']) ? ucfirst($_GET['departure']) : "",
        'destination' => isset($_GET['destination']) ? ucfirst($_GET['destination']) : "",
        'departureDate' => isset($_GET['departureDate']) ? date('Y-m-d', strtotime($_GET['departureDate'])) : "",
        'returnDate' => isset($_GET['returnDate']) && $_GET['returnDate'] != "" ? date('Y-m-d', strtotime($_GET['returnDate'])) : "one way"
    );
    //get query
    $query = $flyManager -> getQuery($flyData['returnDate']);

    //get avaible fly
    $avaibleFly = $flyManager -> getFly($query, $flyData);

    //redirect on fly.php
    $flyManager -> sendFly($avaibleFly, $flyData);

?>