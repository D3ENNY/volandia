<?php
    include 'Autoloader.php';
    $adminHomeManager = new AdminHomeManager();

    $res = $adminHomeManager -> getFlyCompanyNumber();
    $json = $adminHomeManager -> formatJson("flyCompanyNumber", $res);

    $res = $adminHomeManager -> getModaDepartureHour();
    $json = $adminHomeManager -> formatJson("departureHourModa", $res, $json);

    $res = $adminHomeManager -> getModaArrivalHour();
    $json = $adminHomeManager ->formatJson("arrivalHourModa", $res, $json);
    // Converte il risultato in JSON e lo restituisce
    header("Content-Type: application/json");
    echo json_encode($json);
?>