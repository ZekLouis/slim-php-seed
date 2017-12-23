<?php

namespace App\Databases;

class Database
{
    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function query($sql){
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req;
    }
    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }
}