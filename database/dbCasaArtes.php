<?php

class dbCasaArtes
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

  public function listarTodosEventosArtes()
  {
    $query = "Select id_evento,id_setor,nome,descricao,oficina,date_format(horario, '%d/%m/%Y %H:%i') as horario,preco,imagem from evento_casa_artes";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarTodosEventos

  public function listarUmEventoArtes($idEvento)
  {
    $query = "Select id_evento,id_setor,nome,descricao,oficina,date_format(horario, '%d/%m/%Y %H:%i') as horario,preco,imagem from evento_casa_artes WHERE id_evento={$idEvento}";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUmEvento

  public function cadastrarEventoArtes($nome, $descricao, $ofina, $horario, $preco, $imagem)
  {
    $imagem = $this->formatarDbUrl($imagem);
    $query = "INSERT INTO 
              evento_casa_artes(id_setor, nome, descricao, oficina, horario, preco, imagem) 
              VALUES
              ((Select id_setor FROM setor_fundacao WHERE nome LIKE '%ARTES%'),
              '{$nome}', '{$descricao}', '{$ofina}', STR_TO_DATE('{$horario}','%d-%m-%Y %H:%i'), '{$preco}', '{$imagem}');";
              // die($query);

//    die($query);
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//cadastrarEvento

  public function alterarEventoArtes($idEvento, $nome, $descricao, $ofina, $horario, $preco, $imagem)
  {
    $data = $this->listarUmEventoArtes($idEvento);
    $hr = $data[0]['horario'];
    $imagem = $this->formatarDbUrl($imagem);

    if ($horario == $hr) {
      $query = "UPDATE evento_casa_artes SET nome='{$nome}', descricao='{$descricao}', oficina='{$ofina}', preco='{$preco}', imagem='{$imagem}'
                WHERE id_evento={$idEvento}";
    } else {
      $query = "UPDATE evento_casa_artes SET nome='{$nome}', descricao='{$descricao}', oficina='{$ofina}', 
                horario=STR_TO_DATE('{$horario}','%d-%m-%Y %H:%i'), preco='{$preco}', imagem='{$imagem}'
                WHERE id_evento={$idEvento}";
    }

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//alterarEvento

  public function removerEventoArtes($idEvento)
  {
    $query = "Delete From evento_casa_artes WHERE id_evento={$idEvento}";
    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }//removerEvento

  // ----------------------------------------------------------------------------------------------------------------- //
  // Sessão CONTATOS //

  public function listarTodosContatosArtes()
  {
    $query = "SELECT * FROM contato_setor WHERE id_setor=(Select id_setor FROM setor_fundacao WHERE nome LIKE '%ARTES%')";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }
  }//listarTodosContatos

  public function listarUmContatoArtes($idContato)
  {
    $query = "SELECT * FROM contato_setor WHERE id_contato={$idContato} AND
              id_setor=(Select id_setor FROM setor_fundacao WHERE nome LIKE '%ARTES%')";
    $stmt = $this->conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result != null && $result != false) {
      return $result;
    } else {
      return false;
    }

  }//listarUmContato

  public function cadastrarContatoArtes($areaAtuacao, $nome, $numero, $email)
  {
    $query = "INSERT INTO 
              contato_setor(id_setor, area_atuacao, nome, numero, email) 
              VALUES
              ((Select id_setor FROM setor_fundacao WHERE nome LIKE '%ARTES%'),
              '{$areaAtuacao}', '{$nome}', '{$numero}', '{$email}');";

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }

  }//cadastrarContato

  public function alterarContatoArtes($idContato, $areaAtuacao, $nome, $numero, $email)
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

  public function removerContatoArtes($idContato)
  {
    $query = "Delete From contato_setor WHERE id_contato = {$idContato} AND 
              id_setor = (Select id_setor FROM setor_fundacao WHERE nome LIKE '%ARTES%')";

    $result = $this->conn->exec($query);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }//removerContato

}//Class