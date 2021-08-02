<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>/App/assets/css/style.css">
    <title>Inserir Contas</title>
</head>

<body>
<div class="menu">
        <a href="<?php URL; ?>/pessoa">Pessoa</a>
        <a href="<?php URL; ?>/conta">Conta</a>
        <a href="<?php URL; ?>/movimentacao/inserir">Movimentação</a>
    </div>
    <h1>Cadastro de contas</h1>
    <hr />
    <form method="POST" action="<?php echo URL; ?>/conta/inserir">
        <fieldset>
            <label for="pessoas_id">Pessoa</label>
            <select name="pessoas_id" id="pessoas_id">

                <?php

                    foreach($data['pessoas'] as $i=>$pessoa):

                        ?>
                        <option value="<?php echo $pessoa->id; ?>"><?php echo $pessoa->nome.' - '.$pessoa->cpf; ?></option>
                        <?php

                    endforeach;

                ?>

            </select>
            <br />
            <label for="numero_conta">Número da conta</label>
            <input type="text" name="numero_conta" required id="numero_conta" placeholder="Número da conta" />
            <br /><br />
            <input type="submit" value="Salvar" />
        </fieldset>
        
    </form>
</body>