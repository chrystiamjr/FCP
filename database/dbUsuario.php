<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

class dbUsuario
{
  private $conn;

  function __construct()
  {
    require 'dbConexao.php';
    $this->conn = conectar();
  }//construct

  // ----------------------------------------------------------------------------------------------------------------- //
  // Sessão EVENTOS //

  public function listarTodosUsuarios()
  {
    $query = "SELECT * FROM usuario_fundacao";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarTodos

  public function listarTodosUsuariosPorSetor($idSetor)
  {
    $query = "SELECT * FROM usuario_fundacao uf
              INNER JOIN setor_usuario su ON su.id_usuario = uf.id_usuario
              WHERE su.id_setor = {$idSetor} AND uf.id_gerente != 0";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarTodosPorSetor

  public function listarUmUsuario($idUsuario)
  {
    $query = "SELECT * FROM usuario_fundacao uf
              INNER JOIN setor_usuario su ON su.id_usuario = uf.id_usuario
              WHERE uf.id_usuario = {$idUsuario}";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarUm

  public function listarSetoresUsuario()
  {
    $query = "Select * from setor_fundacao";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarUm

  public function listarNomeGerente($idUsuario)
  {
    $query = "SELECT nome_usuario FROM usuario_fundacao WHERE id_usuario = {$idUsuario}";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarUm

  public function listarUmSetorUsuario($id)
  {
    $query = "Select * from setor_fundacao WHERE id_setor={$id}";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUm

  public function listarIDGerente($tipo)
  {
    $query = "SELECT id_usuario, nome_usuario FROM usuario_fundacao WHERE tipo_usuario = {$tipo}";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarUm

  public function cadastrarUsuario($nome,$login,$senha,$tipo,$gerente,$setor)
  {
    $query = "INSERT INTO usuario_fundacao (nome_usuario, login, senha, tipo_usuario, id_gerente) 
              VALUES ('{$nome}','{$login}','{$senha}',{$tipo},{$gerente});
              INSERT INTO setor_usuario (id_setor, id_usuario) 
              VALUES ({$setor},(SELECT id_usuario FROM usuario_fundacao WHERE nome_usuario='{$nome}' AND login='{$login}'));";
//    die($query);
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//cadastrar

  public function alterarUsuario($idUsuario,$nome,$login,$senha,$tipo=null,$gerente=null)
  {
    if($tipo && $gerente){
      $query = "UPDATE usuario_fundacao SET nome_usuario='{$nome}', login='{$login}', senha='{$senha}', 
              tipo_usuario={$tipo}, id_gerente={$gerente}
              WHERE id_usuario={$idUsuario}";
    } else{
      $query = "UPDATE usuario_fundacao SET nome_usuario='{$nome}', login='{$login}', senha='{$senha}'
              WHERE id_usuario={$idUsuario}";
    }

//    echo $query;die();
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//alterar

  public function removerUsuario($idUsuario)
  {
    $query = "DELETE FROM setor_usuario WHERE id_usuario = {$idUsuario};
              DELETE FROM usuario_fundacao WHERE id_usuario = {$idUsuario};";
//    die($query);
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }//remover

}//Class