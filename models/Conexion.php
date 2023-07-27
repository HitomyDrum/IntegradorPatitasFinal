<?php

error_reporting(0);
session_start();

class Conexion {

    public $con;
    public function __construct() {
        $this -> con = new mysqli("localhost", "root", "", "db_patitas");
    }
    
    public function getUsers() {
        $query = $this->con->query('SELECT * FROM clientes');

        $retorno = [];

        $i = 0;
        while($fila = $query->fetch_assoc()) {
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    public function getPets($dni) {
        $query = $this->con->query("SELECT * FROM mascotas WHERE DNI_CLI = '$dni'");

        $retorno = [];

        $i = 0;
        while($fila = $query->fetch_assoc()) {
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    public function getCitas() {
        $query = $this->con->query('SELECT * FROM cita');

        $retorno = [];

        $i = 0;
        while($fila = $query->fetch_assoc()) {
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    public function getAllPets() {
        $query = $this->con->query("SELECT * FROM mascotas;");

        $retorno = [];

        $i = 0;
        while($fila = $query->fetch_assoc()) {
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    public function registerUsers($correo, $pass, $nombres, $apellidos, $celular, $dir, $dni) {
        try {
            $queryTxt = "INSERT INTO `clientes` (`DNI_CLI`, `NOM_CLI`, `APE_CLI`, `EMAIL_CLI`, `PASS_CLI`, `TELF_CLI`, `DIR_CLI`, `FECH_REGISTRO`, `TIPO_CLI`) VALUES ('$dni', '$nombres', '$apellidos', '$correo', '$pass', '$celular', '$dir', '2023-05-18', '');";
            $query = $this->con->query($queryTxt);

            # $mensaje_error = "Registro Exitoso!";
            if ($query) {
                $mensaje_error = "El registro se ha insertado correctamente.";
            } else {
                $mensaje_error = "Error al insertar el registro.";
            }
        } catch (Exception $e) {
            $mensaje_error = "Hubo un error con la base de datos! - $e";
        }

        return $mensaje_error;
    }

    public function actualizarUsers($correo, $pass, $nombres, $apellidos, $celular, $dir, $dni) {
        try {
            $queryTxt = "UPDATE `clientes` SET `EMAIL_CLI` = '$correo', `PASS_CLI` = '$pass', `NOM_CLI` = '$nombres', `APE_CLI` = '$apellidos', `TELF_CLI` = '$celular', `DIR_CLI` = '$dir' WHERE `clientes`.`DNI_CLI` = '$dni';";
            $query = $this->con->query($queryTxt);

            $mensaje_error = "Datos actualizados!";

        } catch (Exception $e) {
            $mensaje_error = "Hubo un error con la base de datos! - $e";
        }

        return $mensaje_error;
    }

    public function registerPets($tipo, $nombre, $edad, $raza, $color, $dni) {
        try {
            $queryTxt = "INSERT INTO `mascotas` (`TIPO_PET`, `NAME_PET`, `EDAD_PET`, `RAZA_PET`, `COLOR_PET`, `DNI_CLI`) VALUES ('$tipo', '$nombre', '$edad', '$raza', '$color', '$dni');";
            $query = $this->con->query($queryTxt);

            $mensaje_error = "Registro de mascota exitosa!";
        } catch (Exception $e) {
            $mensaje_error = "Hubo un error con la base de datos! - $e";
        }

        return $mensaje_error;
    }

    public function registerCita($coment_cita, $id_pet) {
        try {
            $queryTxt = "INSERT INTO `cita` (`FECH_CITA`, `COMENT_CITA`, `ID_PET`) VALUES ('', '$coment_cita', '$id_pet');";
            $query = $this->con->query($queryTxt);

            $mensaje_error = "Registro de cita exitosa!";
        } catch (Exception $e) {
            $mensaje_error = "Hubo un error con la base de datos! - $e";
        }

        return $mensaje_error;
    }

}

?>