<!--<script type="text/javascript" src="<?php echo BASE_URL;?>Assets/js/jspdf.min.js"></script>-->



<script type="text/javascript">

	function fun(){
		//$('#placatractor').bind('input', BuscarPorUnidadYTexto);
	
	var placa=document.getElementById("placatractor").value;
	if (placa != ''){
	var base = "<?php echo BASE_URL;?>";
	alert(placa);
	$.ajax({
	    type: "POST",
	    url: base + "Constancia/Buscarplaca",
	    data:{
	        "words" : placa
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
 


</script>


<script type="text/javascript">



function avisarUsuario(evObject) {
alert("llego acas chevere");
evObject.preventDefault();

var botones = document.querySelectorAll('.form-control');

for (var i=0; i<8; i++) {botones[i].disabled = true; }

//var nuevoNodo = document.createElement('h2');
//nuevoNodo.innerHTML = '<h2 style="color:orange;">Enviando... espere por favor</h2>';
var i=document.getElementById("btn_guardatodo").style = "";
var i=document.getElementById("detalleconstancia").style = "";
/*
var nuevoNodo = document.createElement("button");
//document.body.appendChild(boton);
nuevoNodo.innerHTML = '<div class="container"> <div class="row"><div class="col-md-12"> <button type="button" class="btn btn-primary">GuardarTodo</button></div></div></div>';
document.body.appendChild(nuevoNodo);*/

if (nuevoNodo.addEventListener) {
    nuevoNodo.addEventListener('click', procesaelformulario, false);
} else {
    nuevoNodo.attachEvent('onclick', procesaelformulario);
}


//var retrasar = setTimeout(procesaDentroDe2Segundos, 2000);

}

 

function procesaelformulario() {document.forms['formularioContacto'].submit();}
window.onload = function () {

document.forms['formularioContacto'].addEventListener('submit', avisarUsuario);

}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<div class="container">
	<div class="row">
	<div class="col-md-12">
            <div class="well well-sm">
			<h1><label>Nuevo Constancia  </label></h1>
			<form  name ="formularioContacto" method="post" action="<?php echo BASE_URL;?>Constancia/Guardar/" >
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
					<label >Serie :  </label><input  type="number" name="numeroguia_serie" id="numeroguia" class="form-control" placeholder="serie">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
					<label >Cliente :  </label><input type="number" name="numeroguia_cliente" id="numeroguia" class="form-control" placeholder="numcliente">
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
						<label>Checklist </label><input type="checkbox" name="lista" id="lista" class="form-control" value="1" >
						</div>
					</div>
				</div>

				

				<div class="row" id="archivo">
					<div class="col-md-2">
						<div class="form-group">
					<label >Tractor :  </label><input type="text" id="placatractor" name="placatractor" class="form-control" placeholder="placa" onBlur="fun();">
						</div>
					</div>
					<div class="col-md-2">
						<label class="text">  Cisterna : </label>
						<input type="text" name="placacisterna" id="placacisterna" class="form-control" placeholder="placa"  >
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<label>Volumen  </label><input type="number" name="volumen" class="form-control"  >
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha Programada </label>
						<input type="date" name="fechaprograma" class="form-control" value="<?php echo date('Y-m-d');?>" >
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha de Carga </label><input type="date" name="fechaentrega" class="form-control" value="<?php echo date('Y-m-d');?>" >
						</div>
					</div>
									
				</div>
				<br/>
				<div class="row" id="btn_constancia">
					<div class="col-md-2">
					<input type="submit" value="Guardar" class="btn btn-primary">
					</div>
					<div class="col-md-7">
					</div>
					<div class="col-md-3" style="display: none"  id="btn_guardatodo" >
					<input type="submit" value="GUARDARTODO" class="btn btn-primary">
					</div>
				</div>
				

			</form>
			</div>
			<br>
			<div style="display: none"  id="detalleconstancia">
			<h3 style ="text-align:left;" ;> Nuevo Detalle </h3>
			<div class=" card" >
                <div class="content">
                    <div class="row" >
                    	<!--<form method="post" action="<?php echo BASE_URL;?>Constancia/Detalle_constancia" >
	                    	<div class="col-md-4">
	                    		<label> Cargar Excel :  </label><input type="text" name="archivo" class="form-control">
								<input name="uploadedfile" type="file" />
								<input type="submit" value="Subir archivo" />
	                    	</div>
                    	</form>-->
                    	
                    	<div class="col-md-1">
                    		<label>Dias</label>
                    		<select class="form-control" name="dia" >
                    			<?php $i=0;
                                    while($i<31 ){ ?>
                                        <option value="<?php echo $i; ?> " > <?php echo $i; ?>  </option>
                                                <?php $i=$i+1;?>
                                <?php } ?>
                    		</select>
                    	</div>

                    	<div class="col-md-2">
                    		<label>Lugar </label><input type="text" name="lugar" class="form-control" >
                    	</div>

                    	<div class="col-md-2">
                    		<label>Inicio </label><input type="text" name="lugar" class="form-control " >
                    	</div>
                    	<!--arreglar para futuros riesgos -->
                    	<div class="col-md-2">
                    		<label>Fin </label><input type="text" name="lugar" class="form-control" >
                    	</div>

                    	<div class="col-md-2">
                    		<label>Exceso de Velocidad </label><input type="number" name="excesovelocidad" class="form-control" >
                    	</div>

                    	<div class="col-md-2">
                    		<br>
                    		<input type="submit" value="Guardar" onclick=ShowElements() class="btn btn-primary" >
                    	</div>
                    	

						<!--
						<div class="col-md-3">
                    		<label>N° de checklist </label><input type="time" name="excesovelocidad" class="form-control" >
                    	</div>

                    	<div class="col-md-3">
                    		<label>N° de racs </label><input type="time" name="excesovelocidad" class="form-control" >
                    	</div>

                    	<div class="col-md-3">
                    		<label>N° de racs </label><input type="time" name="excesovelocidad" class="form-control" >
                    	</div>
						-->
					</div>
					
					
					<br>
					<br>
					<h4>Detalle Constancia</h4>
                        <div class="content table-responsive table-full-width">
                            <table id="tableBienes" class="table table-hover table-striped">
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
