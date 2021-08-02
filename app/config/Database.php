<?php

namespace App\Config;

use PDO;

class Database
{

    public $conection;
    private $host = 'localhost';
    private $dbname = 'ist';
    private $user = 'pedrohosoares';
    private $password = '46302113';

    public function __construct()
    {
        $this->conection  = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
    }

    public function __destruct()
    {
        $this->conection = null;
    }

    public function getCx(){
        return $this->conection;
    }

    public function select(string $tableName, string $fields, string $limit, string $offset,string $where = null)
    {

        try {
            $query = "SELECT {$fields} FROM {$tableName} ";
            if(!empty($where)):
                $query .= " WHERE {$where}";
            endif;
            $query .= " LIMIT {$limit},{$offset}";
            $statement = $this->conection->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {

            echo "<h1>{$fields} or {$tableName} não existem</h1>";
        }
    }

    public function delete(string $tableName, string $field, string $value)
    {

        try {

            $statement = $this->conection->prepare("DELETE FROM {$tableName} WHERE {$field} = {$value}");
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {

            echo "<h1>{$field},{$value} or {$tableName} não existem</h1>";
        }
    }

    public function update(string $tableName, array $field)
    {

        try {

            $query = '';
            $where = "";
            foreach($field as $key=>$value){
                if($key !== 'id'):
                    $query .= $key."='".$value."',";
                else:
                    $where = " {$key}='".$value."'";
                endif;
            }
            $query = substr($query,0,-1);
            $statement = $this->conection->prepare("UPDATE {$tableName} SET {$query} WHERE {$where}");
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {

            echo "<h1>{$fields} or {$tableName} não existem</h1>";
        }
    }

    public function inserir(string $tableName, array $fields)
    {

        try {
            $values = "'".implode("','",array_values($fields))."'";
            $fields = implode(",",array_keys($fields));
            $statement = $this->conection->prepare("INSERT INTO {$tableName} (".$fields.") VALUES (".$values.")");
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {

            echo "<h1>{$fields} or {$tableName} não existem</h1>";
        }
    }
}
