<?php
    class Template{

        public function template($page){
            define('ABSPATH', $_SERVER["DOCUMENT_ROOT"] . '/progetti/volandia/');
            define('PAGES', ABSPATH . 'pages/');
            define('COMPONENTS', ABSPATH . 'assets/components/');
            define('ERROR', PAGES . 'error/');

            try{
                $extension = '.php';
                $default = "index";
                $error404 = ERROR . '404' . $extension; 
                $components = COMPONENTS . 'admin/';
                $request_page = isset($page) ? $page : $default;
                $included_page = PAGES . $request_page . $extension;

                $output = [];

                if(file_exists($included_page)){
                    $output = [
                        require_once($components . 'head.php'),
                        require_once($components . 'header.php'),
                        require_once($components . 'aside.php'),
                        require_once($included_page),
                        require_once($components . 'footer.php')
                    ];
                }else{
                    $output = [
                        require_once($error404)
                    ];

                    if($page == 'default'){
                        $output = [
                            require_once($components . 'head.php'),
                            require_once($components . 'header.php'),
                            require_once($components . 'aside.php'),
                            require_once($components . 'footer.php')
                        ];
                    }
                }

            }catch(Exception $e){
                var_dump($e);
                echo "error";
            }

            return $output;
        }
    }
?>