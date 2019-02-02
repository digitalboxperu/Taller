<?php
class Constancia
{
	private $pdo;
	public $Id;

	public $numeroguia_serie;
	public $numeroguia_cliente;
	public $idplaca;
	public $cisterna;
	public $volumen;
	public $recorrido;
	public $kilometraje;
	public $fechaprg;
	public $fechacarga;
	public $checklist;
	
	public $capacidad;
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

	public function Registrar(Constancia $constancia)
	{
		try 
		{
		  // 	//prque se pone esto aqui??
			//$recorrido
			//$kilometraje

			
			//foreach($ovehiculo3 as $viaje_fil):
			/*
			$stmt5= $this->pdo->prepare("SELECT kilometraje FROM  viajesdoc WHERE idviajes="$viaje_fil->idviajes." and numero=".$constancia->numeroguia_cliente." and serie=".$constancia->numeroguia_serie);
			$stmt5->execute();
			$ovehiculo3=$stmt5->fetchAll(PDO::FETCH_OBJ);*/
				
			//$constancia->kilometraje=$ovehiculo3->kilometraje;

			//constancia->numeroguia=$constancia->numeroguia_serie."-".$constancia->numeroguia_cliente;
			$stmt= $this->pdo->prepare( "INSERT INTO constancia (numeroguia, idplaca, cisterna, volumen, recorrido, kilometraje, 
            fechaprg, fechacarga, checklist) 
			        VALUES (' ".$constancia->numeroguia."',". $constancia->idplaca.",".$constancia->cisterna.",".$constancia->volumen.",".$constancia->recorrido.",".$constancia->kilometraje.",'".$constancia->fechaprg."','".$constancia->fechacarga."',".$constancia->checklist .") ; " );
			$this->pdo->beginTransaction();
			$stmt->execute();
			$this->pdo->commit();

			return true;
		} catch (Exception $e) 
		{
			echo $e;
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

	public function Buscarplaca($placa)
	{
		try 
		{
			//SELECT * FROM tabla1 INNER JOIN tabla2 WHERE tabla1.columna1 = tabla2.columna1

			$stmt= $this->pdo->prepare("SELECT idplaca2 FROM vehiculo WHERE placa='".$placa."'");
			$stmt->execute();
			
			if ($stmt->rowCount()!=0){
			$Ovehiculo=$stmt->fetchAll(PDO::FETCH_OBJ);
			$placa2=$Ovehiculo[0]->idplaca2;
			}
			else{
				$constancia=new Constancia();
				$constancia->capacidad=-2;
				return $constancia;
			}

			$stmt2= $this->pdo->prepare("SELECT idplaca2,placa,capacidad FROM vehiculo WHERE id=".$placa2);
			$stmt2->execute();

			if ($stmt2->rowCount()!=0){
			$ovehiculo2=$stmt2->fetchAll(PDO::FETCH_OBJ);
			}
			else{
				$constancia=new Constancia();
				$constancia->capacidad=-2;
				return $constancia;
			}

			return $ovehiculo2[0];
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}
}
?>