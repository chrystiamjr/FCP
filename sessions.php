<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['action']) && !empty($_POST['action'])) {
  switch ($_POST['action']) {

    case 'loginAdmin' :
      $_SESSION['tipo_usuario'] = $_POST['tipo_usuario'];
      echo "inset";
      break;

    case 'loginUser' :
      $_SESSION['id_usuario'] = $_POST['id'];
      $_SESSION['nome_usuario'] = $_POST['nome'];
      $_SESSION['id_setor'] = $_POST['setor'];
      $_SESSION['tipo_usuario'] = $_POST['tipo_usuario'];
      echo "inset";
      break;

    case 'logoutAdmin' :
      unset($_SESSION['tipo_usuario']);
      echo "reset";
      break;

    case 'logoutUser' :
      unset($_SESSION['id_usuario']);
      unset($_SESSION['nome_usuario']);
      unset($_SESSION['id_setor']);
      unset($_SESSION['tipo_usuario']);
      echo "reset";
      break;
  }
}

