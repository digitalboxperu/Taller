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
	public $serie;
	public $numero;
	public $observacion;

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
			$this->pdo->beginTransaction();
			$stmt2= $this->pdo->prepare( "SELECT id FROM vehiculo WHERE placa='".$constancia->idplaca."'");
			$stmt2->execute();
			$this->pdo->commit();

			if ($stmt2->rowCount()!=0){
				$objeto=$stmt2->fetchAll(PDO::FETCH_OBJ);
				$verdaderoObjeto=$objeto[0];

				$idplaca=$verdaderoObjeto->id;
				$this->pdo->beginTransaction();
				$stmt3= $this->pdo->prepare( "SELECT id FROM vehiculo WHERE placa='".$constancia->cisterna."'");
				
				$stmt3->execute();
				if($stmt3->rowCount()!=0){
				$this->pdo->commit();
				$objeto2=$stmt3->fetchAll(PDO::FETCH_OBJ);
				$verdaderoObjeto2=$objeto2[0];
				$idplacacisterna=$verdaderoObjeto2->id;
				}
			}
			else{
				$idplaca=2;
				$idplacacisterna=1;
			}
			$stmt= $this->pdo->prepare( "INSERT INTO constancia (idplaca, cisterna, volumen, recorrido, kilometraje,
            fechaprg, fechacarga, checklist, serie, numero,observacion) 
			        VALUES (".$idplaca.",".$idplacacisterna.",".$constancia->volumen.",".$constancia->recorrido.",".$constancia->kilometraje.",'".$constancia->fechaprg."','".$constancia->fechacarga."',".$constancia->checklist .",'".$constancia->serie."','".$constancia->numero."','".$constancia->observacion."' )  returning  id ;");
			/*echo "ESTO ES "."INSERT INTO constancia (idplaca, cisterna, volumen, recorrido, kilometraje,
            fechaprg, fechacarga, checklist, serie, numero,observacion) 
			        VALUES ( ". $idplaca.",".$idplacacisterna.",".$constancia->volumen.",".$constancia->recorrido.",".$constancia->kilometraje.",'".$constancia->fechaprg."','".$constancia->fechacarga."',".$constancia->checklist .",'".$constancia->serie."','".$constancia->numero."','".$constancia->observacion."' ) ; ";*/
			$this->pdo->beginTransaction();
			$stmt->execute();
			$Oid=$stmt->fetchAll(PDO::FETCH_OBJ);
			$Oid=$Oid[0];
			$id_constancia=$Oid->id;
			$this->pdo->commit();
			return $id_constancia;
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
	public function BuscarplacaCisterna($placa){
		$this->pdo->beginTransaction();
		$stmt2= $this->pdo->prepare("SELECT idplaca2,placa,capacidad FROM vehiculo WHERE placa='".$placa."'");
		$stmt2->execute();
		if($stmt2->rowCount()!= 0)
		{
			$objeto = $stmt2->fetchAll(PDO::FETCH_OBJ);
			$fila =$objeto[0];
			return $fila;
		}
		else{
			$fila=new Constancia;
			$fila->capacidad=-1;
			return $fila;
		}
	}

	public function guarda_detalle($dia,$lugar,$inicio,$fin,$excesovelocidad,$idconstancia)
	{
		$this->pdo->beginTransaction();
		$diferencia=2;
		$stmt2= $this->pdo->prepare("INSERT INTO det_constancia(idconstancia, dia, lugar, inicio, fin, diferencia, excesovelo)VALUES (".$idconstancia.",".$dia.",'". $lugar."','".$inicio."','".$fin."',".$diferencia.",".$excesovelocidad.");" );
		/*echo "INSERT INTO det_constancia(idconstancia, dia, lugar, inicio, fin, diferencia, excesovelo)VALUES (".$idconstancia.",".$dia.",'". $lugar."','".$inicio."','".$fin."',".$diferencia.",".$excesovelocidad.");";*/
		$stmt2->execute();
		$this->pdo->commit();
	}
}
?>