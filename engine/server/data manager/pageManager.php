<?php  
    // Rimuovi eventuali inclusioni precedenti di Autoloader.php
    foreach (get_included_files() as $filename) {
        if (strpos($filename, 'Autoloader.php') !== false) {
            return;
        }
    }
    include '../Autoloader.php';

    class PageManager{

        public function getPage($get){
            return array_keys($get)[0];
        }

        public function sendPage($page){
            setcookie('page', $page, time()+3600, '/');
            header("Location: ../../../pages/admin.php");
        }
    }
?>