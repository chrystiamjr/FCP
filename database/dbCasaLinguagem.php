<?php

class dbCasaLinguagem
{
  private $conn;

  function __construct()
  {
    require 'dbConexao.php';
    $this->conn = conectar();
  }//construct

  // ----------------------------------------------------------------------------------------------------------------- //
  // Sessão EVENTOS //

  public function listarTodosEventosLinguagem()
  {
    $query = "Select id_evento,id_setor,nome,descricao,date_format(horario, '%d/%m/%Y %H:%i') as horario,preco from evento_casa_artes";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarTodosEventos

  public function listarUmEventoLinguagem($idEvento)
  {
    $query = "Select id_evento,id_setor,nome,descricao,date_format(horario, '%d/%m/%Y %H:%i') as horario,preco from evento_casa_linguagem WHERE id_evento={$idEvento}";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUmEvento

  public function cadastrarEventoLinguagem($nome, $descricao, $horario, $preco)
  {

    $query = "INSERT INTO 
              evento_casa_linguagem(id_setor, nome, descricao, horario,preco) 
              VALUES
              ((Select id_setor FROM setor_fundacao WHERE nome LIKE '%LINGUAGEM%'),
              '{$nome}', '{$descricao}', STR_TO_DATE('{$horario}','%d-%m-%Y %H:%i'), {$preco});";

//    die($query);
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//cadastrarEvento

  public function alterarEventoLinguagem($idEvento, $nome, $descricao, $horario, $preco)
  {
    $data = $this->listarUmEventoLinguagem($idEvento);
    $hr = $data[0]['horario'];

    if ($horario == $hr) {
      $query = "UPDATE evento_casa_linguagem SET nome='{$nome}', descricao='{$descricao}', preco={$preco}
                WHERE id_evento={$idEvento}";
    } else {
      $query = "UPDATE evento_casa_linguagem SET nome='{$nome}', descricao='{$descricao}', 
                horario=STR_TO_DATE('{$horario}','%d-%m-%Y %H:%i'), preco={$preco}
                WHERE id_evento={$idEvento}";
    }

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//alterarEvento

  public function removerEventoLinguagem($idEvento)
  {
    $query = "Delete From evento_casa_linguagem WHERE id_evento = {$idEvento}";
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }//removerEvento

  // ----------------------------------------------------------------------------------------------------------------- //
  // Sessão CONTATOS //

  public function listarTodosContatosLinguagem()
  {
    $query = "SELECT * FROM contato_setor WHERE id_setor=(Select id_setor FROM setor_fundacao WHERE nome LIKE '%LINGUAGEM%')";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarTodosContatos

  public function listarUmContatoLinguagem($idContato)
  {
    $query = "SELECT * FROM contato_setor WHERE id_contato={$idContato} AND
              id_setor=(Select id_setor FROM setor_fundacao WHERE nome LIKE '%LINGUAGEM%')";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUmContato

  public function cadastrarContatoLinguagem($areaAtuacao, $nome, $numero, $email)
  {
    $query = "INSERT INTO 
              contato_setor(id_setor, area_atuacao, nome, numero, email) 
              VALUES
              ((Select id_setor FROM setor_fundacao WHERE nome LIKE '%LINGUAGEM%'),
              '{$areaAtuacao}', '{$nome}', '{$numero}', '{$email}');";

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//cadastrarContato

  public function alterarContatoLinguagem($idContato, $areaAtuacao, $nome, $numero, $email)
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

  public function removerContatoLinguagem($idContato)
  {
    $query = "Delete From contato_setor WHERE id_contato = {$idContato} AND 
              id_setor = (Select id_setor FROM setor_fundacao WHERE nome LIKE '%LINGUAGEM%')";

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }//removerContato

}//Class