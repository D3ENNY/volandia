<?php
        session_start();
        // Rimuovi eventuali inclusioni precedenti di Autoloader.ph
        foreach (get_included_files() as $filename) {
                if (strpos($filename, 'Autoloader.php') !== false) {
                        return;
                }
        }
        include '../engine/server/Autoloader.php';
        require_once('../engine/server/page_manager/fileSwapper.php');

        $template = new Template();
        if(isset($_SESSION['page'])){
                $template->template($_SESSION['page']);
                $_SESSION['page'] = null;
        }else{
                $template->template("addFly");
        }

?>