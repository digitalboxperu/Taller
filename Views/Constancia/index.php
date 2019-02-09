
<dfiv class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                	<div class="col-md-4">
                     	<h2 class="title">Constancias</h2>
                 	</div>
                 	<div class="col-md-4">
                 	</div>
                 	<?php $_REQUEST['c']='Constancia' ?>
                 	 <div class="col-md-4">
                     	<form method="post" action="<?php echo BASE_URL;?>Constancia/Crud" > 
                            <button type="submit" class="btn btn-info btn-fill pull-right" >
                                Nueva Constancia
                            </button>
                        </form>
                 	</div>        
                </div>

                    <div class="row" style="margin-left: 10%;margin-right: 10%">
                            <div class="col-md-12">
                                <h4>Busqueda:</h4>
                            </div>                            
                    </div>
                        <div class="row" style="margin-left: 10%;margin-right: 10%">
                            <div class="col-md-12">
                                <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" id="search11" name="search" class="search-query form-control" placeholder="Numero de Guia" />
                                          <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                                        </div>
                                </div>
                            </div>    
                        </div>
						<div  id="target-search">
                        <div class="content table-responsive table-full-width">
                            <table id="tableUnidades" class="table table-hover table-striped">
                                <thead>
                                    <th>Numero de Guia</th>
                                    <th>Tractor</th>
                                    <th>Cisterna</th>
                                    <th>Volumen</th>
                                    <th>Recorrido</th>
                                    <th>Kilometraje</th>
                                    <th>FechaPrograma</th>
                                    <th>FechaCarga</th>
                                    <th>Observación</th>
                                </thead>
 								<?php foreach($this->model->Listar() as $r): ?>
                                        <tr>
                                            <td><?php echo $r->serie."-".$r->numero; ?></td>
                                            <td><?php echo $r->idplaca; ?></td>
                                            <td><?php echo	$r->cisterna;     ?></td>
											<td><?php echo	$r->volumen; ?></td>
											<td><?php echo	$r->recorrido; ?></td>
											<td><?php echo	$r->kilometraje; ?></td>
											<td><?php echo	$r->fechaprg; ?></td>
											<td><?php echo	$r->fechacarga; ?></td>
                                            <td><?php echo  $r->observacion; ?></td>
                                            <td class="cell-actions">
                                                <div class="btn-group">
                                                    <a class="btn btn-xs btn-warning buttonCrud" href="<?php echo BASE_URL;?>Constancia/Crud/<?php echo $r->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                 <?php endforeach; ?>

                                </tbody>

                            </table>
                        
                        </div>
