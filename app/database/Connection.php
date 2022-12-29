<?php

namespace app\database;

use PDO;
use Exception;
use PDOException;

class Connection
{
    private static $instance; 

    public static function getConn(){
        if(!isset($instance)){
           try{
            self::$instance = new PDO('mysql:host=localhost;dbname=simshistory2', 'root', '');
           }
           catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
            exit();
        }
        catch(Exception $e){
            echo "Erro " . $e->getMessage();
            exit();
        }
        }
        return self::$instance;
    }
}