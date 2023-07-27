<?php

    require('../../models/Conexion.php');

    class Esteticas {
        public $con;
        public function __construct() {
            $this -> con = new Conexion();
        }

        public function getAllAesthetic() {
            
            $query = $this->con->con->query('SELECT * FROM esteticas');
    
            $retorno = [];
    
            $i = 0;
            while($fila = $query->fetch_assoc()) {
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
    }
    echo "go";
?>