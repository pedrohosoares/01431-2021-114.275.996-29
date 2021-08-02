<?php

namespace App\Model;

use App\Config\Database;
use PDO;

class Movimentacao{

    

    public $cx;
    public $table = 'movimentacoes';

    public function __construct(){

        $this->cx = new Database;
        
    }



    public function cadastrar($fields){

        $statement = $this->cx->getCx()->prepare("INSERT INTO {$this->table} (contas_id,valor,criado_em) VALUES ('".$fields['numero_conta']."','".$fields['valor']."',NOW())");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
        
    }


}