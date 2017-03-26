<?php
include "../includes/uriFormater.php";
include_once '../database/dbCineLibero.php';
$cine = new dbCineLibero();

$view = $_POST['view'];

if ($view == 'public') {

  $tabela = $_POST['tabela'];

  if ($tabela == "evento") {
    $sOP = $_POST['sOP'];

    if ($sOP == "cadastro") {
      $arrayCadastro = filter_input_array(INPUT_POST);

      if (isset($arrayCadastro)) {
        $uploadFile = uploadImg($arrayCadastro['imgText'],$_FILES['imagem']);
        $horario = str_replace('/', '-', $arrayCadastro['horario']);
        $cine->cadastrarEventoCine($arrayCadastro['nome'], $arrayCadastro['descricao'], $arrayCadastro['progRegular'], $arrayCadastro['projeto'], $horario, $arrayCadastro['preco'], $uploadFile);
        header('Location: ' . $project . 'view/public/cineLibero/eventos/listar.php');
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
        $cine->alterarEventoCine($arrayAlteracao['idEvento'], $arrayAlteracao['nome'], $arrayAlteracao['descricao'], $arrayAlteracao['progRegular'], $arrayAlteracao['projeto'], $horario, $arrayAlteracao['preco'], $uploadFile);
        header('Location: ' . $project . 'view/public/cineLibero/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idEvento');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $cine->removerEventoCine($idRemocao);
        header('Location: ' . $project . 'view/public/cineLibero/eventos/listar.php');
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
        $cine->cadastrarContatoCine($arrayCadastro['areaAtuacao'], $arrayCadastro['nome'], $arrayCadastro['numero'], $arrayCadastro['email']);
        header('Location: ' . $project . 'view/public/cineLibero/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $cine->alterarcontatoCine($arrayAlteracao['idContato'], $arrayAlteracao['areaAtuacao'], $arrayAlteracao['nome'], $arrayAlteracao['numero'], $arrayAlteracao['email']);
        header('Location: ' . $project . 'view/public/cineLibero/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idContato');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $cine->removercontatoCine($idRemocao);
        header('Location: ' . $project . 'view/public/cineLibero/contatos/listar.php');
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
        $cine->cadastrarEventoCine($arrayCadastro['nome'], $arrayCadastro['descricao'], $arrayCadastro['progRegular'], $arrayCadastro['projeto'], $horario, $arrayCadastro['preco'] ,$uploadFile);
        header('Location: ' . $project . 'view/admin/cineLibero/eventos/listar.php');
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
        $cine->alterarEventoCine($arrayAlteracao['idEvento'], $arrayAlteracao['nome'], $arrayAlteracao['descricao'], $arrayAlteracao['progRegular'], $arrayAlteracao['projeto'], $horario, $arrayAlteracao['preco'] ,$uploadFile);
        header('Location: ' . $project . 'view/admin/cineLibero/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idEvento');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $cine->removerEventoCine($idRemocao);
        header('Location: ' . $project . 'view/admin/cineLibero/eventos/listar.php');
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
        $cine->cadastrarContatoCine($arrayCadastro['areaAtuacao'], $arrayCadastro['nome'], $arrayCadastro['numero'], $arrayCadastro['email']);
        header('Location: ' . $project . 'view/admin/cineLibero/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $cine->alterarcontatoCine($arrayAlteracao['idContato'], $arrayAlteracao['areaAtuacao'], $arrayAlteracao['nome'], $arrayAlteracao['numero'], $arrayAlteracao['email']);
        header('Location: ' . $project . 'view/admin/cineLibero/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idContato');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $cine->removercontatoCine($idRemocao);
        header('Location: ' . $project . 'view/admin/cineLibero/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif
  } // if tabela == contato
}