<?php

namespace app\database;

class DB
{

    public static function select($tabela, $dados = null, $comp = null)
    {
        $conn = Connection::getConn();

        if ($dados != null) :
            $sql = $conn->prepare("SELECT * FROM `$tabela` WHERE $dados $comp");
        else :
            $sql = $conn->prepare("SELECT * FROM `$tabela` $comp");
        endif;
        $sql->execute();

        return $sql;
    }
    public static function selectFull($query)
    {
        $conn = Connection::getConn();

        $sql = $conn->prepare($query);
        $sql->execute();

        return $sql;
    }
    public static function insert($tabela, $dados)
    {
        $conn = Connection::getConn();

        $sql = $conn->prepare("INSERT INTO `$tabela` SET $dados");
        $sql->execute();

        return $sql;
    }
    public static function update($tabela, $dados, $condicao)
    {
        $conn = Connection::getConn();

        if ($condicao != null) :
            $sql = $conn->prepare("UPDATE `{$tabela}` SET {$dados} WHERE {$condicao}");
        else :
            $sql = $conn->prepare("UPDATE `$tabela` SET $dados");
        endif;
        $sql->execute();

        return $sql;
    }
    public static function delete($tabela, $dados = null)
    {
        $conn = Connection::getConn();

        $sql = $conn->prepare("DELETE FROM `$tabela` WHERE $dados");
        $sql->execute();

        return $sql;
    }
    public static function count($tabela, $dados = null)
    {
        $conn = Connection::getConn();

        if ($dados != null) :
            $sql = $conn->prepare("SELECT * FROM `$tabela` WHERE $dados");
        else :
            $sql = $conn->prepare("SELECT * FROM `$tabela`");
        endif;
        $sql->execute();

        return $sql->rowCount();
    }
    public static function fetch($tabela, $dados = null, $complemento = null)
    {
        $conn = Connection::getConn();

        if ($dados != null) :
            $sql = $conn->prepare("SELECT * FROM `$tabela` WHERE $dados $complemento");
        else :
            $sql = $conn->prepare("SELECT * FROM `$tabela` $complemento");
        endif;
        $sql->execute();

        return $sql->fetch();
    }
}
