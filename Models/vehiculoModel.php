<?php
class Vehiculo
{
	private $pdo;
	public $placa;
	public $certifica;
	public $confvehi;
	public $color;
	public $anio;
	public $capacidad;
	public $id;
	public $marca;
	public $tipovehiculo;
	public $unidad;
	public $idsemiremolque;
	public $idmisempresas;
	public $personalc_id;
	public $personalm_id;
	public $vcto_soat;
	public $motor;
	public $vin;
	public $bahia;
	public $vehiculo2;
	public $idprovee;
	public $idplaca2;	

	function __construct()
	{
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


}

?>