<style>
  .text-center {
    margin-left: -65;
  }
</style>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #4e4e8e;">
  <button class="btn btn-danger pull-right" id="btnSair" style="margin-right: 20px;margin-top: 35;padding: 8 10;border-radius: 50">
    <i class="glyphicon glyphicon-off"></i>
  </button>
  <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse"
      style="background-color: white;margin: 34 0 0 25">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
  </button>
  <p class="pull-right" style="margin-right: 5px;margin-top: 35;padding: 7 0;color:white">Logout</p>
  <div class="navbar-header" height="auto">
    <a href="#" id="ShowHide" class="navbar-brand" style="font-size: 30px;margin: 20 -10 0 5;color: white;">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </a>
    <a class="navbar-brand" href="<?= $project; ?>view/public/dash.php" style="color: #f3f3f3;height: auto;padding-top: 10px">
      <img src="<?= $project; ?>img/logo-fcp.png" alt="FCP" width="400" height="auto">
    </a>
  </div>
  <!-- /.navbar-header -->

  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">

        <!-- INICIO SIDEBAR -->
        <li>
          <a><span style="margin-left: 30px"/><i class="fa fa-fax"></i><span style="margin-left: 30px"/>Contatos<span
              class="fa arrow"></span></a>
          <ul class="nav nav-second-level">

            <li class="text-center">
              <?php if ($_SESSION['id_setor'] == '2') { ?>
                <a href="<?= $project; ?>view/public/casaArtes/contatos/listar.php">
                  <i class="fa fa-asterisk" aria-hidden="true"></i> Gerenciar Contatos
                  <br/> Casa das Artes
                </a>
              <?php } elseif ($_SESSION['id_setor'] == '3') { ?>
                <a href="<?= $project; ?>view/public/casaLinguagem/contatos/listar.php">
                  <i class="fa fa-asterisk" aria-hidden="true"></i> Gerenciar Contatos
                  <br/> Casa da Linguagem
                </a>
              <?php } elseif ($_SESSION['id_setor'] == '5') { ?>
                <a href="<?= $project; ?>view/public/cineLibero/contatos/listar.php">
                  <i class="fa fa-asterisk" aria-hidden="true"></i> Gerenciar Contatos
                  <br/> Cine-Teatro Libero Luxardo
                </a>
              <?php } ?>
            </li>

          </ul>
        </li>

        <li>
          <a><span style="margin-left: 30px"/><i class="fa fa-calendar"></i><span
              style="margin-left: 30px"/>Eventos<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">

            <li class="text-center">
              <?php if ($_SESSION['id_setor'] == '2') { ?>
                <a href="<?= $project; ?>view/public/casaArtes/eventos/listar.php">
                  <i class="fa fa-asterisk" aria-hidden="true"></i> Gerenciar Eventos
                  <br/> Casa das Artes
                </a>
              <?php } elseif ($_SESSION['id_setor'] == '3') { ?>
                <a href="<?= $project; ?>view/public/casaLinguagem/eventos/listar.php">
                  <i class="fa fa-asterisk" aria-hidden="true"></i> Gerenciar Eventos
                  <br/> Casa da Linguagem
                </a>
              <?php } elseif ($_SESSION['id_setor'] == '5') { ?>
                <a href="<?= $project; ?>view/public/cineLibero/eventos/listar.php">
                  <i class="fa fa-asterisk" aria-hidden="true"></i> Gerenciar Eventos
                  <br/> Cine-Teatro Libero Luxardo
                </a>
              <?php } ?>
            </li>

          </ul>
        </li>

        <?php if($_SESSION['tipo_usuario'] == '2'){ ?>
        <li>
          <a><span style="margin-left: 30px"/><i class="fa fa-user"></i><span style="margin-left: 30px"/>Usuários<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">

            <li>
              <a href="<?= $project; ?>view/public/usuarios/listar.php">
                <i class="fa fa-asterisk" aria-hidden="true"></i> Gerenciar Usuários
              </a>
            </li>

          </ul>
        </li>
        <?php } ?>
        <!-- FIM SIDEBAR -->

      </ul>
    </div>
    <!-- /.sidebar-collapse -->
  </div>
  <!-- /.navbar-static-side -->
</nav>
