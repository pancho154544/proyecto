<?php
class ControladorClientes{
    //Función para recibir los datos para guardar cliente
    public function crtlGuardarCliente(){
        
        if (isset($_POST['cedula']) &&
            isset($_POST['nombre']) &&
            isset($_POST['apellido']) &&
            isset($_POST['direccion']) &&
            isset($_POST['telefono']) &&
            isset($_POST['correo'])){
                
                $tabla ="cliente";
                $data = array('cedula' => $_POST['cedula'],
                             'nombre' => $_POST['nombre'],
                             'apellidos' => $_POST['apellido'],
                             'direccion' => $_POST['direccion'],
                             'telefono' => $_POST['telefono'],
                             'email' => $_POST['correo']);
                
                $res = ModeloCliente::mdlGuardarCliente($tabla, $data);
                if($res == 'ok'){
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title: "¡Datos de cliente guardados Correctamente...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "cliente";
                        }
                    })
                  </script>';
                } else{
                    echo '<script>
                    Swal.fire({
                        icon:"error",
                        title: "¡Datos de cliente no se puden ser guardados...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "cliente";
                        }
                    })
                  </script>';

                }
            }
    }

//Funcion para cargar fatos del cliente 
    public function crtlCargarClientes(){
        $tabla = "cliente";
        $datosCliente= ModeloCliente::mdlCargarCliente($tabla);
        return $datosCliente;
    }
}