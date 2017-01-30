<?php
include "../includes/uriFormater.php";
include_once '../database/dbCasaLinguagem.php';
$linguagem = new dbCasaLinguagem();

$view = $_POST['view'];

if ($view == 'public') {

  $tabela = $_POST['tabela'];

  if ($tabela == "evento") {
    $sOP = $_POST['sOP'];

    if ($sOP == "cadastro") {
      $arrayCadastro = filter_input_array(INPUT_POST);
      if (isset($arrayCadastro)) {
        $horario = str_replace('/', '-', $arrayCadastro['horario']);
        $linguagem->cadastrarEventoArtes($arrayCadastro['nome'], $arrayCadastro['descricao'], $horario, $arrayCadastro['preco']);
        header('Location: ' . $project . 'view/public/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $horario = str_replace('/', '-', $arrayAlteracao['horario']);
        $linguagem->alterarEventoArtes($arrayAlteracao['idEvento'], $arrayAlteracao['nome'], $arrayAlteracao['descricao'], $horario, $arrayAlteracao['preco']);
        header('Location: ' . $project . 'view/public/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idEvento');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $linguagem->removerEventoArtes($idRemocao);
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
//    var_dump($arrayCadastro);
//    die();
      if (isset($arrayCadastro)) {
        $linguagem->cadastrarContatoArtes($arrayCadastro['areaAtuacao'], $arrayCadastro['nome'], $arrayCadastro['numero'], $arrayCadastro['email']);
        header('Location: ' . $project . 'view/public/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $linguagem->alterarcontatoArtes($arrayAlteracao['idContato'], $arrayAlteracao['areaAtuacao'], $arrayAlteracao['nome'], $arrayAlteracao['numero'], $arrayAlteracao['email']);
        header('Location: ' . $project . 'view/public/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idContato');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $linguagem->removercontatoArtes($idRemocao);
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
        $horario = str_replace('/', '-', $arrayCadastro['horario']);
        $linguagem->cadastrarEventoArtes($arrayCadastro['nome'], $arrayCadastro['descricao'], $horario, $arrayCadastro['preco']);
        header('Location: ' . $project . 'view/admin/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $horario = str_replace('/', '-', $arrayAlteracao['horario']);
        $linguagem->alterarEventoArtes($arrayAlteracao['idEvento'], $arrayAlteracao['nome'], $arrayAlteracao['descricao'], $horario, $arrayAlteracao['preco']);
        header('Location: ' . $project . 'view/admin/casaLinguagem/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idEvento');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $linguagem->removerEventoArtes($idRemocao);
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
        $linguagem->cadastrarContatoArtes($arrayCadastro['areaAtuacao'], $arrayCadastro['nome'], $arrayCadastro['numero'], $arrayCadastro['email']);
        header('Location: ' . $project . 'view/admin/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $linguagem->alterarcontatoArtes($arrayAlteracao['idContato'], $arrayAlteracao['areaAtuacao'], $arrayAlteracao['nome'], $arrayAlteracao['numero'], $arrayAlteracao['email']);
        header('Location: ' . $project . 'view/admin/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idContato');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $linguagem->removercontatoArtes($idRemocao);
        header('Location: ' . $project . 'view/admin/casaLinguagem/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif
  } // if tabela == contato
}
