<?php
//echo "Sesion".isset($_SESSION);
if(!isset($_SESSION)) { 
    session_start(); 
}
 
require_once 'Core/database.php';
//$controller = 'constancia';
$controller = 'home';

require_once("Core/base_url.php");
$base_=new base_url();
$base_->baseurl();

// Todo esta lógica hara el papel de un FrontController
//echo "REQUEST".isset($_REQUEST['c']);
if(!isset($_REQUEST['c']))
{
    require_once "Controllers/$controller"."Controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{

    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
   //$_REQUEST['a']="Crud"
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    // Instanciamos el controlador
  
    require_once "Controllers/$controller"."Controller.php";
    
    $controller = ucwords($controller) . 'Controller';
    
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>
<!--<div class="container">
	<div class="row">
	<div class="col-md-12">
            <div class="well well-sm">
			<h1><label>Nuevo Constancia  </label></h1>
			<form  action="recibir_dato.php" method="GET" >
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
					<label >Numero de guia :  </label><input type="text" name="numeroguia" class="form-control" placeholder="serie-numcliente">
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
					<label >Tractor :  </label><input type="text" name="numeroguia" class="form-control" placeholder="placa">
						</div>
					</div>

					<div class="col-md-2">
						<label class="text">  Cisterna : </label>
						<input type="text" name="cisterna" class="form-control" placeholder="placa">
					</div>

					<div class="col-md-2">
						<div class="form-group">
						<label>Volumen  </label><input type="number" name="volumen" class="form-control"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
					<label>Recorrido  </label><input type="number" name="recorrido" class="form-control" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
					<label>Kilometraje </label><input type="number" name="Kilometraje" class="form-control" min="2000" placeholder="kilometros" >
						</div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha Programada </label>
						<input type="date" name="fechaprograma" class="form-control" value="<?php echo date("Y-m-d");?>" >
						<select></select>
					</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
					<label>Fecha Carga </label><input type="date" name="fechaentrega" class="form-control" value="<?php echo date("Y-m-d");?>" >
						</div>
					</div>
					
				</div>
				<input type="submit" value="Enviar" class="btn btn-primary">
			</form>
			</div>
	</div>
	</div>
</div>
-->
<!--
<div clas="content">
	<div class="row">
		<div class="col-md-12">
            <div class="well well-sm">
            	 <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>
                        	<div class="form-group">
							<label ><h3>Placa</h4></label><input class="form-control" type="text" name="nombre" id="user">		
							</div>
                        
                    </fieldset>
                </form>
            </div>
         </div>
	</div>
</div>
-->


<!--
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="card">
		<div class="content crud">
		<div class="content">
					<div class="row">
						<div class="col-md-6">
							<h4 class="title">
								<center><h2>Nuevo Vehiculo</h2></center>
							</h4>    
						</div>
					</div>
		</div>
		<form class="form-horizontal" action="recibir_dato.php" method="get" enctype="multipart/form-date" >
			<div >
				<div class="row"> 
					<div class="col-md-5">
						<div class="form-group">
							<label ><h3>Placa</h4></label><input class="form-control" type="text" name="nombre" id="user">		
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label><h3>Certifica</h4></label><input type="text" name="nombre" id="user">		
						</div>
					</div>
				</div>
				<br>
				<div class="row"> 
					<label><h3>Confvehi</h3></label><input type="text" name="etiqueta2">
					<br>
					<label><h3>Color</h3></label><input type="text" name="etiqueta1">
				</div>
				<div class="row"> 
					<label><h3>Anio</h3></label><input type="text" name="etiqueta2">
					<br>
					<label><h3>Capacidad</h3></label><input type="text" name="etiqueta1">
				</div>
				<div class="row"> 
					<label><h3>ID</h3></label><input type="text" name="etiqueta2">
					<br>
					<label><h3>Marca</h3></label><input type="text" name="etiqueta1">
				</div>
				<div class="row"> 
					<label><h3>Tipo</h3></label><input type="text" name="etiqueta2">
					<br>
					<label><h3>Marca</h3></label><input type="text" name="etiqueta1">
				</div>
				<input type="submit" value="Enviar">
				</center>
			</div>
		</form>
		</div>
	</div>
	</div>
	</div>
</div>
-->
<!-- jQuery library -->
