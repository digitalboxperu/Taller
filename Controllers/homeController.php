<?php

require_once("Core/Session.php");
require_once("Models/personaModel.php");
require_once('Models/constanciaModel.php');
require_once("Controllers/constanciaController.php");
class HomeController{
    
    private $model;
    
    public function __construct(){
    	$this->model = new Constancia();
        $this->controller_persona = new Persona();
    }
    
    public function Index(){
        //header('Location:'.BASE_URL.'Home');
        require_once 'Views/header.php';
        //require_once 'Views/nav_bar.php';
        require_once 'Views/Home/index.php';
        require_once 'Views/footer.php';
    }
    
    public function Registrar(){
        //header('Location:'.BASE_URL.'Home');
        $persona = new Persona();
       	$persona->usuario=$_REQUEST['usuario'];
       	$persona->contrasena=$_REQUEST['contrasena'];
       	$personas=$this->controller_persona->Identificar($persona);
        $canti=0;
        foreach( $personas as $per):
            $canti+=1;
        endforeach;

        if($canti==0){
            require_once 'Views/header.php';
            require_once 'Views/nav_bar.php';
            require_once 'Views/Home/index_error.php';
            require_once 'Views/footer.php';
        }
        else{
            /*
            $constancia=new Constancia();
            $constancia->Listar();
            require_once 'Views/header.php';
            require_once 'Views/Constancia/index.php';
            require_once 'Views/footer.php'; */
            $constancia = new Constancia();
            $totalRecords = $constancia->getTotalRecords();
            /*
            $totalPages = ceil($totalRecords/resultsPerPage);
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
            $startFrom = ($page-1) * resultsPerPage;*/
            
            require_once 'Views/header.php';
            require_once 'Views/nav_bar.php';
            require_once 'Views/Constancia/index.php';
            require_once 'Views/footer.php';
        }
    }
}

?>