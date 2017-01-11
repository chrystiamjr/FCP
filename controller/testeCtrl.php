<?php
include_once '../database/dbTeste.php';
$teste = new dbTeste();

$sOP = $_POST['sOP'];

if ($sOP == "cadastro"){

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $horario = $_POST['horario'];
    $preco = $_POST['preco'];
    if ($nome != null && $descricao != null && $horario != null && $preco != null){
        $teste->cadastrar($nome,$descricao,$horario,$preco);
        echo "Dados Cadastrados!";
    }else{
        echo "Preencha todos os campos!";
    }//else


}//if