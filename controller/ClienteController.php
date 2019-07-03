<?php

require_once("../../config/conexao.php");

class ClienteController{

    protected $lastError = null;

    public function lastError(){
        return $this->lastError;
    }

    function post($dadosCliente){

        $this->lastError = null;
       
        // if ($dadosCliente['biografia'] === "") { }
        if(empty($dadosCliente['biografia'])){
            $dadosCliente['biografia'] = null;
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



}