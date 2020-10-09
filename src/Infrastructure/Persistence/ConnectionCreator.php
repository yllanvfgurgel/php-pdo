<?php

namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator {

    public static function createConnection(): PDO {

        $databasePath = __DIR__ . '/../../../banco.sqlite';
        $connection = new PDO('sqlite:'.$databasePath);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Modo de mostrar um erro quando ocorrer algo de errado na persistência dos arquivos (esse modo já será o padrão a partir do PHP 8)
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, pdo::FETCH_ASSOC);

        return $connection;
        
    }

}