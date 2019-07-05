<?php

require_once("../../config/conexao.php");
require_once("../../config/config.php");

class ClienteController {

    protected $lastError = null;

    public function lastError(){
        return $this->lastError;
    }

    function post($dadosCliente){

        $this->lastError = null;

        if(empty($dadosCliente['biografia'])){
            $dadosCliente['biografia'] = null;
        }

        if(empty($dadosCliente['nome_cliente'])){
            $this->lastError = array(
                'erro' => "nome_cliente_obrigatorio",
                'msg' => "NOME OBRIGATÓRIO!"
            );
            return false;
        }

        if(empty($dadosCliente['email_cliente'])){
            $this->lastError = array(
                'erro' => "email_cliente_obrigatorio",
                'msg' => "EMAIL OBRIGATÓRIO!"
            );
            return false;
        }

        if(empty($dadosCliente['status'])){
            $this->lastError = array(
                'erro' => "status_obrigatorio",
                'msg' => "STATUS OBRIGATÓRIO!"
            );
            return false;
        }

        if(empty($dadosCliente['cpf'])){
            $this->lastError = array(
                'erro' => "cpf_obrigatorio",
                'msg' => "CPF OBRIGATÓRIO!"
            );
            return false;
        }

        if(Config::existeCpfCadastrado($dadosCliente['cpf']) > 0){
            $this->lastError = array(
                'erro' => "cpf_ja_existe",
                'msg' => "CPF JÁ CADASTRADO!"
            );
            return false;
        }
        
        if(Config::existeEmailCadastrado($dadosCliente['email_cliente']) > 0){
            $this->lastError = array(
                'erro' => "email_ja_existe",
                'msg' => "EMAIL JÁ CADASTRADO!"
            );
            return false;
        }

        $sql = ("INSERT INTO table_cliente 
                    (
                        `nome_cliente`,
                        `email_cliente`,
                        `biografia`,
                        `status`,
                        `cpf`
                    ) VALUES (
                        :nome_cliente,
                        :email_cliente,
                        :biografia,
                        :status,
                        :cpf
                    )
                ");
        
        $exec = Db::connection()->prepare($sql);
        $exec->bindValue(":nome_cliente", $dadosCliente['nome_cliente'], PDO::PARAM_STR);
        $exec->bindValue(":email_cliente", $dadosCliente['email_cliente'], PDO::PARAM_STR);
        $exec->bindValue(":biografia", $dadosCliente['biografia'], PDO::PARAM_STR);
        $exec->bindValue(":status", $dadosCliente['status'], PDO::PARAM_STR);
        $exec->bindValue(":cpf", $dadosCliente['cpf'], PDO::PARAM_STR);
        
        $r = $exec->execute();

        if(!$r){
            $this->lastError = "Instrução SQL FAIL!";
            return false;
        }

        return true;
    }

    function delete($id_cliente){

        $this->lastError = null;

        $sql = ("DELETE FROM table_cliente 
                    WHERE 
                        id_cliente = :id_cliente");

        $exec = Db::connection()->prepare($sql);
        $exec->bindValue(":id_cliente", $id_cliente, PDO::PARAM_INT);

        $r = $exec->execute();

        if(!$r){
            $this->lastError = "Erro ao deletar o cliente!";
            return false;
        }
        return true;
    }
}
