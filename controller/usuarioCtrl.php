<?php
include "../includes/uriFormater.php";
include_once '../database/dbUsuario.php';
$user = new dbUsuario();

$view = $_POST['view'];

if ($view == 'public') {

  $sOP = $_POST['sOP'];

  if ($sOP == "cadastro") {
    $arrayCadastro = filter_input_array(INPUT_POST);
    if (isset($arrayCadastro)) {
      $user->cadastrarUsuario(mb_strtoupper($arrayCadastro['nome']), $arrayCadastro['login'], $arrayCadastro['senha'], 1, $_SESSION['id_usuario'], $_SESSION['id_setor']);
      header('Location: ' . $project . 'view/public/usuarios/listar.php');
    } else {
      echo "Preencha todos os campos!";
    }//else
  }//if

  elseif ($sOP == "alteracao") {
    $arrayAlteracao = filter_input_array(INPUT_POST);
    if (isset($arrayAlteracao)) {
      $user->alterarUsuario($arrayAlteracao['idUsuario'],mb_strtoupper($arrayAlteracao['nome']),$arrayAlteracao['login'],$arrayAlteracao['senha']);
      header('Location: ' . $project . 'view/public/usuarios/listar.php');
    } else {
      echo "Preencha todos os campos!";
    }//else
  }//elseif

  elseif ($sOP == "remocao") {
    $idRemocao = filter_input(INPUT_POST, 'idUsuario');
    //  die($idRemocao);
    if (isset($idRemocao)) {
      $user->removerUsuario($idRemocao);
      header('Location: ' . $project . 'view/public/usuarios/listar.php');
    } else {
      echo "Preencha todos os campos!";
    }//else
  }//elseif

  // =========================================================== //

} else {
  $sOP = $_POST['sOP'];

  if ($sOP == "cadastro") {
    $arrayCadastro = filter_input_array(INPUT_POST);
    if (isset($arrayCadastro)) {
      $user->cadastrarUsuario(mb_strtoupper($arrayCadastro['nome']), $arrayCadastro['login'], $arrayCadastro['senha'], $arrayCadastro['tipo'], $arrayCadastro['gerente'], $arrayCadastro['setor']);
      header('Location: ' . $project . 'view/admin/usuarios/listar.php');
    } else {
      echo "Preencha todos os campos!";
    }//else
  }//if

  elseif ($sOP == "alteracao") {
    $arrayAlteracao = filter_input_array(INPUT_POST);
//    var_dump($arrayAlteracao);
    if (isset($arrayAlteracao)) {
      $user->alterarUsuario($arrayAlteracao['idUsuario'],mb_strtoupper($arrayAlteracao['nome']),$arrayAlteracao['login'],$arrayAlteracao['senha'],$arrayAlteracao['tipo'],$arrayAlteracao['gerente']);
      header('Location: ' . $project . 'view/admin/usuarios/listar.php');
    } else {
      echo "Preencha todos os campos!";
    }//else
  }//elseif

  elseif ($sOP == "remocao") {
    $idRemocao = filter_input(INPUT_POST, 'idUsuario');
//      die($idRemocao);
    if (isset($idRemocao)) {
      $user->removerUsuario($idRemocao);
      header('Location: ' . $project . 'view/admin/usuarios/listar.php');
    } else {
      echo "Preencha todos os campos!";
    }//else
  }//elseif
}