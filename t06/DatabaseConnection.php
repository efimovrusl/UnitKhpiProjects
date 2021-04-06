<?php

    class DatabaseConnection {

        public function __construct($host, $port, $username, $password, $database) {

            $this->connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        }

        public function __destruct() {

            $this->connection = null;

        }

        public function getConnectionStatus() {

            return isset($this->connection) ? true : false;

        }

    }

    $test = new DatabaseConnection('127.0.0.1', NULL, 'alyannoy', 'securepass', 'ucode_web');
    echo $test->getConnectionStatus();

?>