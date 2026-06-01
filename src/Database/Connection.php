<?php
namespace App\Database;

use PDO;

class Connection {
    
    /**
     * Executa a conexão com o bando de dados MySQL por meio da extensão PDO.
     * @return PDO
     **/
    public static function get() {
        $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true
        );
        
        return new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    }
}
