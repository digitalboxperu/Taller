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

	public function get_row_by_idplca()
	{

	}

	public function Registrar(Constancia $constancia)
	{
		try 
		{
		  // $this->pdo->beginTransaction();	//prque se pone esto aqui??
			//$this->pdo->beginTransaction();
			$stmt= $this->pdo->prepare("INSERT INTO constancia (numeroguia, idplaca, cisterna, volumen, recorrido, kilometraje, 
            fechaprg, fechacarga, checklist) 
			        VALUES (".$constancia->numeroguia.",". $constancia->idplaca.",".$constancia->cisterna.",".$constancia->volumen.",".$constancia->recorrido.",".$constancia->kilometraje.",".$constancia->fechaprg.",".$constancia->fechacarga.",".$constancia->checklist .") ; " );
			echo "dcd".$constancia->fechaprg;

			$stmt->execute();
			 return true;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function getTotalRecords()
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM constancia");
			$stm->execute();
			return $stm->rowCount();
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$limit = resultsPerPage;
			//$start = $startFrom;
			$stmt = $this->pdo->prepare("SELECT * FROM constancia ");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function modeldetalle()
	{
		
	}
}
?>