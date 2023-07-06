<?php
require_once ("conexion.php");
class ModeloCliente{
    public static function mdlGuardarCliente($tabla, $data)
    {
        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (cedula, nombre, apellidos, direccion, telefono, email)
        VALUES(:cedula, :nombre, :apellidos, :direccion, :telefono, :email)");
        $stm->bindParam(':cedula', $data['cedula'], PDO::PARAM_STR);
        $stm->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stm->bindParam(':apellidos', $data['apellidos'], PDO::PARAM_STR);
        $stm->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
        $stm->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $stm->bindParam(':email', $data['email'], PDO::PARAM_STR);
        if($stm->execute())
            return "ok";
        else
            return "error";
    }
    

    public static function mdlCargarCliente ($tabla){
        
      {
        $stm = conexion::conectar()->prepare("SELECT * FROM $tabla");
        $datos =$stm->fetchAll(); 
        return $datos; 

        $stm = conexion::conectar()->prepare("SELECT * FROM $tabla where id_cliente=:id_cliente");
        $stm->bindParam(':id_cliente', $id, PDO::PARAM_INT);
        $datos =$stm->fetch(); 
        return $datos; 
       }
    }
}