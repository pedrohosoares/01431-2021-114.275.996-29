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
<?php  
        if(PATH !== '/movimentacao/inserir'){
            $controller = explode('/',PATH);
            $controller = $controller[1];
            ?>
            <a href="<?php URL; ?>/<?php echo $controller; ?>/inserir">Inserir</a>
            <?php
        }
        ?>
        <a href="<?php URL; ?>/pessoa">Pessoa</a>
        <a href="<?php URL; ?>/conta">Conta</a>
        <a href="<?php URL; ?>/movimentacao/inserir">Movimentação</a>
        <?php  
        if(PATH !== '/movimentacao/inserir'){
            $controller = explode('/',PATH);
            $controller = $controller[1];
            ?>
            <a href="<?php URL; ?>/<?php echo $controller; ?>/inserir">Inserir</a>
            <?php
        }
        ?>
    </div>
    <h1>Atualização de Pessoa</h1>
    <hr />
    <form method="POST" action="<?php echo URL; ?>/pessoa/update">
        <fieldset>
            <input type="hidden" name="id" id="id" value="<?php echo $data[0]->id; ?>">
            <label for="nome">Nome</label>
            <input type="text" name="nome"  value="<?php echo $data[0]->nome; ?>" required id="text" placeholder="Informe o nome" />
            <br />
            <label for="CPF">CPF</label>
            <input type="text" name="cpf" value="<?php echo $data[0]->cpf; ?>" required id="cpf" placeholder="Informe o CPF" />
            <br />
            <label for="endereco">Endereço</label>
            <textarea name="endereco" required id="endereco" placeholder="Informe o endereço"><?php echo $data[0]->endereco; ?></textarea>
            <br />
            <input type="submit" value="Salvar" />
        </fieldset>
    </form>
</body>