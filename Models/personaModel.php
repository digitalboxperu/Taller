<?php

class Persona
{
	private $pdo;
	public $usuario;
	public $contrasena;

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

	public function Identificar(Persona $persona)
	{
		try 
		{
			$stmt= $this->pdo->prepare( "SELECT * FROM personal where login='".$persona->usuario."' AND pwd='".$persona->contrasena."'");
			$this->pdo->beginTransaction();
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			echo $e;
			die($e->getMessage());
		}
	}
}
?>