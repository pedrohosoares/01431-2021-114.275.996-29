<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <link rel="stylesheet" href="./App/assets/css/style.css">
    <title>Contas</title>
</head>

<body>
  
    <?php 
    if(isset($data['msg'])):
    ?>
    <div class="alert">
        <?php echo $data['msg']; ?>
    </div>
    <?php
    endif;
    ?>
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
    <table>

        <thead>

            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Número da Conta</th>
                <th>Editar</th>
                <th>Remover</th>
            </tr>

        </thead>

        <tbody>

            <?php 
            foreach($data['contas'] as $i=>$conta):
            ?>
            <tr>

                <td><?php echo $conta->nome ?></td>
                <td><?php echo $conta->cpf ?></td>
                <td><?php echo $conta->numero_conta ?></td>
                <td>
                    <form method="POST" action="/conta/editar">
                        <input type="hidden" name="id" value="<?php echo $conta->id; ?>">
                        <input type="submit" value="Editar" />
                    </form>
                <td>
                    <form method="POST" action="/conta/excluir"  onsubmit="if(!confirm('Você realmente quer excluir essa conta?')){return false;}">
                        <input type="hidden" name="id" value="<?php echo $conta->id; ?>">
                        <input type="submit" value="Excluir" />
                    </form>
                </td>

            </tr>
            <?php  
            endforeach;
            ?>

        </tbody>

    </table>

</body>

</html>