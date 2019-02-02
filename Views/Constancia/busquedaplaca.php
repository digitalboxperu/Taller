<?php  
if($Vcisterna->capacidad==-2)
{
	$output = '	
				<div class="col-md-2">

					<label >Tractor :  </label><input type="text" id="placatractor" name="placatractor" class="form-control" placeholder="placa" value="'.$placatractor.'">
					<span class="text-danger">Placa no encontrada</span>
				</div>

				<div class="col-md-2">
					<label class="text">  Cisterna : </label>
					<input type="text" name="placacisterna" id="placacisterna" class="form-control" placeholder="placa" >
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
					<label>Volumen  </label><input type="number" name="volumen" class="form-control" >
					</div>
				</div>
				<div class="col-md-3">
						<div class="form-group">
						<label>Fecha Programada </label>
						<input type="date" name="fechaprograma" class="form-control" value=" '.date('Y-m-d') .'" >
						</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
				<label>Fecha Carga </label><input type="date" name="fechaentrega" class="form-control" value="'.date('Y-m-d').'"  >
					</div>
				</div>
				';
}
else{
$output = '	
				<div class="form-group">
					<label >Tractor :  </label><input type="text" id="placatractor" name="placatractor" class="form-control" placeholder="placa" value="'.$placatractor.'">
				</div>

				<div class="col-md-2">
					<label class="text">  Cisterna : </label>
					<input type="text" name="placacisterna" id="placacisterna" class="form-control" placeholder="placa" value="'.$Vcisterna->placa.'"  >
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
					<label>Volumen  </label><input type="number" name="volumen" class="form-control"  value="'.$Vcisterna->capacidad.'"  >
					</div>
				</div>
				<div class="col-md-3">
						<div class="form-group">
						<label>Fecha Programada </label>
						<input type="date" name="fechaprograma" class="form-control" value=" '.date('Y-m-d') .'" >
						</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
				<label>Fecha Carga </label><input type="date" name="fechaentrega" class="form-control" value="'.date('Y-m-d').'"  >
					</div>
				</div>
				';
	}
?>