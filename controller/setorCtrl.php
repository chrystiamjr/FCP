<?php
include "../includes/uriFormater.php";
include_once '../database/dbSetor.php';
$setor = new dbSetor();

$sOP = $_POST['sOP'];

if ($sOP == "cadastro") {
  $arrayCadastro = filter_input_array(INPUT_POST);
  if (isset($arrayCadastro)) {
    $setor->cadastrarSetor(mb_strtoupper($arrayCadastro['nome']));
    header('Location: ' . $project . 'view/admin/setores/listar.php');
  } else {
    echo "Preencha todos os campos!";
  }//else
}//if

elseif ($sOP == "alteracao") {
  $arrayAlteracao = filter_input_array(INPUT_POST);
  if (isset($arrayAlteracao)) {
    $setor->alterarSetor($arrayAlteracao['idSetor'], mb_strtoupper($arrayAlteracao['nome']));
    header('Location: ' . $project . 'view/admin/setores/listar.php');
  } else {
    echo "Preencha todos os campos!";
  }//else
}//elseif

elseif ($sOP == "remocao") {
  $idRemocao = filter_input(INPUT_POST, 'idSetor');
  //  die($idRemocao);
  if (isset($idRemocao)) {
    $setor->removerSetor($idRemocao);
    header('Location: ' . $project . 'view/admin/setores/listar.php');
  } else {
    echo "Preencha todos os campos!";
  }//else
}//elseif