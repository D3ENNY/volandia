<?php
    include 'Autoloader.php';
    $adminHomeManager = new AdminHomeManager();

    $res=$adminHomeManager -> getFlyCompanyNumber();
    // Converte il risultato in JSON e lo restituisce
    header("Content-Type: application/json");
    echo json_encode($res);
?>