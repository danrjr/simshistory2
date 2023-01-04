<?php

namespace app\dao;

use PDO;
use app\models\Historia;
use app\database\Connection;

class HistoriaDAO
{
    public function create(Historia $h){
        $stmt = Connection::getConn()->prepare("INSERT INTO historias(titulo, foto, corpo, categoria_id) VALUES (:t, :f, :c, :cid)");
        $stmt->bindValue(":t", $h->getTitulo());
        $stmt->bindValue(":f", $h->getFoto());
        $stmt->bindValue(":c", $h->getCorpo());
        $stmt->bindValue(":cid", $h->getCategoria_id());
        $stmt->execute();
        header("Location: ../historias/createhistory.php");
    }

    public function read(){
        $stmt = Connection::getConn()->query("SELECT * FROM historias");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update(Historia $h, $id){
        $stmt = Connection::getConn()->prepare("UPDATE historias SET titulo = :t, foto = :f, corpo = :c, categoria_id = :cid WHERE id = :id");
        $stmt->bindValue(":t", $h->getTitulo());
        $stmt->bindValue(":f", $h->getFoto());
        $stmt->bindValue(":c", $h->getCorpo());
        $stmt->bindValue(":cid", $h->getCategoria_id());
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        // header("Location: ../historias/historypainel.php");
    }

    public function getHistoryById($id){
        $stmt = Connection::getConn()->prepare("SELECT * FROM historias WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $dado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $dado;
        }
        else{
            return false;
        }
    }

    public function selectHistoryByCategory($id){
        $stmt = Connection::getConn()->prepare("SELECT historias.id, historias.titulo, historias.foto, historias.corpo FROM historias RIGHT JOIN categorias_secundarias ON historias.categoria_id = categorias_secundarias.id WHERE historias.categoria_id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getHistoryLimitBy6(){
        $stmt = Connection::getConn()->query("SELECT * FROM historias ORDER BY id DESC LIMIT 6");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findHistoryBySearchBar($q){
        $stmt = Connection::getConn()->prepare("SELECT * FROM historias WHERE titulo LIKE :q OR corpo LIKE :q ORDER BY titulo ASC LIMIT 10");
        $value = "%". $q . "%";
        $stmt->bindValue(":q", $value);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        else{
            header("Location: 404.php");
        }
    }
    public function delete($id){
        $stmt = Connection::getConn()->prepare("DELETE FROM historias WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        header("Location: ../historias/historypainel.php");
    }

}