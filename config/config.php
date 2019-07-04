<?php 

class Config { 

    public static function existeCpfCadastrado($cpf)
    {
        $sql = ("SELECT * FROM table_cliente 
                    WHERE 
                        cpf = :cpf");

        $exec = Db::connection()->prepare($sql);
        $exec->bindValue(":cpf", $cpf, PDO::PARAM_STR);
        $exec->execute();

        return $exec->rowCount();
    }

    public static function existeEmailCadastrado($email)
    {

    }

}