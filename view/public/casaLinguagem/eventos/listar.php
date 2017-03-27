<?php
include_once '../../../../database/dbCasaLinguagem.php';
$linguagem = new dbCasaLinguagem();
include_once "../../../../includes/header.php";

if(!isset($_SESSION['id_usuario']) && !isset($_SESSION['id_setor']) && !isset($_SESSION['tipo_usuario'])){
  echo "<script>alert('Você não tem permissão para acessar esta página!\\n Efetue seu login!');window.location.href = " . $project . ";</script>";
}
?>

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
            <li><a href="<?= $project; ?>view/public/dash.php">Dashboard</a></li>
            <li class="active">Gerenciar Eventos</li>
          </ol>
        </div>

        <div class="page-header">
          <h2>Gerenciar Eventos</h2>
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

      <div class="table-responsive">
          <table id="tabela" class="table table-striped table-bordered table-hover" cellspacing="0">
            <thead><!--Table Header-->
            <tr><!--Table Row-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle;width:5% !important;">#</th>
              <!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Evento</th>
              <!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Descricão</th>
              <!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Horario</th>
              <!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Preço</th>
              <!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Imagem</th>
              <!--Table Header Cell-->
              <th style="background-color:#4e4e8e;text-align:center;color:white;vertical-align:middle">Ações</th>
              <!--Table Header Cell-->
            </tr>
            </thead>
            <tbody>
            <?php if ($linguagem->listarTodosEventosLinguagem() != null || $linguagem->listarTodosEventosLinguagem() != false) {
              foreach ($linguagem->listarTodosEventosLinguagem() as $data) { ?>
                <tr>
                  <td style="text-align:center;vertical-align:middle;width:5% !important;"><?= $data['id_evento'] ?></td>
                  <td style="text-align:center;vertical-align:middle"><?= $data['nome'] ?></td>
                  <td style="text-align:center;vertical-align:middle"><?= formatarDescricao($data['descricao'], 60) ?></td>
                  <td style="text-align:center;vertical-align:middle"><?= $data['horario'] ?></td>
                  <td style="text-align:center;vertical-align:middle"><?= verificaValor($data['preco']) ?></td>
                  <td style="text-align:center;vertical-align:middle">
                    <img src="<?= $data['imagem'] ?>" alt="<?= formatarImgText($data['imagem']) ?>" style="width: 100%;"/>
                  </td>
                  <td style="text-align:center;width:10% !important;vertical-align:middle">
                    <button type="button" class="btn btn-primary alterar"
                            style="width:30;height:30;border-radius:50%;padding:0;margin-right: 10px"
                            data-toggle="modal" data-target="#alteracaoModal">
                      <input class="id" type="hidden" value="<?= $data['id_evento'] ?>">
                      <input class="nome" type="hidden" value="<?= $data['nome'] ?>">
                      <input class="descricao" type="hidden" value="<?= $data['descricao'] ?>">
                      <input class="horario" type="hidden" value="<?= $data['horario'] ?>">
                      <input class="preco" type="hidden" value="<?= $data['preco'] ?>">
                      <input class="imgText" type="hidden" value="<?= formatarImgText($data['imagem']) ?>">
                      <input class="img" type="hidden" value="<?= $data['imagem'] ?>">
                      <i class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Editar"></i>
                    </button>
                    <button type="button" class="btn btn-danger remover" style="width:30;height:30;border-radius:50%;padding:0"
                            data-toggle="modal" data-target="#remocaoModal">
                      <input class="id" type="hidden" value="<?= $data['id_evento'] ?>">
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
      var idEvento = $(this).find('.id').val();
      var nome = $(this).find('.nome').val();
      var descricao = $(this).find('.descricao').val();
      var horario = $(this).find('.horario').val();
      var preco = $(this).find('.preco').val();
      var imgText = $(this).find('.imgText').val();
      var img = $(this).find('.img').val();

      if(imgText.length == 0){
        $('.imgTextAlterar').attr('type', 'text').css('margin-bottom', '10px');
        $('.imgDivAlterar').css('height', '0px');
        $('.imgLabel').children().remove();
        $('.imgLabel').append('<p>Nome da Imagem:</p>');
      } else {
        $('.imgTextAlterar').attr('type', 'hidden').css('margin-bottom', '');
        $('.imgDivAlterar').css('height', '');
        $('.imgLabel').children().remove();
        $('.imgLabel').append('<p>Imagem:</p>');
      }
      $('#idAlteracao').val(idEvento);
      $('.nomeAlterar').val(nome);
      $('.descricaoAlterar').val(descricao);
      $('.horarioAlterar').val(horario);
      $('.precoAlterar').val(preco);
      $('.imgTextAlterar').val(imgText);
      $('.imgAlterar').attr('src', img);
    });

    $('.remover').click(function () {
      var idEvento = $(this).find('.id').val();

      $('#idRemocao').val(idEvento);
    });
  </script>

  <?php include "modalLinguagem.php"; ?>
</body>
</html>