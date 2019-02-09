<?php  
if($Vcisterna->capacidad==-2)
{
	$output = '	
				<label >Cisterna:</label>
				<input list="todocisternas" placeholder="placatractor" id="placacisterna" class="form-control"  />
				<datalist id="todocisternas">
				<?php foreach ($this->model->listar_cisternas() as $r ) :?>
                   <option value="<?php echo $r->placa;?>"></option>
                   <!--<?php echo $r->placa ?>-->
                  <?php endforeach ?>
				</datalist>
				<input type="hidden" name="volumen" id="volumen" value="" >
				<input type="hidden" name="idcisterna" id="idcisterna" value="" >
				';

				
}
else{
$output = 
				'	<label >Cisterna:</label>
				<input list="todocisternas" placeholder="placatractor" id="placacisterna" class="form-control"  value="'.$Vcisterna->placa.'" />
				<datalist id="todocisternas">
				<?php foreach ($this->model->listar_cisternas() as $r ) :?>
                   <option value="<?php echo $r->placa;?>"></option>
                   <!--<?php echo $r->placa ?>-->
                  <?php endforeach ?>
				</datalist>
				<input type="hidden" name="volumen" id="volumen" value="'.$Vcisterna->capacidad.'" >
				<input type="hidden" name="idcisterna" id="idcisterna" value="'.$Vcisterna->id.'" >
				';		
	}
?>