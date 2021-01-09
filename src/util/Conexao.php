<?php

require_once 'Config.php';

class Conexao
{
    public static function conectar()
    {
        try {
            if (CONEXAO_LOCAL) :
                $conexao = new PDO('mysql:host=' . HOST_LOCAL . ';dbname='. DB_LOCAL, USUARIO_LOCAL, SENHA_LOCAL);
            else :
                $conexao = new PDO('mysql:host=localhost;dbname=plugas91_comprebilhete', 'plugas91_plugasi', 'Swxaqz33');
            endif;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        return $conexao;
    }
}