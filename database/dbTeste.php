<?php

class dbTeste
{

    private $conn;

    function __construct()
    {
        require 'dbConexao.php';
        $this->conn = conectar();
    }//construct

    public function listarTodos()
    {
        $query = "Select * from evento_setor";
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result != null && $result != false) {
            return $result;
        } else {
            return false;
        }
    }//listarTodos

    public function listarUm($idEvento)
    {
        $query = "Select * from evento_setor WHERE id_evento ={$idEvento}";
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null && $result != false) {
            return $result;
        } else {
            return false;
        }

    }//listarUm

    public function cadastrar($nome, $descricao, $horario, $preco)
    {
        $query = "Insert into evento_setor (nome,descricao,horario,preco) VALUES ('{$nome}','{$descricao}','{$horario}',{$preco})";
        $result = $this->conn->exec($query);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }//cadastrar

    public function alterar($idEvento, $nome, $descricao, $horario, $preco)
    {
        $query = "Update evento_setor set id_evento{$idEvento},nome ='{$nome}',descricao='{$descricao}',horario='{$horario}',preco={$preco}";
        $result = $this->conn->exec($query);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }//alterar

    public function remover($idEvento){
    $query = "Delete From evento_setor WHERE id_evento = {$idEvento}";
    $result = $this->conn->exec($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }//remover

}//Class