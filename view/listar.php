<?php
include_once  '../database/dbTeste.php';
$teste = new dbTeste();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <title>Listar Eventos</title>

</head>
<body>
<div class="container">

<h2 style="padding-bottom: 5px">Listando Eventos</h2>
    <a href="cadastrar.php" style="" type="button" class="btn-lg btn-success">Cadastrar Evento</a>
<hr><!--Horizontal Rule-->

<div class="table-responsive">
<table class="table table-bordered">
    <thead><!--Table Header-->
        <tr><!--Table Row-->
            <th>#</th><!--Table Header Cell-->
            <th>Evento</th><!--Table Header Cell-->
            <th>Descricão</th><!--Table Header Cell-->
            <th>Horário</th><!--Table Header Cell-->
            <th>Preço</th><!--Table Header Cell-->
            <th>Ações</th><!--Table Header Cell-->
        </tr>
    </thead>
    <tbody>
    <?php foreach ($teste->listarTodos() as $cell){?>
        <tr>
            <td><?php echo $cell['id_evento'];?></td><!--Table Data Cell-->
            <td><?php echo $cell['nome'];?></td><!--Table Data Cell-->
            <td><?php echo $cell['descricao'];?></td><!--Table Data Cell-->
            <td><?php echo $cell['horario'];?></td><!--Table Data Cell-->
            <td><?php echo $cell['preco'];?></td><!--Table Data Cell-->
            <td>
                <a href="alterar.php?id_evento=<?php echo $cell['id_evento'];?>" type="button" class="btn-xs btn-primary">Alterar</a>
                <a href="remover.php?id_evento=<?php echo $cell['id_evento'];?>" type="button" class="btn-xs btn-danger">Remover</a>
            </td>
        </tr>
    <?php }?>

        </tbody>
    </table>
</div>
</div>
</body>
</html>