<?php
        // Rimuovi eventuali inclusioni precedenti di Autoloader.ph
        foreach (get_included_files() as $filename) {
                if (strpos($filename, 'Autoloader.php') !== false) {
                        return;
                }
        }
        include '../engine/server/Autoloader.php';
        require_once('../engine/server/page_manager/fileSwapper.php');

        $template = new Template();
        if(isset($_COOKIE['page'])){
                $template->template($_COOKIE['page']);
                setcookie('page', '', time() - 3600, '/');
        }else{
                $template->template("default");
        }
        
?>