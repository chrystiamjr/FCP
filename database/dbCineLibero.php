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

  protected function formatarDbUrl($img){
    $url = ( ( ( count(explode('/', $img)) ) > 1 ) ? explode('/', $img) : explode('\\',$img) );
    if(substr($img,0,15) == "C:\\xampp\\htdocs"){
      $imagem = '/'.$url[3].'/'.$url[4].'/'.$url[5]; 
    } elseif (($url[1].'/'.$url[3]) == "home/public_html"){
      $imagem = '/'.$url[4].'/'.$url[5].'/'.$url[6];
    }
    return $imagem;
  }

  public function listarTodosEventosCine()
  {
    $query = "Select id_evento,id_setor,nome,descricao,programacao_regular,projetos,
              date_format(horario, '%d/%m/%Y %H:%i') as horario,preco,imagem
              from evento_cinema";
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
    $query = "Select id_evento,id_setor,nome,descricao,programacao_regular,projetos,
              date_format(horario, '%d/%m/%Y %H:%i') as horario,preco,imagem
              from evento_cinema
              WHERE id_evento={$idEvento}";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUmEvento

  public function cadastrarEventoCine($nome, $descricao, $progRegular, $projetos, $horario, $preco, $imagem)
  {
    $imagem = $this->formatarDbUrl($imagem);
    $query = "INSERT INTO
              evento_cinema(id_setor, nome, descricao, programacao_regular, projetos, horario,preco, imagem)
              VALUES
              ((Select id_setor FROM setor_fundacao WHERE nome LIKE '%CINE%'),
              '{$nome}', '{$descricao}', '{$progRegular}', '{$projetos}',STR_TO_DATE('{$horario}','%d-%m-%Y %H:%i'), '{$preco}', '{$imagem}');";

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//cadastrarEvento

  public function alterarEventoCine($idEvento, $nome, $descricao, $progRegular, $projetos, $horario, $preco, $imagem)
  {
    $data = $this->listarUmEventoCine($idEvento);
    $hr = $data[0]['horario'];
    $imagem = $this->formatarDbUrl($imagem);

    if ($horario == $hr) {
      $query = "UPDATE evento_cinema SET nome='{$nome}', descricao='{$descricao}', programacao_regular='{$progRegular}',
              projetos='{$projetos}', preco='{$preco}', imagem='{$imagem}'
              WHERE id_evento={$idEvento}";
    } else {
      $query = "UPDATE evento_cinema SET nome='{$nome}', descricao='{$descricao}', programacao_regular='{$progRegular}',
              projetos='{$projetos}', horario=STR_TO_DATE('{$horario}','%d-%m-%Y %H:%i'), preco='{$preco}', imagem='{$imagem}'
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
