<?php
include_once '../../../../database/dbCasaLinguagem.php';
$linguagem = new dbCasaLinguagem();
?>

<?php include_once "../../../../includes/header.php"; ?>

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

<?php include_once "../../../../includes/sidebar.php"; ?>
<div id="wrapper">
  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">

        <div class="pull-right breadcumberbach">
          <ol class="breadcrumb">
            <li><a href="<?= $project; ?>view/admin/dash.php">Dashboard</a></li>
            <li class="active">Gerenciar Contatos</li>
          </ol>
        </div>

        <div class="page-header">
          <h2>Gerenciar Contatos</h2>
          <h5>
            <i class="glyphicon glyphicon-option-vertical"></i>
            Casa da Linguagem
          </h5>
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
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Área de Atuação</th><!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Nome</th><!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Número</th><!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">E-mail</th><!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Ações</th><!--Table Header Cell-->
            </tr>
            </thead>
            <tbody>
            <?php if ($linguagem->listarTodosContatosLinguagem() != null || $linguagem->listarTodosContatosLinguagem() != false) {
              foreach ($linguagem->listarTodosContatosLinguagem() as $data) { ?>
                <tr>
                  <td style="text-align:center;width:50;vertical-align:middle"><?= $data['id_contato'] ?></td>
                  <td style="text-align:center;width:100;vertical-align:middle"><?= $data['area_atuacao'] ?></td>
                  <td style="text-align:center;width:100;vertical-align:middle"><?= $data['nome'] ?></td>
                  <td style="text-align:center;width:100;vertical-align:middle"><?= $data['numero'] ?></td>
                  <td style="text-align:center;width:100;vertical-align:middle"><?= $data['email'] ?></td>
                  <td style="text-align:center;width:100;vertical-align:middle">
                    <button type="button" class="btn btn-primary alterar"
                            style="width:30;height:30;border-radius:50%;padding:0;margin-right: 10px"
                            data-toggle="modal" data-target="#alteracaoModal">
                      <input class="id" type="hidden" value="<?= $data['id_contato'] ?>">
                      <input class="areaAtuacao" type="hidden" value="<?= $data['area_atuacao'] ?>">
                      <input class="nome" type="hidden" value="<?= $data['nome'] ?>">
                      <input class="numero" type="hidden" value="<?= $data['numero'] ?>">
                      <input class="email" type="hidden" value="<?= $data['email'] ?>">
                      <i class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Editar"></i>
                    </button>
                    <button type="button" class="btn btn-danger remover" style="width:30;height:30;border-radius:50%;padding:0"
                            data-toggle="modal" data-target="#remocaoModal">
                      <input class="id" type="hidden" value="<?= $data['id_contato'] ?>">
                      <i class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Remover"></i>
                    </button>
                  </td>
                </tr>
                <?php
              }
            } else {
              echo '<tr><td/><td colspan="4" align="center">Não há dados na tabela</td><td/></tr>';
            } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "../../../../includes/scripts.php"; ?>
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
      var idContato = $(this).find('.id').val();
      var areaAtuacao = $(this).find('.areaAtuacao').val();
      var nome = $(this).find('.nome').val();
      var numero = $(this).find('.numero').val();
      var email = $(this).find('.email').val();

      $('#idAlteracao').val(idContato);
      $('.areaAtuacaoAlterar').val(areaAtuacao);
      $('.nomeAlterar').val(nome);
      $('.numeroAlterar').val(numero);
      $('.emailAlterar').val(email);
    });

    $('.remover').click(function () {
      var idContato = $(this).find('.id').val();

      $('#idRemocao').val(idContato);
    });
  </script>

  <?php include "modalLinguagem.php"; ?>
</body>
</html>
