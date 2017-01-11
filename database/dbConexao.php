<?php

function conectar(){
    try{
        $conexao = new PDO('mysql:host=localhost;dbname=db_fcp;charset=utf8', 'root','');
        #Favor, nao esquecer de modificar os parametros do DB.
        return $conexao;
    }
    catch (Exception $erro){
        echo "Falha na conexao!";
        return false;
    }
}//function
