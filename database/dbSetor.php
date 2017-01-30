<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

class dbSetor
{
  private $conn;

  function __construct()
  {
    require 'dbConexao.php';
    $this->conn = conectar();
  }//construct

  // ----------------------------------------------------------------------------------------------------------------- //
  // Sessão EVENTOS //

  public function listarTodosSetores()
  {
    $query = "Select * from setor_fundacao";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarTodos

  public function listarUmSetor($idSetor)
  {
    $query = "Select * from setor_fundacao WHERE id_setor={$idSetor}";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUm

  public function listarUmSetorPorNome($likeName)
  {
    $query = "Select * from setor_fundacao WHERE nome LIKE '%{$likeName}%'";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUm

  public function cadastrarSetor($nome)
  {

    $query = "INSERT INTO setor_fundacao(nome) VALUES('{$nome}');";

//    die($query);
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//cadastrar

  public function alterarSetor($idSetor, $nome)
  {
    $query = "UPDATE setor_fundacao SET nome='{$nome}' WHERE id_setor={$idSetor}";

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//alterar

  public function removerSetor($idSetor)
  {
    $query = "Delete From setor_fundacao WHERE id_setor = {$idSetor}";
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }//remover

}//Class