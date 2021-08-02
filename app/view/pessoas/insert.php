<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>/App/assets/css/style.css">
    <title>Inserir Pessoas</title>
</head>

<body>
<div class="menu">
    
        <a href="<?php URL; ?>/pessoa">Pessoa</a>
        <a href="<?php URL; ?>/conta">Conta</a>
        <a href="<?php URL; ?>/movimentacao/inserir">Movimentação</a>
        
    </div>
    <h1>Cadastro de Pessoa</h1>
    <hr />
    <form method="POST" action="<?php echo URL; ?>/pessoa/inserir">
        <fieldset>
            <label for="nome">Nome</label>
            <input type="text" name="nome" required id="text" placeholder="Informe o nome" />
            <br />
            <label for="CPF">CPF</label>
            <input type="text" name="cpf" required id="cpf" placeholder="Informe o CPF" />
            <br />
            <label for="endereco">Endereço</label>
            <textarea name="endereco" required id="endereco" placeholder="Informe o endereço"></textarea>
            <br />
            <input type="submit" value="Salvar" />
        </fieldset>
    </form>
</body>