<?php

namespace app\dao;

use app\models\Admin;
use app\database\Connection;

class AdminDAO
{
    public function create(Admin $a){
        if(!$this->checkIfEmailExists($a->getEmail())){
            $stmt = Connection::getConn()->prepare("INSERT INTO admins(email, password) VALUES (:e, :p)");
            $stmt->bindValue(":e", $a->getEmail());
            $stmt->bindValue(":p", password_hash($a->getPassword(), PASSWORD_DEFAULT));
            $stmt->execute();
            header("Location: ../admin/adminarea.php");
            return true;
        }
        else{
            return false;
        }
    }
    public function read(){
        $stmt = Connection::getConn()->query("SELECT * FROM admins");
        $result = $stmt->fetchAll();
        return $result;
    }

    public function checkIfEmailExists($email){
        $stmt = Connection::getConn()->prepare("SELECT * FROM admins WHERE email = :e");
        $stmt->bindValue(":e", $email);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
    }

    public function verifyPassword($email, $password){
        $stmt = Connection::getConn()->prepare("SELECT * FROM admins WHERE email = :e");
        $stmt->bindValue(":e", $email);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $dado = $stmt->fetch();
            if(password_verify($password, $dado['password'])){
                session_start();
                $_SESSION['id'] = $dado['id'];
                header("Location: ../admin/adminarea.php");
                return true;
            }
            else{
                return false;
            }
        }
    }
}