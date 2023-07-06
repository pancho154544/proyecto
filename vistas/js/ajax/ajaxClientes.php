<?php
require_once "../controladores/ctrlClientes";
require_once "../modelos/mdlClientes";

class ajaxClientes{
    public $idClientes;
    public function cargarDatos(){
        $tabla = "cliente";
        $parametro = "cliente";
        $id= $this->idClientes
        $datos ControladorClientes::ctrlCargarClientes($tabla);
        echo json_encode($datos);
        
    }
}

if(isset($_POST['idClientes'])){
    $objAjaxClientes = new ajaxClientes();
    $objAjaxClientes->idClientes = $_POST['idClientes'];
    if($_POST['edit']== 'edit'){
        $objAjaxClientes->cargarDatos();
    }else{
        #$objAjaxClientes->eliminarDatos();
    }

}
?>