<?php

class dbCineLibero
{
  private $conn;

  function __construct()
  {
    require 'dbConexao.php';
    $this->conn = conectar();
  }//construct

  // ----------------------------------------------------------------------------------------------------------------- //
  // Sessão EVENTOS //

  public function listarTodosEventosCine()
  {
    $query = "Select * from evento_cinema";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarTodosEventos

  public function listarUmEventoCine($idEvento)
  {
    $query = "Select * from evento_cinema WHERE id_evento={$idEvento}";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUmEvento

  public function cadastrarEventoCine($nome, $descricao, $progRegular, $projetos, $horario, $preco)
  {
    $query = "INSERT INTO 
              evento_cinema(id_setor, nome, descricao, programacao_regular, projetos, horario,preco) 
              VALUES
              ((Select id_setor FROM setor_fundacao WHERE nome LIKE '%CINE%'),
              '{$nome}', '{$descricao}', '{$progRegular}', '{$projetos}',STR_TO_DATE('{$horario}','%d-%m-%Y %H:%i'), {$preco});";

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//cadastrarEvento

  public function alterarEventoCine($idEvento, $nome, $descricao, $progRegular, $projetos, $horario, $preco)
  {
    $data = $this->listarUmEventoCine($idEvento);
    $hr = $data[0]['horario'];

    if ($horario == $hr) {
      $query = "UPDATE evento_cinema SET nome='{$nome}', descricao='{$descricao}', programacao_regular='{$progRegular}',
              projetos='{$projetos}', preco={$preco}
              WHERE id_evento={$idEvento}";
    } else {
      $query = "UPDATE evento_cinema SET nome='{$nome}', descricao='{$descricao}', programacao_regular='{$progRegular}',
              projetos='{$projetos}', horario=STR_TO_DATE('{$horario}','%d-%m-%Y %H:%i'), preco={$preco}
              WHERE id_evento={$idEvento}";
    }
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//alterarEvento

  public function removerEventoCine($idEvento)
  {
    $query = "Delete From evento_cinema WHERE id_evento = {$idEvento}";
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }//removerEvento

  // ----------------------------------------------------------------------------------------------------------------- //
  // Sessão CONTATOS //

  public function listarTodosContatosCine()
  {
    $query = "Select * from contato_setor WHERE id_setor=(Select id_setor FROM setor_fundacao WHERE nome LIKE '%CINE%')";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarTodosContatos

  public function listarUmContatoCine($idContato)
  {
    $query = "Select * from contato_setor WHERE id_contato={$idContato} AND 
              id_setor=(Select id_setor FROM setor_fundacao WHERE nome LIKE '%CINE%')";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUmContato

  public function cadastrarContatoCine($areaAtuacao, $nome, $numero, $email)
  {
    $query = "INSERT INTO 
              contato_setor(id_setor, area_atuacao, nome, numero, email) 
              VALUES
              ((Select id_setor FROM setor_fundacao WHERE nome LIKE '%CINE%'),
              '{$areaAtuacao}', '{$nome}', '{$numero}', '{$email}');";

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//cadastrarContato

  public function alterarContatoCine($idContato, $areaAtuacao, $nome, $numero, $email)
  {
    $query = "UPDATE contato_setor SET area_atuacao='{$areaAtuacao}', nome='{$nome}',
              numero='{$numero}', email='{$email}'
              WHERE id_contato={$idContato}";
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//alterarContato

  public function removerContatoCine($idContato)
  {
    $query = "Delete From contato_setor WHERE id_contato = {$idContato} AND 
              id_setor = (Select id_setor FROM setor_fundacao WHERE nome LIKE '%CINE%')";

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }//removerContato

}//Class