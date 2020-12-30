<?php 
    

    class Conexion{

        private static $link;

        private function __construct(){} //se hace el constructor privado para impedir que instancien esta clase

        static function conectar(){
            if(!isset(self::$link)){
                self::$link = new PDO('mysql:host=localhost;dbname=agencia', 'root','');
            }
            self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return self::$link;
        }

        
    }




?>
