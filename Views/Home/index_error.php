<div class="container">
	<center><img class="imagenlogotipo" src="<?php echo BASE_URL; ?>Assets/img/logotipo.jpg"></center>
	<div class="login-form col-md-4 offset-md-4">
		<div class="card">
		<div class="card bg-primary text-white">
		<center><h1 class="title">
			Login
		</h1></center>
		</div>
		<h4><span class="text-danger">Su Usuario o Contraseña no corresponde</span></h4>
		<div class="card-body">
		<form method="POST" action="<?php echo BASE_URL;?>Home/Registrar" >
			<div class="form-group">
				<label>Usuario</label><br>
				<input type="text" name="usuario" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Contraseña</label><br>
				<input type="password" name="contrasena" class="form-control">
			</div>

			<input  type="submit" class="btn btn-primary btn-block" value="Entrar">
		</form>
		</div>
	</div>
	</div>
</div>
<!--background-color:	Light Blue;-->
<!--background-image:url(<?php echo BASE_URL; ?>Assets/img/img300x400.jpg);-->
<!--F8EEFC  F3FCEE E7EBEA D9E8E4 EEF7F5-->
<style type="text/css">
	.imagenlogotipo{
		margin-top: 5%;
	}
	body{
		background-color: #FFFFF0;
		background-size: cover;
	}
	.login-form{
		margin-top: 2%;
		box-shadow: 0px 0px 10px 1px grey;
		padding-bottom: 20px;
	}
	.title{
		padding: 10px;
		border-radius: 0px 0px 10px 10px;
	}
</style>