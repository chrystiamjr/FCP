<?php
include "../includes/uriFormater.php";
include_once '../database/dbCasaLinguagem.php';
$linguagem = new dbCasaLinguagem();

$view = (isset($_POST['view'])) ? $_POST['view'] : null ;

if ($view == 'public') {

  $tabela = $_POST['tabela'];

  if ($tabela == "evento") {
    $sOP = $_POST['sOP'];

    if ($sOP == "cadastro") {
      $arrayCadastro = filter_input_array(INPUT_POST);

      if (isset($arrayCadastro)) {
        $uploadFile = uploadImg($arrayCadastro['imgText'],$_FILES['imagem']);
        $horario = str_replace('/', '-', $arrayCadastro['horario']);
        $linguagem->cadastrarEventoLinguagem($arrayCadastro['nome'], $arrayCadastro['descricao'], $horario, $arrayCadastro['preco'], $uploadFile);
        header('Location: ' . $project . 'view/public/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      $data = $Linguagem->listarUmEventoLinguagem($arrayAlteracao['idEvento']);
      
      if (isset($arrayAlteracao) && isset($_FILES['imagem'])) {
        if(!empty($_FILES['imagem']['name']))
        {
          $uploadFile = uploadImg($arrayAlteracao['imgText'],$_FILES['imagem']);
        } else 
        {
          $uploadFile = $data[0]['imagem'];
        }
        $horario = str_replace('/', '-', $arrayAlteracao['horario']);
        $linguagem->alterarEventoLinguagem($arrayAlteracao['idEvento'], $arrayAlteracao['nome'], $arrayAlteracao['descricao'], $horario, $arrayAlteracao['preco'], $uploadFile);
        header('Location: ' . $project . 'view/public/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idEvento');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $linguagem->removerEventoLinguagem($idRemocao);
        header('Location: ' . $project . 'view/public/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif
  } // if tabela == evento

  elseif ($tabela == "contato") {
    $sOP = $_POST['sOP'];

    if ($sOP == "cadastro") {
      $arrayCadastro = filter_input_array(INPUT_POST);
      if (isset($arrayCadastro)) {
        $linguagem->cadastrarContatoLinguagem($arrayCadastro['areaAtuacao'], $arrayCadastro['nome'], $arrayCadastro['numero'], $arrayCadastro['email']);
        header('Location: ' . $project . 'view/public/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $linguagem->alterarcontatoLinguagem($arrayAlteracao['idContato'], $arrayAlteracao['areaAtuacao'], $arrayAlteracao['nome'], $arrayAlteracao['numero'], $arrayAlteracao['email']);
        header('Location: ' . $project . 'view/public/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idContato');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $linguagem->removercontatoLinguagem($idRemocao);
        header('Location: ' . $project . 'view/public/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif
  } // if tabela == contato

  // =========================================================== //

} else {
  $tabela = $_POST['tabela'];

  if ($tabela == "evento") {
    $sOP = $_POST['sOP'];

    if ($sOP == "cadastro") {
     $arrayCadastro = filter_input_array(INPUT_POST);

      if (isset($arrayCadastro)) {
        $uploadFile = uploadImg($arrayCadastro['imgText'],$_FILES['imagem']);
        $horario = str_replace('/', '-', $arrayCadastro['horario']);
        $linguagem->cadastrarEventoLinguagem($arrayCadastro['nome'], $arrayCadastro['descricao'], $horario, $arrayCadastro['preco'], $uploadFile);
        header('Location: ' . $project . 'view/admin/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      $data = $linguagem->listarUmEventoLinguagem($arrayAlteracao['idEvento']);
      
      if (isset($arrayAlteracao) && isset($_FILES['imagem'])) {
        if(!empty($_FILES['imagem']['name']))
        {
          $uploadFile = uploadImg($arrayAlteracao['imgText'],$_FILES['imagem']);
        } else 
        {
          $uploadFile = $data[0]['imagem'];
        }
        $horario = str_replace('/', '-', $arrayAlteracao['horario']);
        $linguagem->alterarEventoLinguagem($arrayAlteracao['idEvento'], $arrayAlteracao['nome'], $arrayAlteracao['descricao'], $horario, $arrayAlteracao['preco'], $uploadFile);
        header('Location: ' . $project . 'view/admin/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idEvento');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $linguagem->removerEventoLinguagem($idRemocao);
        header('Location: ' . $project . 'view/admin/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif
  } // if tabela == evento

  elseif ($tabela == "contato") {
    $sOP = $_POST['sOP'];

    if ($sOP == "cadastro") {
      $arrayCadastro = filter_input_array(INPUT_POST);
//    var_dump($arrayCadastro);
//    die();
      if (isset($arrayCadastro)) {
        $linguagem->cadastrarContatoLinguagem($arrayCadastro['areaAtuacao'], $arrayCadastro['nome'], $arrayCadastro['numero'], $arrayCadastro['email']);
        header('Location: ' . $project . 'view/admin/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $linguagem->alterarcontatoLinguagem($arrayAlteracao['idContato'], $arrayAlteracao['areaAtuacao'], $arrayAlteracao['nome'], $arrayAlteracao['numero'], $arrayAlteracao['email']);
        header('Location: ' . $project . 'view/admin/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idContato');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $linguagem->removercontatoLinguagem($idRemocao);
        header('Location: ' . $project . 'view/admin/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif
  } // if tabela == contato
}
