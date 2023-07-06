<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de clientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Home</a></li>
                        <li class="breadcrumb-item active">Administración de clientes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content 
    Modal para el ingresode clientes-->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Crear Clientes</button>


            </div>
            <div class="card-body">
                <form method="POST">
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Crear Clientes</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cédula de identidad" name="cedula" id="cedula" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Nombres completos" name="nombre" id="nombre" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Apelidos completos" name="apellido" id="apellido" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Direccion" name="direccion" id="direccion" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-route"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" placeholder="Email" name="correo" id="correo" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <?php
                                    $objUsuario = new ControladorClientes();
                                    $objUsuario->crtlGuardarCliente(); 
                                    ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <!-- /.Tabla de clientes -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php                
              $datosClientes = $objUsuario->crtlCargarClientes(); 
                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>id_cliente</th>  
                  <th>cedula</th>
                    <th>nombre</th>
                    <th>apellidos</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>email</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php
                 $servername= "localhost";
                 $username="root";
                 $password="";
                 $database="tienda";
                   // foreach($datosClientes as $clientes){

                   $connection = new mysqli ($servername, $username, $password, $database);

              if($connection-> connect_error){
                die ("failed".$connection->connect_error);
              }

              $sql= "SELECT * FROM cliente";
              $result= $connection->query($sql);

              if(!$result){
                die ("invalid: " . $connection->error);
              }

              while ($row=$result->fetch_assoc()){

                echo"
                <tr>
                  <td>".$row["id_cliente"]." </td>
                  <td>".$row["cedula"]."  </td>
                  <td>".$row["nombre"]."  </td>
                  <td>".$row["apellidos"]."  </td>
                  <td>".$row["direccion"]."  </td>
                  <td>".$row["telefono"]."  </td>
                  <td>".$row["email"]."  </td>
                  <td>
                    <div class='btn btn_group'> 
                     <button class='btn btn-warning btnCargarDatos'idClientes='".$row["id_cliente"]."' data-toggle='modal' data-target='#ModalEditar'><i class='fas fa-edit'></i></button>
                     <button class='btn btn-danger'><i class='fas fa-trash-alt'></i></button>
                    </div>
                  
                  </td>
                </tr>";
 
              }
                  
        
                 
            ?>
            
                  </tfoot>
                 <!-- <th>id_cliente</th>  
                  <th>cedula</th>
                    <th>nombre</th>
                    <th>apellidos</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>email</th>-->
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <div>
                <form method="POST">
                    <div id="ModalEditar" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modificar Clientes</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cédula de identidad" name="editar_cedula" id="editar_cedula" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Nombres completos" name="editar_nombre" id="editar_nombre" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Apelidos completos" name="editar_apellido" id="editar_apellido" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Direccion" name="editar_direccion" id="editar_direccion" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-route"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Telefono" name="editar_telefono" id="editar_telefono" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" placeholder="Email" name="editar_correo" id="editar_correo" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Actulizar Datos</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <?php
                                    #codigo php para cargar datos al modal 
                                    ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->