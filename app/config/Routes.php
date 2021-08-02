<?php

namespace App\Config;

class Routes
{

    /*
    $path armazena o caminho na url digitado
    $method Armazena o tipo de método que sera invocado
    */
    public $path;
    public $address = [];
    public $method;


    function armazena(string $method, string $address, $callback)
    {

        /**
         * O programa irá armazenar o método, o endereço  digitado e qual é o callback, ou seja, qual controller será chamado com a funcção separado por @
         */

        // Armazena a url ou coloca uma /
        $this->path = $_SERVER['PATH_INFO'] ?? '/';
        //Salva o método
        $this->method = $method;
        /*
        Armazenas as urls para comparação posterior
        O método vem no indice para agrupar as urls corretas com seus métodos
        Segundo vem o caminho, para evitar duplicação no array
        E o valor é o controller e método a ser executado
        */

        $this->address[$method][$address] = $callback;
    }

    //Armazena métodos get
    public function get(string $address, $callback)
    {

        $this->armazena('GET', $address, $callback);
    }

    //Armazena métodos posts
    public function post(string $address, $callback)
    {

        $this->armazena('POST', $address, $callback);
    }


    //Armazena métodos put
    public function put(string $address, $callback)
    {

        $this->armazena('PUT', $address, $callback);
    }

    //Armazena métodos delete
    public function delete(string $address, $callback)
    {

        $this->armazena('DELETE', $address, $callback);
    }

    //O Método Handler percorre o array criado na propriedade address e assim compara a url digitada com a url cadastrada no programa
    public function handler()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if (empty($this->address[$method])) {

            exit;
        }

        if (isset($this->address[$method][$this->path])) {
            
            $this->returnController($this->address[$method][$this->path]);

        }

        foreach ($this->address[$method] as $url => $way) {

            //Comparação se ambas são iguais e da o return no método
            if ($url == $this->path) {

                $this->returnController($way);

            }
        }

        //se nenhuma url for igual a alguma cadastrada, é parada a função
        return false;
    }

    public function returnController(string $way)
    {

        $route = explode('@', $way);
        $action = $route[1];
        //Instancia a classe
        $controller = "\\App\\Controller\\$route[0]";
        $controller = new $controller;
        //chama a ação
        return $controller->$action();
    }
}
