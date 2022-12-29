<?php

namespace app\dao;

use PDO;
use app\database\Connection;

class CategoriaPrimariaDAO
{
    public function read(){
        $stmt = Connection::getConn()->query("SELECT * FROM categorias_primarias");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getCategoryById($id){

    }
}