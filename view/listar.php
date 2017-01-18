<?php
include_once  '../database/dbTeste.php';
$teste = new dbTeste();
?>


<html lang="en">
    <?php include_once "../includes/header.php"; ?>

    <style>
        textarea {
            resize: none;
            overflow: auto;
        }
        label{
            text-align: center !important;
        }
        #cadastrar{
            float: right;
        }
    </style>
    <link rel="stylesheet" href="../vendor/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../vendor/datatables-plugins/dataTables.bootstrap.css">




<body>

<?php include_once "../includes/sidebar.php"; ?>
<div id="wrapper">

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <a id="cadastrar" href="cadastrar.php" type="button" class="btn-lg btn-success pull-right">Cadastrar Evento</a>
                Gerenciar Eventos</h1>
        </div>



        <!-- /.col-lg-12 -->
     </div>
    <!-- /.row -->




<div class="table-responsive">
<table id= "tabela" class="table table-striped table-bordered table-hover">
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

    <?php include_once "../includes/scripts.php"; ?>
    <script type="text/javascript" src="../vendor/datatables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../vendor/datatables/js/jquery.dataTables.min.js"></script>

    <script>
        $('#tabela').DataTable({
            "bLengthChange": false,"language": {"search":"Pesquisar:","paginate":
                {"first":"Primeiro","last":"Ultimo","next":"Próximo","previous": "Anterior"}}
            //,"info": false
        });
    </script>

        </tbody>
    </table>
</div>
</div>
</body>
</html>