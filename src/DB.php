<?php

require_once __DIR__ . '/../../config.php';

class DB
{
    private $db;
//    const STELL_TABLE = 'stell_table';

    public function __construct()
    {
        $host = DB_HOSTNAME;
        $db   = DB_DATABASE;
        $user = DB_USERNAME;
        $pass = DB_PASSWORD;
        $port = DB_PORT;
        $charset = 'utf8mb4';

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        try {
            $this->db = new \PDO($dsn, $user, $pass, $options);

            $this->db->query("
                CREATE TABLE IF NOT EXISTS `stell_migration` (
                `id` int(11) NOT NULL auto_increment,  
                  `udpate_name` varchar(250)  NOT NULL default '', 
                   PRIMARY KEY  (`id`)
                )
            ");
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getLastUpdate()
    {
        return $this->db->query("SELECT * FROM stell_migration ORDER BY id DESC LIMIT 1")->fetch();
    }
}