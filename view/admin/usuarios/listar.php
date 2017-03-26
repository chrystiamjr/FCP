<?php
include_once '../../../database/dbUsuario.php';
$user = new dbUsuario();
?>

<?php include_once "../../../includes/header.php"; ?>

<?php
if (!isset($_SESSION['tipo_usuario'])) {
  echo "<script>alert('Você não tem permissão para acessar esta página!\\n Efetue seu login!');window.location.href = " . $project . ";</script>";
}
?>

<style>
  textarea {
    resize: none;
    overflow: auto;
  }

  label {
    text-align: center !important;
  }

  #cadastrar {
    float: right;
  }
</style>
<link rel="stylesheet" href="<?= $project; ?>vendor/datatables/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?= $project; ?>vendor/datatables-plugins/dataTables.bootstrap.css">

<body>

<?php include_once "../../../includes/sidebar.php"; ?>
<div id="wrapper">
  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">

        <div class="pull-right breadcumberbach">
          <ol class="breadcrumb">
            <li><a href="<?= $project; ?>view/admin/dash.php">Dashboard</a></li>
            <li class="active">Gerenciar Usuários</li>
          </ol>
        </div>

        <div class="page-header">
          <h2>Gerenciar Usuários</h2>
        </div>
      </div>

      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <button
      style="margin:-10 0 10 0;text-decoration:none;border:none;border-radius:50%;width:40;height:40;padding:0;background-color: #4e4e8e;"
      id="cadastrar" data-toggle="modal" data-target="#cadastroModal"
      type="button" class="btn btn-lg btn-primary pull-right">
      <i class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="top" title="Adicionar"></i>
    </button>
    <div class="row midlle-content">

      <div class="col-lg-12">

        <div class="table-responsive">
          <table id="tabela" class="table table-striped table-bordered table-hover" cellspacing="0">
            <thead><!--Table Header-->
            <tr><!--Table Row-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">#</th><!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Nome</th><!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Login</th><!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Tipo de Usuário</th><!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Gerente</th><!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Ações</th><!--Table Header Cell-->
            </tr>
            </thead>
            <tbody>
            <?php if ($user->listarTodosUsuarios() != null || $user->listarTodosUsuarios() != false) {
              foreach ($user->listarTodosUsuarios() as $data) { ?>
                <tr>
                  <td style="text-align:center;width:50;vertical-align:middle"><?= $data['id_usuario'] ?></td>
                  <td style="text-align:center;width:100;vertical-align:middle"><?= $data['nome_usuario'] ?></td>
                  <td style="text-align:center;width:100;vertical-align:middle"><?= $data['login'] ?></td>
                  <td style="text-align:center;width:100;vertical-align:middle"><?= $data['tipo_usuario'] ?></td>
                  <?php $nome = $user->listarNomeGerente($data['id_gerente']);
                  if($nome){ ?>
                  <td style="text-align:center;width:100;vertical-align:middle"><?= $nome[0]['nome_usuario'] ?></td>
                  <?php } else { ?>
                  <td style="text-align:center;width:100;vertical-align:middle">-</td>
                  <?php } ?>
                  <td style="text-align:center;width:100;vertical-align:middle">
                    <button type="button" class="btn btn-primary alterar"
                            style="width:30;height:30;border-radius:50%;padding:0;margin-right: 10px"
                            data-toggle="modal" data-target="#alteracaoModal">
                      <input class="id" type="hidden" value="<?= $data['id_usuario'] ?>">
                      <input class="nome" type="hidden" value="<?= $data['nome_usuario'] ?>">
                      <input class="login" type="hidden" value="<?= $data['login'] ?>">
                      <input class="tipo" type="hidden" value="<?= $data['tipo_usuario'] ?>">
                      <input class="gerente" type="hidden" value="<?= $data['id_gerente'] ?>">
                      <i class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Editar"></i>
                    </button>
                    <button type="button" class="btn btn-danger remover" style="width:30;height:30;border-radius:50%;padding:0"
                            data-toggle="modal" data-target="#remocaoModal">
                      <input class="id" type="hidden" value="<?= $data['id_usuario'] ?>">
                      <i class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Remover"></i>
                    </button>
                  </td>
                </tr>
                <?php
              }
            } else {
              echo '<tr><td/><td align="center">Não há dados na tabela</td><td/></tr>';
            } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "../../../includes/scripts.php"; ?>
  <script type="text/javascript" src="<?= $project; ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?= $project; ?>vendor/datatables/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#tabela').DataTable({
        "bLengthChange": false,
        "language": {
          "search": "Pesquisar:",
          "paginate": {
            "first": "Primeiro",
            "last": "Último",
            "next": "Próximo",
            "previous": "Anterior"
          }
        }
        , "select": true
        , "info": false
      });
    });
    $('.alterar').click(function () {
      var idUser = $(this).find('.id').val();
      var nome = $(this).find('.nome').val();
      var login = $(this).find('.login').val();
      var tipo = $(this).find('.tipo').val();
      var gerente = $(this).find('.gerente').val();

      $('#idAlteracao').val(idUser);
      $('.nomeAlterar').val(nome);
      $('.loginAlterar').val(login);
      $('.tipoAlterar').val(tipo);
      $('.gerenteAlterar').val(gerente);

//      if(gerente != 0) {
//        $('#idAlteracao').val(idUser);
//        $('.nomeAlterar').val(nome);
//        $('.loginAlterar').val(login);
//        $('.tipoAlterar').val(tipo);
//        $('.gerenteAlterar').val(gerente);
//        $(this).attr("data-target", "#alteracaoModalGerente");
//      } else {
//        $('#idAlteracao').val(idUser);
//        $('.nomeAlterar').val(nome);
//        $('.loginAlterar').val(login);
//        $('.tipoAlterar').val(tipo);
//        $(this).attr("data-target", "#alteracaoModal");
//      }
    });

    $('.remover').click(function () {
      var idUser = $(this).find('.id').val();

      $('#idRemocao').val(idUser);
    });
  </script>

  <?php include "modalUsuario.php"; ?>
</body>
</html>
