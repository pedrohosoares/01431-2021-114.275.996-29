<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>/App/assets/css/style.css">
    <title>Inserir Movimentação</title>
</head>

<body>
    <div class="menu">
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
    <h1>Cadastro de Movimentação</h1>
    <hr />
    <form method="POST" action="<?php echo URL; ?>/movimentacao/inserir">
        <fieldset class="movimentacao">
            <label for="pessoas_id">Pessoa</label>
            <select name="pessoas_id" id="pessoas_id">

                <?php

                foreach ($data['pessoas'] as $i => $pessoa) :

                ?>
                    <option value="<?php echo $pessoa->id; ?>"><?php echo $pessoa->nome . ' - ' . $pessoa->cpf; ?></option>
                <?php

                endforeach;

                ?>

            </select>
            <br />
            <label for="numero_conta">Número da conta</label>
            <select name="numero_conta">
                <?php

                foreach ($data['conta'] as $i => $conta) :

                ?>
                    <option data-pessoa="<?php echo $conta->pessoas_id; ?>" value="<?php echo $conta->id; ?>"><?php echo $conta->numero_conta; ?></option>
                <?php

                endforeach;

                ?>
            </select>
            <br />
            <label for="valor">Valor</label>
            <input type="text" name="valor" required id="valor" placeholder="Valor" />
            <br />
            <label for="Depositar_Retirar">Depositar / Retirar</label>
            <select name="depositar_retirar" id="depositar_retirar">

                <option value="depositar">Depositar</option>
                <option value="retirar">Retirar</option>

            </select>

            <br />
            <br />
            <input type="submit" value="Salvar" />
        </fieldset>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>sladklsdak</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>