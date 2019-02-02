<?php
class Det_constancia
{
	private $pdo;
	public $id;
	public $idconstancia;
	public $dia;
	public $lugar;
	public $inicio;
	public $fin;
	public $diferencia;
	public $excesovelo;
	public $numerochecklist;
	public $numeroderacs;
	public $numerodeinforme;

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