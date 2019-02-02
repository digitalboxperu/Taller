<!DOCTYPE html>
<html>
<head>
	<title>recibiendo datos</title>
</head>
<body>
<?php echo "esta funcionando php ";
$placa=$_GET["placa"];
$certifica=$_GET["certifica"];
$confvehi=$_GET["confvehi"];
$color=$_GET["color"];

$anio=$_GET["anio"];
$capacidad=$_GET["capacidad"];
$marca=$_GET["marca"];

$tipovehiculo=$_GET["tipovehiculo"];
$unidad=$_GET["unidad"];
$idsemiremolque=$_GET["idsemiremolque"];
$idempresas=$_GET["idempresas"];

$personalc_id=$_GET["personalc_id"];
$personalm_id=$_GET["personalm_id"];
$date=$_GET["date"];

$motor=$_GET["motor"];
$vin=$_GET["vin"];
$bahia=$_GET["bahia"];

$vehiculo2=$_GET["vehiculo2"];
$idprovee=$_GET["idprovee"];
$idprovee2=$_GET["idprovee2"];

$idplaca2=$_GET["idplaca2"];

$id=1


?>
Placa : <?php echo $placa; ?><br>
Contrasena : <?php echo $certifica; ?><br>
Conferenciavehiculo : <?php echo $confvehi; ?><br>
Color : <?php echo $color; ?><br>

<?php
require_once("Core/Database.php");
require_once('Core/pdf/mpdf.php');
//require_once('Assets/img/iconUser.png');
try
{
	$pdo = Database::Conectar_postgresql();
}
catch(Exception $e)
{
	die("Error al conectar a la Base de datos.");
	//die($e->getMessage());
}
$query="INSERT INTO vehiculo(placa, certifica, confvehi, color, anio, capacidad, id, marca,tipovehiculo, unidad, idsemiremolque, idmisempresas, personalc_id,personalm_id, vcto_soat, motor, vin, bahia, vehiculo2, idprovee,        idprovee2, idplaca2) VALUES (".$placa.",".$certifica.",". $confvehi.", ".$color.",". $anio.",".$capacidad."," .$id.",". $marca.",".$tipovehiculo."," .$unidad.",".$idsemiremolque.",".$idmisempresas.",".$personalc_i.",".$personalm_id.",".$vcto_soat.",".$motor.",".$vin.",".$bahia.",".$vehiculo2.",".$idprovee.",".$idprovee2.",".$idplaca2.")";

$query=pg_query($pdo,$query);
if (!$query) {
  echo "Ocurrió un error.\n";
  exit;
}
echo "esto es bueno!!<br/>";
echo "<h1>Si hace conexion</h1>";

$html='<h1><a name="top"></a>Informe a la Empresa deberas <img src="Assets/img/iconUser.png"/> </h1>';
$html=$html.'<br/> <h2> Nombre del usuario :'.$usuario.'<br/>';
$html=$html.'<h2> ID :'.$Etiqueta1.'<br/>';
$html=$html.'<h2> Edad :'.$Etiqueta2.'<br/>';
$mpdf=new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output('reporte.pdf','I');
?>
</body>
</html>

