<?php

class model {

    protected $db;

    public function __construct() {
        global $config;

        switch (drive) {
            case 'sqlvr':
                try {
                    $driver = 'DRIVER={SQL Server};SERVER=' . $config['host'] . ';DATABASE=' . $config['dbname'];
                    $this->db = odbc_connect($driver, $config['user'], $config['pass']);
                } catch (PDOException $e) {
                    exit('Erro ao conectar no Banco de Dados SQL Server: ' . $e->getMessage());
                }
                break;
            case 'mysql':
                try {
                    $this->db = new PDO('mysql:dbname=' . $config['dbname'] . ';charset=utf8;host=' . $config['host'], $config['user'], $config['pass']);
                    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    exit('Erro ao conectar no Banco de Dados Mysql: ' . $e->getMessage());
                }
                break;
            case 'oracle':
                try {
                    $this->db = new PDO('oci:dbname=' . $config['host'], $config['user'], $config['pass']);
                    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    exit('Erro ao conectar no Banco de Dados Oracle: ' . $e->getMessage());
                }
                break;
        }
    }

}

?>