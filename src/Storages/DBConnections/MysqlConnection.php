<?php
/**
 * Date: 19.04.20
 * Time: 17:14
 */

namespace KSS\Storages\DBConnections;


class MysqlConnection
{
    protected $instance;

    protected $dbHost;
    protected $dbPort;
    protected $dbName;
    protected $dbUser;
    protected $dbPassword;

    public function __construct(string $dbHost, int $dbPort, string $dbName, string $dbUser, $dbPassword)
    {
       $this->dbHost = $dbHost;
       $this->dbPort = $dbPort;
       $this->dbName = $dbName;
       $this->dbUser = $dbUser;
       $this->dbPassword = $dbPassword;
    }

    /**
     * Get Mysql connection instance by db config array
     *
     * @return MysqlConnection
     */
    public function getInstance(): \PDO {
        if(!isset($this->instance)) {
            try {
                $this->instance = new \PDO("mysql:host=". $this->dbHost .';port='.$this->dbPort
                    .';dbname='.$this->dbName,$this->dbUser, $this->dbPassword);
                $this->instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->instance->query('SET NAMES utf8');
                $this->instance->query('SET CHARACTER SET utf8');
            } catch(PDOException $error) {
                echo $error->getMessage();
            }
        }

        return $this->instance;
    }
}