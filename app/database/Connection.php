<?php

namespace app\database;

abstract class Connection
{

    private static $conn;

    static function getConn()
    {

        if (self::$conn == null) :
            try {
                self::$conn = new \PDO("mysql:host=" . configsDB['DBHOST'] . ";dbname=" . configsDB['DBNAME'] . ";charset=" . configsDB['CHARSET'] . "", configsDB['DBUSER'], configsDB['DBPASS']);
                self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            } catch (\PDOException $e) {
                echo '<center><h2>Falha ao se conectar com o banco de dados! <br><span style="color:red">' . $e->getMessage();
            }
        endif;

        return self::$conn;
    }
}
