<?php

namespace App\Controller;

use App\Config\Config;
use App\Model\Conta;
use App\Model\Pessoa;

class ContaController{

    public function index($params = null){
        
        $conta = new Conta;
        $data['msg'] = $params['msg'];
        $data['contas'] = $conta->select();
        return Config::view('contas/index',$data);

    }

    public function inserir(){
        
        if(METHOD === "POST"):

            $conta = new Conta();
            $conta->cadastrar($_POST);
            header("Location: /conta");

        endif;
        $pessoa = new Pessoa;
        $data['pessoas'] = $pessoa->select();
        return Config::view('contas/insert',$data);


    }

    public function editar(){
        
        $id = filter_input(INPUT_POST,'id');
        $conta = new Conta();
        $pessoa = new Pessoa;
        $data['pessoas'] = $pessoa->select();
        $data['conta'] = $conta->editar("id={$id}");
        return Config::view('contas/update',$data);

    }

    public function update(){
        
        $conta = new Conta();
        $data = $conta->update($_POST);
        header('Location: /conta');
        exit;

    }

    public function delete(){
        
        $id = filter_input(INPUT_POST,'id');
        $conta = new Conta();
        $conta->delete($id);
        $params['msg'] = "Deletado com sucesso";
        header("Location: /conta");
        
        
    }

}