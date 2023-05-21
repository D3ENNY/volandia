<?php
    // Elimina la sessione dell'utente
    session_start();
    session_unset();
    session_destroy();
    $_SESSION = array();

    // Rimuove i cookie dell'utente
    setcookie(session_name(), '', time() - 3600, '/');
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, '', time() - 3600, '/');
    }

    // Reindirizza l'utente alla pagina di login
    ob_start();
    header("Location: ../../index.php");
    ob_end_flush();
    exit();
?>