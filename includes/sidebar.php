<?php

if(isset($_SESSION['tipo_usuario'])){
  if($_SESSION['tipo_usuario'] == '0'){
    include 'sidebarAdmin.php';
  } else {
    include 'sidebarUser.php';
  }
}
