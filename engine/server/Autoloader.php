<?php
    class Autoloader{
        protected static $_extension  = '.php';
        protected static $_dir = __DIR__;
        protected static $fileIterator = null;

        public static function loader($className){
            $directory = new RecursiveDirectoryIterator(static::$_dir, RecursiveDirectoryIterator::SKIP_DOTS);

            if (is_null(static::$fileIterator)) 
                static::$fileIterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::LEAVES_ONLY);

            $filename = $className . static::$_extension ;

            foreach (static::$fileIterator as $file) 
                if (strtolower($file->getFilename()) === strtolower($filename)) {
                    if ($file->isReadable()) 
                        include_once $file->getPathname();
                    break;
                }
        }

        public static function set_extension ($_extension ){
            static::$_extension  = $_extension ;
        }

        public static function setPath($path){
            static::$_dir = $path;
        }

    }

    Autoloader::set_extension ('.php');
    spl_autoload_register('Autoloader::loader');

?>