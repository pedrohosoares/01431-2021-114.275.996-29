<?php

namespace App\Model;

use App\Config\Database;
use PDO;

class Conta{

    public $cx;
    public $table = 'contas';

    public function __construct(){

        $this->cx = new Database;
        
    }

    public function editar($where = null){

        return $this->cx->select($this->table,'*',0,10,$where);

    }
    
    public function select(){
        
        
        $statement = $this->cx->getCx()->prepare("SELECT contas.id,pessoas.nome,pessoas.cpf,contas.numero_conta FROM {$this->table} INNER JOIN pessoas ON pessoas.id = contas.pessoas_id");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
        
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