<?php

class Db
{

    protected static $conexao = null;

    public static function connection()
    {

        try {
            if (self::$conexao === null) {
                self::$conexao = new PDO("mysql:host=localhost;dbname=curso;", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            }
            return self::$conexao;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
