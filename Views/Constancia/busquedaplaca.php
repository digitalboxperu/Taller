<?php  
if($Vcisterna->capacidad==-2)
{
	$output = '	<div class="row" id="archivo">
					<div class="col-md-2">
						<div class="form-group">
					<label >Tractor :  </label><input type="text" id="placatractor" name="placatractor" class="form-control" placeholder="placa" onBlur="fun();" required value="'.$placatractor.'"><span class="text-danger">Placa no encontrada</span>
						</div>
					</div>
					<div class="col-md-2">
						<label class="text">  Cisterna : </label>
						<input type="text" name="placacisterna" id="placacisterna" class="form-control" placeholder="placa" required  onBlur="funPCisterna();" >
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<label>Volumen  </label><input type="number" name="volumen" disabled class="form-control"  required id ="volumen" required >
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha Programada </label>
						<input type="date" name="fechaprograma" id ="fechaprograma"  class="form-control" value="'.date('Y-m-d').'" required >
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha de Carga </label><input type="date" name="fechaentrega" class="form-control" id="fechaentrega" value="'.date('Y-m-d').'" required >
						</div>
					</div>
									
				</div>';

				
}
else{
$output = 
				'	
					<div class="col-md-2">
						<div class="form-group">
					<label >Tractor :  </label><input type="text" id="placatractor" name="placatractor" class="form-control" placeholder="placa" onBlur="fun();" required value="'.$placatractor.'"> 
						</div>
					</div>
					<div class="col-md-2">
						<label class="text">  Cisterna : </label>
						<input type="text" name="placacisterna" id="placacisterna" class="form-control" placeholder="placa" required value="'.$Vcisterna->placa.'" onBlur="funPCisterna();" >
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<label>Volumen  </label><input type="number" name="volumen" disabled class="form-control"  required id ="volumen" value="'.$Vcisterna->capacidad.'" required  >
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha Programada </label>
						<input type="date" name="fechaprograma" id ="fechaprograma" class="form-control" value="'.date('Y-m-d').'" required >
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<label>Fecha de Carga </label><input type="date" id="fechaentrega" name="fechaentrega" id="fechaentrega" class="form-control" value="'.date('Y-m-d').'"  required >
						</div>
					</div>
									
				';

			
	}
?>