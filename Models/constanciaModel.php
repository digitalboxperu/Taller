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

	public function Aptualizar(Constancia $constancia,$id_constancia)
	{
		try
		{
			$stmt=$this->pdo->prepare("UPDATE constancia SET idplaca=".$constancia->idplaca.",cisterna=".$constancia->cisterna.",recorrido=".$constancia->recorrido.",kilometraje=".$constancia->kilometraje.",fechaprg='".$constancia->fechaprg."',fechacarga='".$constancia->fechacarga."',checklist=".$constancia->checklist .",serie='".$constancia->serie."',numero='".$constancia->numero."',observacion='".$constancia->observacion."' WHERE id=".$id_constancia.";" );
			/*
			echo "UPDATE constancia SET idplaca=".$constancia->idplaca.",cisterna=".$constancia->cisterna.",recorrido=".$constancia->recorrido.",kilometraje=".$constancia->kilometraje.",fechaprg='".$constancia->fechaprg."',fechacarga='".$constancia->fechacarga."',checklist=".$constancia->checklist .",serie='".$constancia->serie."',numero='".$constancia->numero."',observacion='".$constancia->observacion."' WHERE id=".$id_constancia.";";*/

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listarbynumero_viaje(){
		try 
		{
			//$this->pdo->beginTransaction();
		 	$stmt= $this->pdo->prepare( "select DISTINCT  numerogr from viajes where numerogr!=''  ;" );
			
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			echo $e;
			die($e->getMessage());
		}
	}

	public function Listarbyserie_viaje(){
		try 
		{
			//$this->pdo->beginTransaction();
		 	$stmt= $this->pdo->prepare( "select DISTINCT  seriegr from viajes where seriegr!=''  " );
			
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			echo $e;
			die($e->getMessage());
		}
	}

	public function Listarbynumero_viajeT(){
		try 
		{
		 	//$this->pdo->beginTransaction();
		 	$stmt= $this->pdo->prepare( "select DISTINCT  numerogrt from viajes where numerogrt!=''  " );
			
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			echo $e;
			die($e->getMessage());
		}
	}

	public function Listarbyserie_viajeT(){
		try 
		{
		 	$stmt= $this->pdo->prepare( "select DISTINCT  seriegrt from viajes where seriegrt!=''  " );
			$this->pdo->beginTransaction();
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			echo $e;
			die($e->getMessage());
		}
	}

	public function Registrar(Constancia $constancia)
	{
		try 
		{
			
		  	$kilometraje= $this->pdo->prepare("SELECT idviajes FROM viajes WHERE seriegr='".$constancia->serie."' AND numerogr='".$constancia->numero."' ; ");
		  	$this->pdo->beginTransaction();
		  	$kilometraje->execute();
		  	$Oid=$kilometraje->fetchAll(PDO::FETCH_OBJ);
			$Oid=$Oid[0];
			$id_constancia=$Oid->idviajes;
			$this->pdo->commit();

			$tkilometraje=$this->pdo->prepare("SELECT kilometraje FROM viajesdoc WHERE idviajes=".$kilometraje."' ; ");
			$this->pdo->beginTransaction();
		  	$tkilometraje->execute();
		  	$Oid=$tkilometraje->fetchAll(PDO::FETCH_OBJ);
			$Oid=$Oid[0];
			$kilometraje=$Oid->kilometraje;
			$this->pdo->commit();

			//recorrido se tiene que sacar con el lugar !!!! de acuerdo al cliente y el lugar 
			//es como una vuelta 

			$stmt= $this->pdo->prepare( "INSERT INTO constancia (idplaca, cisterna, recorrido, kilometraje,fechaprg, fechacarga, checklist, serie, numero,observacion)		        VALUES (".$constancia->idplaca.",".$constancia->cisterna.",".$constancia->recorrido.",".$kilometraje.",'".$constancia->fechaprg."','".$constancia->fechacarga."',".$constancia->checklist .",'".$constancia->serie."','".$constancia->numero."','".$constancia->observacion."' )  returning  id ;");
			
			/*echo "INSERT INTO constancia (idplaca, cisterna, recorrido, kilometraje,          fechaprg, fechacarga, checklist, serie, numero,observacion) VALUES (".$constancia->idplaca.",".$constancia->cisterna.",".$constancia->recorrido.",".$constancia->kilometraje.",'".$constancia->fechaprg."','".$constancia->fechacarga."',".$constancia->checklist .",'".$constancia->serie."','".$constancia->numero."','".$constancia->observacion."' )  returning  id ;";*/
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
			//echo "PLACA".$placa;
			$stmt= $this->pdo->prepare("SELECT idplaca2 FROM vehiculo WHERE placa='".$placa."'");
			$stmt->execute();
			//echo "SELECT idplaca2 FROM vehiculo WHERE placa='".$placa."'";
			if ($stmt->rowCount()!=0){
			$Ovehiculo=$stmt->fetchAll(PDO::FETCH_OBJ);
			$placa2=$Ovehiculo[0]->idplaca2;
			}
			else{
				$constancia=new Constancia();
				$constancia->capacidad=-2;
				return $constancia;
			}
			$stmt2= $this->pdo->prepare("SELECT id,placa,capacidad FROM vehiculo WHERE id=".$placa2);
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

	public function listar_tractores()
	{
		try
		{
			//$limit = resultsPerPage;
			//$start = $startFrom;
			$stmt = $this->pdo->prepare("SELECT id,placa FROM vehiculo WHERE tipovehiculo='TRACTO';");
			$stmt->execute();
			//$this->pdo->commit();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function listar_cisternas()
	{
		try
		{
			//$limit = resultsPerPage;
			//$start = $startFrom;
			$stmt = $this->pdo->prepare("SELECT id,placa FROM vehiculo WHERE tipovehiculo='CISTERNA_COM';");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Oconstancia_byID($id)
	{
		try
		{
			//$limit = resultsPerPage;
			//$start = $startFrom;
			$stmt = $this->pdo->prepare("SELECT * FROM constancia WHERE id=$id;");
			//echo "SELECT * FROM constancia WHERE id=$id;" ;
			$stmt->execute();
			$this->pdo->commit();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}
}
?>