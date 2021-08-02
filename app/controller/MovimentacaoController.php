<?php

namespace App\Controller;

use App\Config\Config;
use App\Model\Conta;
use App\Model\Movimentacao;
use App\Model\Pessoa;

class MovimentacaoController
{

    public function inserir()
    {

        if (METHOD === "POST") :

            $movimentacao = new Movimentacao();
            $movimentacao->cadastrar($_POST);
            header("Location: /movimentacao/inserir");

        endif;
        $pessoa = new Pessoa;
        $data['pessoas'] = $pessoa->select();
        $conta = new Conta;
        $data['conta'] = $conta->select();
        //$data['movimentacao'] = $movimentacao->select();
        return Config::view('movimentacoes/insert', $data);
    }

    
}
