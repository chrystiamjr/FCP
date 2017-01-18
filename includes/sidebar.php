
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #343d46">
  <button class="btn btn-danger pull-right" id="btnSair" style="margin-right: 20px;margin-top: 10px;padding: 5px;">
    <a href="#" style="color: white; text-decoration: none;padding: 10px">x Sair</a>
  </button>
  <div class="navbar-header">
    <a class="navbar-brand" href="/<?php echo $project; ?>" style="color: #f3f3f3">FCP</a>
  </div>
<!-- /.navbar-header -->

<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">

      <!-- INICIO SIDEBAR -->
      <li>
        <a><i class="fa fa-code fa-fw"></i> Eventos<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

          <li>
            <a href="/<?php echo $project; ?>view/listar.php">Gerenciar Eventos</a>
          </li>
            <li>
                <a href="/<?php echo $project; ?>view/cadastrar.php">Cadastrar Eventos</a>
            </li>

        </ul>
      </li>
      <!-- FIM SIDEBAR -->

    </ul>
  </div>
  <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
