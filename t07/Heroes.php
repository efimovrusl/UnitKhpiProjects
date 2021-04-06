<?php

    include 'Model.php';

    class Heroes extends Model {

        public $id;
        public $name;
        public $description;
        public $race;
        public $class_role;

        public function __construct() {

            parent::__construct('Heroes');

        }

        public function find($id) {

            if ($this->connection->getConnectionStatus()) {

                $sql = 'SELECT * FROM '.$this->table.' WHERE id =  '.$id;

                $table = $this->connection->connection->query($sql);
                $table_arr = $table->fetch(PDO::FETCH_ASSOC);

                if ($table_arr) {

                    $this->id = $table_arr['id'];
                    $this->name = $table_arr['name'];
                    $this->description = $table_arr['description'];
                    $this->race = $table_arr['race'];
                    $this->class_role = $table_arr['class_role']; 

                    echo    'id: '.$this->id."\n".
                            'name: '.$this->name."\n".
                            'description: '.$this->description."\n".
                            'race: '.$this->race."\n".
                            'class_role: '.$this->class_role."\n";

                }

            }

        }

        public function save() {

            if ($this->connection->getConnectionStatus()) {

                $sql = 'SELECT id, name FROM ' . $this->table . ' WHERE id = ' . $this->id;

                $table = $this->connection->connection->query($sql);
                $table_arr = $table->fetch(PDO::FETCH_ASSOC);

                if (!$table_arr['name']) {

                    $sql = "INSERT INTO heroes (id, name, description, race, class_role) 
                            VALUES ($this->id, '$this->name', '$this->description', '$this->race', '$this->class_role')";

                    $stmt = $this->connection->connection->prepare($sql);
                    $stmt->execute();

                } else {

                    $sql = "UPDATE heroes 
                            SET id = $this->id, 
                            name = '$this->name', 
                            description = '$this->description', 
                            race = '$this->race', 
                            class_role = '$this->class_role '
                            WHERE id = $this->id";

                    $exec = $this->connection->connection->prepare($sql);
                    $exec->execute();

                }
            }

        }

        public function delete() {

            if ($this->connection->getConnectionStatus()) {

                $sql = 'SELECT id FROM '.$this->table.' WHERE id = '.$this->id;

                $table = $this->connection->connection->query($sql);
                $table_arr = $table->fetch(PDO::FETCH_ASSOC);

                if ($table_arr['id']) {

                    $sql = 'DELETE FROM '.$this->table.' WHERE id = '.$this->id;

                    $exec = $this->connection->connection->prepare($sql);
                    $exec->execute();

                    $this->id = null;
                    $this->name = null;
                    $this->description = null;
                    $this->race = null;
                    $this->class_role = null;

                }

            }

        }

    }

?>