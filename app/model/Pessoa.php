<?php

namespace App\Model;

use App\Config\Database;

class Pessoa{


    public $cx;
    public $table = 'pessoas';

    public function __construct(){

        $this->cx = new Database;
        
    }

    public function select($where = null){

        return $this->cx->select($this->table,'*',0,10,$where);
        
    }


    public function cadastrar($fields){

        return $this->cx->inserir($this->table,$fields);

    }

    public function update($fields){

        return $this->cx->update($this->table,$fields);

    }

    public function delete($id){

        return $this->cx->delete($this->table,'id',$id);

    }

}