<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

class dbLogin
{
  private $conn;

  function __construct()
  {
    require 'dbConexao.php';
    $this->conn = conectar();
  }//construct

  public function validarUsuario($login, $senha)
  {
    $query = "SELECT id_usuario, tipo_usuario FROM super_user WHERE login = '{$login}' AND senha = '{$senha}'";
//    echo $query;
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//validarUsuario

  public function validarUsuarioPublic($login, $senha)
  {
    $query = "SELECT uf.id_usuario, uf.nome_usuario, su.id_setor, uf.tipo_usuario FROM usuario_fundacao uf 
              INNER JOIN setor_usuario su ON su.id_usuario = uf.id_usuario
              WHERE uf.login = '{$login}' AND uf.senha = '{$senha}';";
//    echo $query;
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//validarUsuario

}//Class

// Funções do ajax
function login()
{
  $login = new dbLogin();
  $result = $login->validarUsuario($_POST['usuario'], $_POST['senha']);
//  var_dump($result);
  if ($result != false && $result != null) {
    $data = $result[0]['id_usuario'] . ',' . $result[0]['tipo_usuario'];
    echo $data;
  } else {
    $result = $login->validarUsuarioPublic($_POST['usuario'], $_POST['senha']);
//    var_dump($result);
    if ($result != false && $result != null) {
      $data = $result[0]['id_usuario'] . ',' . $result[0]['tipo_usuario'] . ',' . $result[0]['id_setor'] . ',' . $result[0]['nome_usuario'];
      echo $data;
    } else {
      echo "inexistente";
    }
  }
}

if (isset($_POST['action']) && !empty($_POST['action'])) {
  switch ($_POST['action']) {
    case 'login' :
      login();
      break;
  }
}
