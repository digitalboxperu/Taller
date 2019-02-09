<!--<script type="text/javascript" src="<?php echo BASE_URL;?>Assets/js/jspdf.min.js"></script>-->

<?php
require_once 'Views/header.php';
require_once 'Views/nav_bar.php';
?>

<script type="text/javascript">
	var cantidad_carros=1;
	function get_cisterna()
	{
		var placat=document.getElementById("placatractor").value;
		var base = "<?php echo BASE_URL;?>";
		var variable="cisterna";
		$.ajax({
		    type: "POST",
		    url: base + "Constancia/Buscarplaca",
		    data:{
		        "placat" : placat
		    },
		    success: function(data){
		        $("#"+variable).html(data);
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

	function get_cisterna_subitems(variable)
	{
		//id_canti"cisterna_elemento"+cantidad_carros
		//var variable=document.getElementById().value;
		variable="cisterna"+cantidad_carros;
		alert(variable);
		var placat=document.getElementById("placatractor").value;
		var base = "<?php echo BASE_URL;?>";
		$.ajax({
		    type: "POST",
		    url: base + "Constancia/Buscarplaca",
		    data:{
		        "placat" : placat
		    },
		    success: function(data){
		        $("#"+variable).html(data);
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
		var recorrido=document.getElementById("recorrido").value;
		var placatractor=document.getElementById("placa_tractor").value;
		var placacisterna=document.getElementById("placacisterna").value;
		var fechaentrega=document.getElementById("fechaentrega").value;
		var observacion=document.getElementById("observacion").value;
		var fechaprograma=document.getElementById("fechaprograma").value;
		var id_update=document.getElementById("id_update").value;
		
	
		var base = "<?php echo BASE_URL;?>";
		$.ajax({
		    type: "POST",
		    url: base + "Constancia/Guardar",
		    data:{
		        "numeroguia_serie" : numeroguia_serie,
		        "numeroguia_cliente" :numeroguia_cliente,
		        "recorrido":recorrido,
		        "placatractor":placatractor,
		        "placacisterna":placacisterna,
		        "fechaprograma":fechaprograma,
		        "fechaentrega":fechaentrega,
		        "observacion":observacion,
		        "Id":id_update
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

		function ShowSelected()
		{
			/* Para obtener el valor */
			var cod = document.getElementById("producto").value;
			//alert(cod);
			 
			/* Para obtener el texto */
			var combo = document.getElementById("producto");
			var selected = combo.options[combo.selectedIndex].text;
			//alert(selected);
		}
		/*
		window.onload = function(){
		   //Aquí referenciamos el botón que realizara la acción
		   var btnAdd = document.getEmentById("btn_agregar");
		   
		   //Aquí solo mandamos llamar la función 
		   btnAdd.onclick = crearDin;
		}*/
</script>


<script type="text/javascript">


function avisarUsuario() {
	cargar_info();
	var numeroguia_serie=document.getElementById("numeroguia_serie").value;
	var numeroguia_cliente=document.getElementById("numeroguia_cliente").value;
	//var checklist=document.getElementById("lista").value;
	//var placatractor=document.getElementById("placatractor").value;
	//var placacisterna=document.getElementById("placacisterna").value;
	if (numeroguia_serie.length!=0 )
	{
		var i=document.getElementById("detalleconstancia").style = "";
		var botones = document.querySelectorAll('.form-control');
		for (var i=0; i<10; i++) {botones[i].disabled = true; }
		var i=document.getElementById("btn-guardar-todo").style = "";
		var i=document.getElementById("btn-guardar").style = "display: none";
	}
	else{
		alert("Inserte Serie");
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

function crearDin(){
	
   //aquí instanciamos al componente padre
   //var padre = document.createElement("padre");
   //aquí agregamos el componente de tipo input
 //  var input = document.createElement("INPUT");
   //aquí indicamos que es un input de tipo text
   //input.type = 'text';
   
   //y por ultimo agreamos el componente creado al padre
   //padre.appendChild(input);
   // Crear nodo de tipo Element
/*
var parrafo = document.createElement("p");
	
// Crear nodo de tipo Text
var contenido = document.createTextNode("Hola Mundo!");
	
// Añadir el nodo Text como hijo del nodo tipo Element
parrafo.appendChild(contenido);*/
	//var contenedor = document.getElementById("container");
	//contenedor.appendChild(input);
 }


$(document).ready(function(){
	$('#anadircarroconstancia').click(function()
	{
		//var detalleToAppend='<h1>Hola mundo</h1>';
		cantidad_carros=cantidad_carros+1;
		
		var valor="cisterna"+cantidad_carros;
		alert(valor);
		var detalleToAppend ='';
		detalleToAppend+='<div class="col-md-2">';
		detalleToAppend+='<label >SerieGR: </label>';
		detalleToAppend+='<input list="seriegr" name="lista_serie[]"  placeholder="Buscarplaca" id="serieguiaremitente" class="form-control"/>																	<datalist id="seriegr" ><?php foreach ($this->model->Listarbyserie_viaje() as $r ) :?><option value="<?php echo $r->seriegr ?>"  ></option> <?php endforeach ?>
				</datalist>';
		detalleToAppend+='</div>';
		detalleToAppend+='<input type="hidden" name="lista_id[]" id="id_update" value="<?php if(isset($_REQUEST['Id'])){echo $constancia->id;} else {echo "-1"; }?>">';
		detalleToAppend+='<div class="col-md-2">';
		detalleToAppend+='<div class="form-group">';
		detalleToAppend+='<label >NumGR :  </label>';
		detalleToAppend+='<input list="todonumgr" name="lista_numgr[]" placeholder="Pongaplaca" id="numeroguiaremitente" class="form-control" />';
		detalleToAppend+='<datalist id="todonumgr">';
		detalleToAppend+='<?php foreach ($this->model->Listarbynumero_viaje() as $r ) :?>
			                    <option value="<?php echo $r->numerogr ?>"></option><?php endforeach ?>';
		detalleToAppend+='</datalist>';
		detalleToAppend+='</div>';
		detalleToAppend+='</div>';
		detalleToAppend+='<div class="col-md-2" >';
		detalleToAppend+='<div class="form-group">';
		detalleToAppend+='<label>Recorrido</label><input type="number" name="lista_recorrido[]" id="recorrido" class="form-control" required min=0.00000000000000000000000000000000000000000000000000000000000000001  value="<?php if(isset($_REQUEST['Id'])){echo $constancia->recorrido;} ?>">';
		detalleToAppend+='</div>';
		detalleToAppend+='</div>';
		detalleToAppend+='<input type="hidden" id="cisterna_elemento'+cantidad_carros+'" value='+valor+' />';
		detalleToAppend+='<div class="col-md-3">';
		detalleToAppend+='<div class="form-group">';
		detalleToAppend+='<label>Tractor : </label>';
		detalleToAppend+='<php $valor='+valor+' ?>';
		detalleToAppend+='<input list="todo1" placeholder="placatractor" name="lista_placatractor[]" id="placatractor" class="form-control" onblur="get_cisterna_subitems()"; return false;" />';
		detalleToAppend+='<datalist id="todo1">';
		detalleToAppend+='<?php foreach ($this->model->listar_tractores() as $r ) :?>
				                   <option value="<?php echo $r->placa;?>" name="<?php echo $r->id;?>" ></option>';
		detalleToAppend+='<?php endforeach ?>';
		detalleToAppend+='</datalist>';
		detalleToAppend+='</div>';
		detalleToAppend+='</div>';
		
		detalleToAppend+='<div class="class"></div>';
		detalleToAppend+='<div class="col-md-3" id="cisterna'+cantidad_carros+'">';
		detalleToAppend+='<label >Cisterna:</label>';
		detalleToAppend+='<input list="todocisternas" placeholder="placatractor" id="placacisterna" class="form-control" name="lista_cisterna[]" />';
		detalleToAppend+='<datalist id="todocisternas">';
		detalleToAppend+='<?php foreach ($this->model->listar_cisternas() as $r ) :?>
			                   <option value="<?php echo $r->placa;?>"></option>';
		detalleToAppend+='<?php endforeach ?>';
		detalleToAppend+='</datalist>';
		detalleToAppend+='<input type="hidden" name="lista_volumen[]" id="volumen" value="" >';
		detalleToAppend+='<input type="hidden" name="lista_idcisterna[]" id="idcisterna" value="" >';
		detalleToAppend+='</div>';
		detalleToAppend+='</div>';
		$('#container22').append(detalleToAppend);
	});
});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<div class="container" >
	<div class="row">
	<div class="col-md-12">	
			<div class="card">
			<div class="card bg-info text-white">
				<div class="row">
					<div class="col-md-4">
					<h2><label>Nueva Constancia  </label></h2>
					</div>
				<!--<input type="button" class="glyphicon glyphicon-plus" >-->
					<div class="col-md-2">
					<button class="btn btn-warning"  id="anadircarroconstancia">
						<h4>AñadirCarro</h4>
					</button>
					</div>
				</div>
			</div>
			<div class="card-body bg-Light ">
            <div class="well well-sm" >
			<form  name ="formularioContacto" method="post"  action="<?php echo BASE_URL;?>Constancia/Guardar/" >
				<div class="row"  ">
					<div class="col-md-2">
						<label >SerieGR:  </label>
						<input list="seriegr" name="lista_seriegr[]" placeholder="Buscarplaca" id="serieguiaremitente" class="form-control"/>
						<datalist id="seriegr" >
						<?php foreach ($this->model->Listarbyserie_viaje() as $r ) :?>
		                    <option value="<?php echo $r->seriegr ?>"  ></option>
		                  <?php endforeach ?>
						</datalist>
					</div>
					<input type="hidden" name="lista_id[]" id="id_update" value="<?php if(isset($_REQUEST['Id'])){echo $constancia->id;} else {echo "-1"; }?>" />

					<div class="col-md-2">
						<div class="form-group">
						<label >NumGR :  </label>
			            <input list="todonumgr" name="lista_numgr[]" placeholder="Pongaplaca" id="numeroguiaremitente" class="form-control" />
							<datalist id="todonumgr">
							<?php foreach ($this->model->Listarbynumero_viaje() as $r ) :?>
			                    <option value="<?php echo $r->numerogr ?>"></option>
			                  <?php endforeach ?>
							</datalist>
						</div>
					</div>

					<!--
					<div class="col-md-2">
						<div class="form-group">

							<label >SerieGRT:  </label>
		            		<input list="todo" placeholder="serieguiaremitentet" id="numeroguiaremitente" class="form-control" />
							<datalist id="todo">
							<?php foreach ($this->model->Listarbyserie_viajeT() as $r ) :?>
			                    <option value="<?php echo $r->seriegrt ?>"></option>
			                  <?php endforeach ?>
							</datalist>
						</div>
					</div>
					<input type="hidden" name="id_update" id="id_update" value="<?php if(isset($_REQUEST['Id'])){echo $constancia->id;} else {echo "-1"; }?>">

					<div class="col-md-2">
						<div class="form-group">
					<label >NumGRT:  </label>
					
		             <input list="todo" placeholder="numeroguiaremitentet" id="numeroguiaremitente" class="form-control" />
							<datalist id="todo">
							<?php foreach ($this->model->Listarbynumero_viajeT() as $r ) :?>
			                    <option value="<?php echo $r->seriegrt ?>"></option>
			                  <?php endforeach ?>
							</datalist>

						</div>
					</div>
				-->
					<!--
					<div class="col-md-2">
						<div class="form-group">
						<label>Checklist </label><input type="checkbox" name="lista" id="lista" class="form-control" value="1" required  <?php if(isset($_REQUEST['Id'])){ if($constancia->checklist){echo 'checked'; } }?> >
						</div>
					</div>
					-->
					<div class="col-md-2" >
						<div class="form-group">
						<label>Recorrido</label><input type="number" name="lista_recorrido[]" id="recorrido" class="form-control" required min=0.00000000000000000000000000000000000000000000000000000000000000001  value="<?php if(isset($_REQUEST['Id'])){echo $constancia->recorrido;} ?>">
						</div>
					</div>
					<!--<div class="row" id="archivo">-->
						<div class="col-md-3">
							<div class="form-group">
			                <label >Tractor :  </label>
							<input list="todo1" placeholder="placatractor" name="lista_placatractor[]" id="placatractor" class="form-control" onblur="get_cisterna(); return false;" />
								<datalist id="todo1">
								<?php foreach ($this->model->listar_tractores() as $r ) :?>
				                   <option value="<?php echo $r->placa;?>" name="<?php echo $r->id;?>" ></option>
				                   <!--<?php echo $r->placa ?>-->
				                  <?php endforeach ?>
								</datalist>
							</div>
						</div>
						<div class="class"></div>
						<div class="col-md-3" id="cisterna">						
							<label >Cisterna:</label>
							<input list="todocisternas" name="lista_cisterna[]" placeholder="placatractor" id="placacisterna" class="form-control"  />
							<datalist id="todocisternas">
							<?php foreach ($this->model->listar_cisternas() as $r ) :?>
			                   <option value="<?php echo $r->placa;?>"></option>
			                   <!--<?php echo $r->placa ?>-->
			                  <?php endforeach ?>
							</datalist>
							<input type="hidden" name="lista_volumen[]" id="volumen" value="" >
							<input type="hidden" name="lista_idcisterna[]" id="idcisterna" value="" >
						</div>
					<!--</div>-->


					<!--
					<div class="col-md-2" >
						<div class="form-group">
						<label>Kilometraje</label><input type="number" name="kilometraje" id="kilometraje" class="form-control" required min=0.00000000000000000000000000000000000000000000000000000000000000001 value="<?php if(isset($_REQUEST['Id'])){echo $constancia->kilometraje;} ?>">
						</div>
					</div>
					-->
				</div>

				<div class="row" id="nextfila">
					
				</div>
				<div class="row" id="container22">
					
				</div>
					<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha Programada </label>
						<input type="date" name="fechaprograma" id ="fechaprograma" class="form-control" required value="<?php if(isset($_REQUEST['Id'])){echo $constancia->fechaprg;} else {echo date('Y-m-d');} ?>" >
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha de Carga </label><input type="date" name="fechaentrega" id="fechaentrega" class="form-control" value="<?php if(isset($_REQUEST['Id'])){echo $constancia->fechacarga;} else {echo date('Y-m-d');} ?>" required >
						</div>
					</div>
					</div>				
				<!--</div>-->
				
				<div class="row">
					<div class="col-md-12">
						<!--<div class="form-group">-->
						<label>Observacion</label>
						<textarea rows="5" maxlength="400" name="observacion" id="observacion" class="form-control" placeholder="¿Cambio de conductor?" ><?php if(isset($_REQUEST['Id'])){echo $constancia->observacion ;} ?> </textarea>
						<!--
						<label>Observaciones </label><input type="text" name="fechaentrega" id="fechaentrega" class="form-control" required >
						</div>-->
					</div>
				</div>
				<br/>
				
				<div class="row" id="btn_constancia">
					<div class="col-md-2">
					<input type="submit" value="Guardar" class="btn btn-primary" id="btn-guardar" style=""  ><!-- onclick="avisarUsuario(); return false " onclick="cargar_info(); return false "-->
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
                    			<?php $i=1;
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
