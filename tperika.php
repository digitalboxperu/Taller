<!DOCTYPE html>

<html><head><title>Ejemplo aprenderaprogramar.com</title><meta charset="utf-8">

 <style type="text/css"> body {margin-left:30px; font-family: sans-serif;}

.estiloForm {background-color: #f3f3f3; border: solid 2px black; margin-left:20px; width: 330px; padding:10px; }

 .estiloForm label {display: block; width: 120px; float: left; text-align:right; margin-bottom: 35px; padding-right: 20px;}

br {clear: left;} input[type="submit"], input[type="reset"] {margin:25px 5px 10px 5px;}

 </style>

 

<script type="text/javascript">

window.onload = function () {

document.forms['formularioContacto'].addEventListener('submit', avisarUsuario);

}

 

function avisarUsuario(evObject) {

evObject.preventDefault();

var botones = document.querySelectorAll('.botonFormulario');

for (var i=0; i<botones.length; i++) {botones[i].disabled = true; }

var nuevoNodo = document.createElement('h2');

nuevoNodo.innerHTML = '<h2 style="color:orange;">Enviando... espere por favor</h2>';

document.body.appendChild(nuevoNodo);

var retrasar = setTimeout(procesaDentroDe2Segundos, 1000);

}

 

function procesaDentroDe2Segundos() {document.forms['formularioContacto'].submit();}

</script>

</head>

<body>

<h2>Cursos aprenderaprogramar.com</h2>

<h3>Ejemplos JavaScript</h3>

    <div class="estiloForm">

       <form name ="formularioContacto" method="get" action="http://aprenderaprogramar.com">

        <label>Nombre</label><input id="nombre" name="nombre" type="text"/><br/>

        <label>Apellidos</label><input id="apellidos" name="apellidos" type="text"/><br/>

        <label>Dirección</label><input id="direccion1" name="direccion1" type="text"/>

        <input class="botonFormulario" type="submit" value="Enviar"/>

        <input class="botonFormulario" type="reset" value="Cancelar"/>

    </form>

    </div>

</body></html>