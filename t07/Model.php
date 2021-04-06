<?php

    include 'DatabaseConnection.php';

    abstract class Model {

        public function __construct($table) {

            $this->setTable($table);
            $this->setConnection();

        }

        protected function setTable($table) {

            $this->table = $table;

        }

        protected function setConnection() {

            $this->connection = new DatabaseConnection('127.0.0.1', NULL, 'alyannoy', 'securepass', 'ucode_web');

        }

        abstract protected function find($id);
        abstract protected function save();
        abstract protected function delete();
        
    }

?>