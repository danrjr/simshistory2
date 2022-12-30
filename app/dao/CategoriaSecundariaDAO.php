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

    public function selectSecondaryCategoryByPrimaryCategory($id){
        $stmt = Connection::getConn()->prepare("SELECT categorias_secundarias.id, categorias_secundarias.titulo, categorias_secundarias.foto 
        FROM categorias_secundarias 
        RIGHT JOIN categorias_primarias 
        ON categorias_secundarias.categoria_id = categorias_primarias.id 
        WHERE categorias_secundarias.categoria_id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}