<?php 

//Defina as constantes como URL base

define('URL','http://localhost:8000');
define('METHOD',$_SERVER['REQUEST_METHOD']);
define('PATH',$_SERVER['PATH_INFO']);


//Cadastro de rotas
use App\Config\Routes;

$route = new Routes();
//Pessoa
$route->post('/pessoa/excluir','PessoaController@delete');
$route->get('/pessoa/inserir','PessoaController@inserir');
$route->post('/pessoa/inserir','PessoaController@inserir');
$route->post('/pessoa/editar','PessoaController@editar');
$route->post('/pessoa/update','PessoaController@update');
$route->get('/pessoa','PessoaController@index');

//Movimentacao
$route->post('/movimentacao/excluir','MovimentacaoController@delete');
$route->get('/movimentacao/inserir','MovimentacaoController@inserir');
$route->post('/movimentacao/inserir','MovimentacaoController@inserir');
$route->post('/movimentacao/editar','MovimentacaoController@editar');
$route->post('/movimentacao/update','MovimentacaoController@update');
$route->get('/movimentacao','MovimentacaoController@index');


//Conta
$route->post('/conta/excluir','ContaController@delete');
$route->get('/conta/inserir','ContaController@inserir');
$route->post('/conta/inserir','ContaController@inserir');
$route->post('/conta/editar','ContaController@editar');
$route->post('/conta/update','ContaController@update');
$route->get('/conta','ContaController@index');

$route->handler();