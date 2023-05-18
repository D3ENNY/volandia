<?php
    class Template{

        public function template($page){
            echo("<br>entering into Template.template()<br>");
  
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
                        require_once($components . 'head.php');
                        require_once($components . 'header.php');
                        require_once($components . 'aside.php');
                        require_once($included_page);
                        require_once($components . 'footer.php');
                    ];
                }else{
                    require_once($error404);
                }

            }catch(Exception $e){
                var_dump($e);
                echo "error";
            }

            return $output;
        }
    }
?>