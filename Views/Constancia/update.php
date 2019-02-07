<!--<script type="text/javascript" src="<?php echo BASE_URL;?>Assets/js/jspdf.min.js"></script>-->

<?php
require_once 'Views/header.php';
require_once 'Views/nav_bar.php';
?>

<script type="text/javascript">
	function cambiar()
	{

	}

	function fun(){ 
		//$('#placatractor').bind('input', BuscarPorUnidadYTexto);
	var placat=document.getElementById("placatractor").value;
	var placac=document.getElementById("placacisterna").value;
	var volumen=document.getElementById("volumen").value;
	
	if (placat != '' ){
	var base = "<?php echo BASE_URL;?>";
	
	$.ajax({
	    type: "POST",
	    url: base + "Constancia/Buscarplaca",
	    data:{
	        "placat" : placat,
	        "placac" : placac,
	        "volumen": volumen
	    },
	    success: function(data){
	        $("#archivo").html(data);
	    },
	    error: function(jqXHR, textStatus, errorThrown){
	        //if(textStatus === 'timeout'){alert('Failed from timeout');}
	        if (jqXHR.status === 0) {alert('Not connect: Verify Network: ' + textStatus);}
	        else if (jqXHR.status == 404) {alert('Requested page not found [404]');}
	        else if (jqXHR.status == 500) {alert('Internal Server Error [500].');}
	        else if (textStatus === 'parsererror') {alert('Requested JSON parse failed.');}
	        else if (textStatus === 'timeout') {alert('Time out error.');}
	        else if (textStatus === 'abort') {alert('Ajax request aborted.');}
	        else {alert('Uncaught Error: ' + jqXHR.responseText);}
	    },
	});
	}
		
	}
 
	function cargar_info(){

		var numeroguia_serie=document.getElementById("numeroguia_serie").value;
		var numeroguia_cliente=document.getElementById("numeroguia_cliente").value;
		var lista=document.getElementById("lista").value;
		var recorrido=document.getElementById("recorrido").value;
		var kilometraje=document.getElementById("kilometraje").value;
		var placatractor=document.getElementById("placatractor").value;
		var placacisterna=document.getElementById("placacisterna").value;
		var volumen=document.getElementById("volumen").value;

		var fechaentrega=document.getElementById("fechaentrega").value;
		var observacion=document.getElementById("observacion").value;
		var fechaprograma=document.getElementById("fechaprograma").value;
		
		var base = "<?php echo BASE_URL;?>";
		$.ajax({
		    type: "POST",
		    url: base + "Constancia/Guardar",
		    data:{
		        "numeroguia_serie" : numeroguia_serie,
		        "numeroguia_cliente" :numeroguia_cliente,
		        "lista":lista,
		        "recorrido":recorrido,
		        "kilometraje":kilometraje,
		        "placatractor":placatractor,
		        "placacisterna":placacisterna,
		        "volumen":volumen,
		        "fechaprograma":fechaprograma,
		        "fechaentrega":fechaentrega,
		        "observacion":observacion
		    },
		    success: function(data){
		        $("#constancia").html(data);
		    },
		    error: function(jqXHR, textStatus, errorThrown){
		        //if(textStatus === 'timeout'){alert('Failed from timeout');}
		        if (jqXHR.status === 0) {alert('Not connect: Verify Network: ' + textStatus);}
		        else if (jqXHR.status == 404) {alert('Requested page not found [404]');}
		        else if (jqXHR.status == 500) {alert('Internal Server Error [500].');}
		        else if (textStatus === 'parsererror') {alert('Requested JSON parse failed.');}
		        else if (textStatus === 'timeout') {alert('Time out error.');}
		        else if (textStatus === 'abort') {alert('Ajax request aborted.');}
		        else {alert('Uncaught Error: ' + jqXHR.responseText);}
		    }
		});
		
		}


		function funPCisterna()
		{
			var placatractor=document.getElementById("placatractor").value;
			var placa=document.getElementById("placacisterna").value;
			if (placa != ''){
			var base = "<?php echo BASE_URL;?>";
			$.ajax({
			    type: "POST",
			    url: base + "Constancia/BuscarplacaCisterna",
			    data:{
			        "placac" : placa,
			        "placat" :placatractor
			    },
			    success: function(data){
			        $("#archivo").html(data);
			    },
			    error: function(jqXHR, textStatus, errorThrown){
			        //if(textStatus === 'timeout'){alert('Failed from timeout');}
			        if (jqXHR.status === 0) {alert('Not connect: Verify Network: ' + textStatus);}
			        else if (jqXHR.status == 404) {alert('Requested page not found [404]');}
			        else if (jqXHR.status == 500) {alert('Internal Server Error [500].');}
			        else if (textStatus === 'parsererror') {alert('Requested JSON parse failed.');}
			        else if (textStatus === 'timeout') {alert('Time out error.');}
			        else if (textStatus === 'abort') {alert('Ajax request aborted.');}
			        else {alert('Uncaught Error: ' + jqXHR.responseText);}
			    },
			});
			}
		}

		function vaciar_cajas()
		{
			document.getElementById("dia").value='';
			document.getElementById("lugar").value='';
			document.getElementById("inicio").value='';
			document.getElementById("fin").value='';
			document.getElementById("excesovelocidad").value='';
		}

		function anadir_detalleconsta()
		{
			var dia=document.getElementById("dia").value;
			var lugar=document.getElementById("lugar").value;
			var inicio=document.getElementById("inicio").value;
			var fin=document.getElementById("fin").value;
			var excesovelocidad=document.getElementById("excesovelocidad").value;
			var idconstancia=document.getElementById("IdConstancia").value;
			document.getElementById("tabledetalleconstancia").insertRow(-1).innerHTML = "<td>"+dia+'</td><td>'+lugar+'</td><td>'+inicio+'</td><td>'+fin+'</td><td>'+excesovelocidad+'</td>';
			vaciar_cajas();
			var base = "<?php echo BASE_URL;?>";
			$.ajax({
		    type: "POST",
		    url: base + "Constancia/Detalle_guardar",
		    data:{
		        "dia" : dia,
		        "lugar" :lugar,
		        "inicio":inicio,
		        "fin":fin,
		        "excesovelocidad":excesovelocidad,
		        "idconstancia":idconstancia
		    },
		    success: function(data){
		        $("#constancia22").html(data);
		    },
		    error: function(jqXHR, textStatus, errorThrown){
		        //if(textStatus === 'timeout'){alert('Failed from timeout');}
		        if (jqXHR.status === 0) {alert('Not connect: Verify Network: ' + textStatus);}
		        else if (jqXHR.status == 404) {alert('Requested page not found [404]');}
		        else if (jqXHR.status == 500) {alert('Internal Server Error [500].');}
		        else if (textStatus === 'parsererror') {alert('Requested JSON parse failed.');}
		        else if (textStatus === 'timeout') {alert('Time out error.');}
		        else if (textStatus === 'abort') {alert('Ajax request aborted.');}
		        else {alert('Uncaught Error: ' + jqXHR.responseText);}
		    }
			});
			document.getElementById("IdConstancia").value=idconstancia;
		}

</script>


<script type="text/javascript">


function avisarUsuario() {
cargar_info();
var volumen=document.getElementById("volumen").value;
if(volumen!=0){
	var numeroguia_serie=document.getElementById("numeroguia_serie").value;
	var numeroguia_cliente=document.getElementById("numeroguia_cliente").value;
	var checklist=document.getElementById("lista").value;
	var placatractor=document.getElementById("placatractor").value;
	var placacisterna=document.getElementById("placacisterna").value;

	if (numeroguia_serie.length!=0 )
	{
		var i=document.getElementById("detalleconstancia").style = "";
		var botones = document.querySelectorAll('.form-control');
		for (var i=0; i<11; i++) {botones[i].disabled = true; }
		var i=document.getElementById("btn-guardar-todo").style = "";
		var i=document.getElementById("btn-guardar").style = "display: none";
	
	}
	else{
		alert("Inserte Serie");
	}
}
else{
			alert("No coincide la placa del cisterna");
		}
}

function guardandotodo(evObject)
{
	alert("pasa por aqui debe salir esto ");
	document.forms['formularioContacto'].submit();
}
////no se utiliza
function procesaelformulario() {document.forms['formularioContacto'].submit();}
window.onload = function () {
//document.forms['formularioContacto'].addEventListener('submit', avisarUsuario);
//document.forms['detalleconstanciaform'].addEventListener('submit', anadir_detalleconsta);
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<div class="container" >
	<div class="row">
	<div class="col-md-12">	
			<div class="card">
			<div class="card bg-info text-white">
				<h2><label>Nueva Constancia  </label></h2>
			</div>
			<div class="card-body bg-Light ">
            <div class="well well-sm" >
			<form  name ="formularioContacto" method="post"  action="<?php echo BASE_URL;?>Constancia" >
				<!--action="<?php echo BASE_URL;?>Constancia/Guardar/"-->
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
					<label >Serie :  </label><input  type="text" name="numeroguia_serie" id="numeroguia_serie" class="form-control" class="dropdown-toggle" placeholder="serie"  data-toggle="" title="Cantidad de digitos 4" pattern="[0-9]{4}" required >
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
					<label >Cliente :  </label><input type="text" name="numeroguia_cliente" id="numeroguia_cliente" class="form-control" placeholder="numcliente" required pattern="[0-9]{8}"  title="Cantidad de digitos 8" >
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
						<label>Checklist </label><input type="checkbox" name="lista" id="lista" class="form-control" value="1" required >
						</div>
					</div>

					<div class="col-md-2" >
						<div class="form-group">
						<label>Recorrido</label><input type="number" name="recorrido" id="recorrido" class="form-control" required min=0.00000000000000000000000000000000000000000000000000000000000000001 >
						</div>
					</div>
					<div class="col-md-2" >
						<div class="form-group">
						<label>Kilometraje</label><input type="number" name="kilometraje" id="kilometraje" class="form-control" required min=0.00000000000000000000000000000000000000000000000000000000000000001 >
						</div>
					</div>
				</div>

				

				<div class="row" id="archivo">
					<div class="col-md-2">
						<div class="form-group">
					<label >Tractor :  </label><input type="text" id="placatractor" name="placatractor" class="form-control" placeholder="placa" onBlur="fun();" required > 
						</div>
					</div>
					<div class="col-md-2">
						<label class="text">  Cisterna : </label>
						<input type="text" name="placacisterna" id="placacisterna" class="form-control" placeholder="placa" required onBlur="funPCisterna();" >
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<label>Volumen  </label><input type="number" name="volumen" id="volumen" disabled class="form-control"  required id ="volumen" value="0">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha Programada </label>
						<input type="date" name="fechaprograma" id ="fechaprograma" class="form-control" value="<?php echo date('Y-m-d');?>" required >
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha de Carga </label><input type="date" name="fechaentrega" id="fechaentrega" class="form-control" value="<?php echo date('Y-m-d');?>" required >
						</div>
					</div>
									
				</div>
				<div class="row">
					<div class="col-md-12">
						<!--<div class="form-group">-->
						<label>Observacion</label>
						<textarea rows="5" maxlength="400" name="observacion" id="observacion" class="form-control" placeholder="¿Cambio de conductor?" ></textarea>
						<!--
						<label>Observaciones </label><input type="text" name="fechaentrega" id="fechaentrega" class="form-control" required >
						</div>-->
					</div>
				</div>
				<br/>
				<div class="row" id="btn_constancia">
					<div class="col-md-2">
					<input type="submit" value="Guardar" class="btn btn-primary" id="btn-guardar" style="" onclick="avisarUsuario(); return false " ><!--onclick="cargar_info(); return false "-->
					</div>
					
				</div>
				</form>
			
			</div>
			</div>
			</div>

			<!--<form name ="guardartodoformulario" method="post"  >-->
			<div class="card">
				<div class="row">
					<div class="col-md-12">	
						<div class="card-body" style="display: none" id="btn-guardar-todo">
						<form method="post"  action="<?php echo BASE_URL;?>Constancia" >
						<input type="submit" class="btn btn-primary" value="Guardar Todo"  >
						</form>
						</div>
					</div>
				</div>
			</div>
			<!--</form>-->
			<div id="constancia" >
        	<input type="hidden" id="IdConstancia"  name="IdConstancia"  value="">
       		</div>
       		<div id="constancia22" >
       		</div>
			<br>
			<div style="display: none"  id="detalleconstancia">
			<div class=" card" >
				<div class="card bg-info text-white">
					<h3 style ="text-align:left;" ;> Nuevo Detalle</h3>
				</div>

				<div class="card-body" >
				<form method="post" id="detalleconstanciaform">
                <div class="content">
                    <div class="row" >
                    	<div class="col-md-2">
                    		<label>Dias</label>
                    		<select class="form-control" name="dia" id="dia">
                    			<?php $i=0;
                                    while($i<31 ){ ?>
                                        <option value="<?php echo $i; ?> " > <?php echo $i; ?>  </option>
                                                <?php $i=$i+1;?>
                                <?php } ?>
                    		</select>
                    	</div>

                    	<div class="col-md-2">
                    		<label>Lugar </label><input type="text"  class="form-control"  name="lugar" id="lugar" required>
                    	</div>

                    	<div class="col-md-2">
                    		<label>Inicio </label><input type="text"  class="form-control" name="inicio" required id="inicio">
                    	</div>
                    	<!--arreglar para futuros riesgos -->
                    	<div class="col-md-2">
                    		<label>Fin </label><input type="text" class="form-control" name="fin" id="fin" required >
                    	</div>

                    	<div class="col-md-2">
                    		<label>Exceso de Velocidad </label><input type="number"  class="form-control" name="excesovelocidad" id="excesovelocidad" required >
                    	</div>

                    	<div class="col-md-2">
                    		<br>
                    		<input type="button" value="Añadir" onclick="anadir_detalleconsta(); return false; " class="btn btn-primary"  >
                    	</div>
					</div>
					
					 
					<br>
					<br>
                        <div class="content table-responsive table-full-width">
                            <table id="tabledetalleconstancia" class="table table-hover table-striped">
                                <thead><!--esto tambien da textura-->
                                    <th>Dia</th>
                                  	<th>Lugar</th>
                                  	<th>Inicio</th>
                                  	<th>Fin</th>
                                  	<th>Excesodevelocidad</th>
                                </thead>

                            </table>
                        </div>
                    </div>
                	</form>
            </div>
        	</div>
            </div>
            
	</div>
	</div>
</div>


<script type="text/javascript">
/*
$('#placatractor').bind('input', BuscarPorUnidadYTexto);


function BuscarPorUnidadYTexto()
{
        alert('Ingrese '); 
}*/
</script>
