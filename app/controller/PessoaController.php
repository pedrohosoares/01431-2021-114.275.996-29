<?php

namespace App\Controller;

use App\Model\Pessoa;
use App\Config\Config;

class PessoaController{

    public function index($params = null){
        
        $pessoa = new Pessoa();
        $data['msg'] = $params['msg'];
        $data['pessoas'] = $pessoa->select();
        return Config::view('pessoas/index',$data);

    }

    public function inserir(){
        
        if(METHOD === "POST"):

            $pessoa = new Pessoa();
            $pessoa->cadastrar($_POST);
            header("Location: /pessoa");

        endif;

        return Config::view('pessoas/insert','');


    }

    public function editar(){
        
        $id = filter_input(INPUT_POST,'id');
        $pessoa = new Pessoa();
        $data = $pessoa->select("id={$id}");
        return Config::view('pessoas/update',$data);

    }

    public function update(){
        
        $pessoa = new Pessoa();
        $data = $pessoa->update($_POST);
        header('Location: /pessoa');
        exit;

    }

    public function delete(){
        
        $id = filter_input(INPUT_POST,'id');
        $pessoa = new Pessoa();
        $pessoa->delete($id);
        $params['msg'] = "Deletado com sucesso";
        header("Location: /pessoa");
        
        
    }
    
}