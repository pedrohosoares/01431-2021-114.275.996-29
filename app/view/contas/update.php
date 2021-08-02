<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>/App/assets/css/style.css">
    <title>Atualizar Conta</title>
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
    </div>
    <h1>Atualização de Conta</h1>
    <hr />
    <form method="POST" action="<?php echo URL; ?>/conta/update">
        <fieldset>
            <input type="hidden" name="id" id="id" value="<?php echo $data['conta'][0]->id; ?>">
            <label for="pessoas_id">Pessoa</label>
            <select name="pessoas_id" id="pessoas_id">

                <?php

                    foreach($data['pessoas'] as $i=>$pessoa):
                        $selected = $pessoa->id == $data['conta'][0]->pessoas_id?"selected":"";
                        ?>
                        <option  <?php echo $selected; ?> value="<?php echo $pessoa->id; ?>"><?php echo $pessoa->nome.' - '.$pessoa->cpf; ?></option>
                        <?php

                    endforeach;

                ?>

            </select>
            <br />
            <label for="numero_conta">Número da conta</label>
            <input type="text" name="numero_conta" value="<?php echo $data['conta'][0]->numero_conta; ?>" required id="numero_conta" placeholder="Número da conta" />
            <br />
            <br />
            <input type="submit" value="Salvar" />
        </fieldset>
    </form>
</body>