<?php include_once "includes/header.php"; ?>

<?php if(isset($_SESSION['tipo_usuario'])){
  if($_SESSION['tipo_usuario'] == '0'){
    echo '<script>location.href="view/admin/dash.php";</script>';
  }
} ?>

<style>
  #overlay {
    background: rgba(255, 255, 255, 0.6);
    color: #666666;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 5000;
    top: 0;
    left: 0;
    float: left;
    text-align: center;
    padding-top: 12%;
  }

  .login_bg{
    background: linear-gradient(rgba(0, 0, 0, 0.69), rgba(0, 0, 0, 0.69)), #4e4e8e no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  .label-danger{
    color: white;
  }
</style>

<body class="login_bg">

  <div id="loader"></div>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <img src="<?php echo $project; ?>img/logo-fcp.png" alt="FCP" width="400" height="auto" style="margin-top:45%">
        <div class="login-panel panel panel-default" style="margin-top: 5%;">
          <div class="panel-heading" style="background-color: #4e4e8e; color:white">
            <h3 class="panel-title" style="text-align:center">Fundação Cultural do Pará - Login</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label for="usuario" class="control-label">Usuário</label>
              <input id="usuario" class="form-control" type="text" value="" autofocus="">
            </div>
            <div class="form-group">
              <label for="senha" class="control-label">Senha</label>
              <input id="senha" class="form-control" type="password" value="">
            </div>
            <div class="checkbox">
              <label>
                <input id="lembrar" type="checkbox" value="Remember Me">Lembrar-me?
              </label>
            </div>
            <!-- Change this to a button or input when using this as a form -->
            <button class="btn btn-success pull-left" style="padding: 10 45" id="acessarSistema">Acessar</button>
            <button class="btn btn-default pull-right" style="padding: 10 25" id="limpaDados">Limpar campos</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Metis Menu Plugin JavaScript -->
  <script src="vendor/metisMenu/metisMenu.min.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="dist/js/sb-admin-2.js"></script>

  <script type="text/javascript">
  $('#limpaDados').click(function () {
    $('#usuario').val('');
    $('#senha').val('');
  });

  $("#acessarSistema").click(function () {

    $('#usuario').removeClass('label-danger');
    $('#senha').removeClass('label-danger');

    var usuario = $('#usuario').val();
    var senha = $('#senha').val();

    if(usuario != "" && senha != "") {
      $.ajax({
        url: '<?php echo $project; ?>database/dbLogin.php',
        type: 'POST',
        data: {'usuario': usuario, 'senha': senha, action: 'login'},
        datatype: 'json',
        start: function () {
          var loading = '<div id="overlay"><img src="<?php echo $project; ?>img/spinner/loader.gif" alt="Loading" /><br/></div>';
          $('#loader').append(loading);
        },
        success: function (data) {

          $('#loader#overlay').remove();
          if (data != null && data != "inexistente") {

            var dataID = data.substring(0,1);
            var dataTipo = data.substring(2,3);
            var dataSetor = data.substring(4,5);
            var dataNome = data.substring(6);

            if(dataTipo == 0)
            {
              $.post('<?php echo $project; ?>sessions.php', {tipo_usuario: dataTipo, action: 'loginAdmin'}, function() {
                console.log("complete");
              });
              window.location.href = window.location.href + "view/admin/dash.php";
            }
            else
            {
              $.post('<?php echo $project; ?>sessions.php', {id: dataID, nome: dataNome, setor: dataSetor, tipo_usuario: dataTipo, action: 'loginUser'}, function() {
                console.log("complete");
              });
              window.location.href = window.location.href + "view/public/dash.php";
            }

          } else {
            alert('Dados inválidos ou inexistentes!');
            $('#usuario').val("");
            $('#senha').val("");
          }
        }
      });
    } else{
      alert('Os campos não podem ficar em branco!');
      $('#usuario').addClass('label-danger');
      $('#senha').addClass('label-danger');
    }
  })
  </script>

</body>

</html>
