<?php

namespace app\dao;

use PDO;
use app\database\Connection;
use app\models\CategoriaSecundaria;

class CategoriaSecundariaDAO
{
    public function create(CategoriaSecundaria $c){
        $stmt = Connection::getConn()->prepare("INSERT INTO categorias_secundarias (titulo, foto, categoria_id) VALUES (:t, :f, :cid)");
        $stmt->bindValue(":t", $c->getTitulo());
        $stmt->bindValue(":f", $c->getFoto());
        $stmt->bindValue(":cid", $c->getCategoria_id());
        $stmt->execute();
    }

    public function read(){
        $stmt = Connection::getConn()->query("SELECT * FROM categorias_secundarias");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}