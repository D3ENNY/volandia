<?php
    class Config{
        public function __construct(){
            define('ABSPATH', $_SERVER["DOCUMENT_ROOT"] . '/progetti/volandia/');
            define('PAGES', ABSPATH . 'pages/');
            define('COMPONENTS', ABSPATH . 'assets/components/');
            define('ERROR', PAGES . 'error/');
        }
    }
?>