<?php

function conectar()
{
  try {
//    $conexao = new PDO('mysql:host=mysql.hostinger.com.br;dbname=u841648456_dbfcp;charset=utf8', 'u841648456_fcp', '@fcpadmin123');
    $conexao = new PDO('mysql:host=localhost;dbname=db_fcp;charset=utf8', 'root', 'root');
    #Favor, nao esquecer de modificar os parametros do DB.
    return $conexao;
  } catch (PDOException $erro) {
    echo "Falha na conexao! : " . $erro;
    return false;
  }
}//function
