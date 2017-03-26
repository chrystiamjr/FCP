<?php
include "../includes/uriFormater.php";
include_once '../database/dbCasaArtes.php';
$artes = new dbCasaArtes();

$view = (isset($_POST['view'])) ? $_POST['view'] : null ;

if ($view == 'public') {

  $tabela = $_POST['tabela'];

  if ($tabela == "evento") {
    $sOP = $_POST['sOP'];

    if ($sOP == "cadastro") {
      $arrayCadastro = filter_input_array(INPUT_POST);

      if (isset($arrayCadastro)) {
        uploadImg($arrayCadastro['imgText'],$_FILES['imagem']);
        $horario = str_replace('/', '-', $arrayCadastro['horario']);
        $artes->cadastrarEventoArtes($arrayCadastro['nome'], $arrayCadastro['descricao'], $arrayCadastro['oficina'], $horario, $arrayCadastro['preco']);
        header('Location: ' . $project . 'view/public/casaArtes/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      $data = $artes->listarUmEventoArtes($arrayAlteracao['idEvento']);
      
      if (isset($arrayAlteracao) && isset($_FILES['imagem'])) {
        if(!empty($_FILES['imagem']['name']))
        {
          $uploadFile = uploadImg($arrayAlteracao['imgText'],$_FILES['imagem']);
        } else 
        {
          $uploadFile = $data[0]['imagem'];
        }
        $horario = str_replace('/', '-', $arrayAlteracao['horario']);
        $artes->alterarEventoArtes($arrayAlteracao['idEvento'], $arrayAlteracao['nome'], $arrayAlteracao['descricao'], $arrayAlteracao['oficina'], $horario, $arrayAlteracao['preco']);
        header('Location: ' . $project . 'view/public/casaArtes/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idEvento');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $artes->removerEventoArtes($idRemocao);
        header('Location: ' . $project . 'view/public/casaArtes/eventos/listar.php');
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
        $artes->cadastrarContatoArtes($arrayCadastro['areaAtuacao'], $arrayCadastro['nome'], $arrayCadastro['numero'], $arrayCadastro['email']);
        header('Location: ' . $project . 'view/public/casaArtes/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $artes->alterarcontatoArtes($arrayAlteracao['idContato'], $arrayAlteracao['areaAtuacao'], $arrayAlteracao['nome'], $arrayAlteracao['numero'], $arrayAlteracao['email']);
        header('Location: ' . $project . 'view/public/casaArtes/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idContato');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $artes->removercontatoArtes($idRemocao);
        header('Location: ' . $project . 'view/public/casaArtes/contatos/listar.php');
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
        $artes->cadastrarEventoArtes($arrayCadastro['nome'], $arrayCadastro['descricao'], $arrayCadastro['oficina'], $horario, $arrayCadastro['preco'],$uploadFile);
        header('Location: ' . $project . 'view/admin/casaArtes/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      $data = $artes->listarUmEventoArtes($arrayAlteracao['idEvento']);
      
      if (isset($arrayAlteracao) && isset($_FILES['imagem'])) {
        if(!empty($_FILES['imagem']['name']))
        {
          $uploadFile = uploadImg($arrayAlteracao['imgText'],$_FILES['imagem']);
        } else 
        {
          $uploadFile = $data[0]['imagem'];
        }
        $horario = str_replace('/', '-', $arrayAlteracao['horario']);
        $artes->alterarEventoArtes($arrayAlteracao['idEvento'], $arrayAlteracao['nome'], $arrayAlteracao['descricao'], $arrayAlteracao['oficina'], $horario, $arrayAlteracao['preco'], $uploadFile);
        header('Location: ' . $project . 'view/admin/casaArtes/eventos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idEvento');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $artes->removerEventoArtes($idRemocao);
        header('Location: ' . $project . 'view/admin/casaArtes/eventos/listar.php');
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
        $artes->cadastrarContatoArtes($arrayCadastro['areaAtuacao'], $arrayCadastro['nome'], $arrayCadastro['numero'], $arrayCadastro['email']);
        header('Location: ' . $project . 'view/admin/casaArtes/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//if

    elseif ($sOP == "alteracao") {
      $arrayAlteracao = filter_input_array(INPUT_POST);
      if (isset($arrayAlteracao)) {
        $artes->alterarcontatoArtes($arrayAlteracao['idContato'], $arrayAlteracao['areaAtuacao'], $arrayAlteracao['nome'], $arrayAlteracao['numero'], $arrayAlteracao['email']);
        header('Location: ' . $project . 'view/admin/casaArtes/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif

    elseif ($sOP == "remocao") {
      $idRemocao = filter_input(INPUT_POST, 'idContato');
      //  die($idRemocao);
      if (isset($idRemocao)) {
        $artes->removercontatoArtes($idRemocao);
        header('Location: ' . $project . 'view/admin/casaArtes/contatos/listar.php');
      } else {
        echo "Preencha todos os campos!";
      }//else
    }//elseif
  } // if tabela == contato
}