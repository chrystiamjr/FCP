<!DOCTYPE html>
<html lang="en">

<?php include_once "../includes/header.php"; ?>

<body>

<div id="wrapper">

  <?php include_once "../includes/sidebar.php"; ?>

  <style>
    textarea {
      resize: none;
      overflow: auto;
    }
    label{
      text-align: center !important;
    }
  </style>

  <!-- Titulo do content -->
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Cadastrar novo evento</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">

      <form class="form-horizontal" method="post" action="/<?php echo $project; ?>controller/testeCtrl.php">
        <input type="hidden" name="sOP" value="cadastro">
        <div class="form-group">
          <label for="nome" class="col-sm-1 control-label">Nome:</label>
          <div class="col-sm-10">
            <input id="nome" class="form-control" autofocus="autofocus" maxlength="80" placeholder="Maximo de Caractéres 80" type="text" name="nome">
          </div>
        </div>
        <div class="form-group">
          <label for="descricao" class="col-sm-1 control-label">Descrição:</label>
          <div class="col-sm-10">
            <textarea id="descricao" class="form-control" placeholder="Caracteres Maximos 255" maxlength="255" cols="30" rows="5" name="descricao"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="horario" class="col-sm-1 control-label">Horário:</label>
          <div class="col-sm-10">
            <input type="text" name="horario" class="form-control" id="horario">
          </div>
        </div>
        <div class="form-group">
          <label for="preco" class="col-sm-1 control-label">Preço:</label>
          <div class="col-sm-10">
            <input id="preco" type="text" name="preco" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-1 col-sm-10">
            <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar</button>
          </div>
        </div>
      </form>

    </div>

  </div>
  <!-- /#wrapper -->

  <?php include_once "../includes/scripts.php"; ?>

  <script src="/<?php echo $project; ?>js/jquery-ui.min.js"></script>
  <script src="/<?php echo $project; ?>js/jquery.datetimepicker.full.js"></script>
  <script>
    $("document").ready(function () {
      $('#horario').datetimepicker();
    })
  </script>

</body>

</html>
