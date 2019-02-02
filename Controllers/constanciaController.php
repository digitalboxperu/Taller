<?php
    require_once("Core/Session.php");
    require_once 'Models/constanciaModel.php';
    require_once 'Models/det_constanciaModel.php';
class ConstanciaController{
	
	public function __construct(){
            $this->model = new Constancia();
            $this->auxTable = "detalleConstancia";
    }
        
    public function Index(){

        $cargo = new Constancia();
        
        $totalRecords = $this->model->getTotalRecords();
        /*
        $totalPages = ceil($totalRecords/resultsPerPage);
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
        $startFrom = ($page-1) * resultsPerPage;*/
        
        require_once 'Views/header.php';
        require_once 'Views/nav_bar.php';
        require_once 'Views/Constancia/index.php';
        require_once 'Views/footer.php';
    }

    public function Crud(){
           

            $cargo = new Constancia();
            /*
            $totalRecords = $this->model->getTotalRecords();
            $totalPages = ceil($totalRecords/resultsPerPage);
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
            $startFrom = ($page-1) * resultsPerPage;
            if(isset($_REQUEST['Id'])){
                $cargo = $this->model->Obtener($_REQUEST['Id']);
            }*/
            
            require_once 'Views/header.php';
            require_once 'Views/nav_bar.php';
            require_once 'Views/Constancia/update.php';
            require_once 'Views/footer.php';
        }

    public function Guardar(){
       $constancia = new Constancia();
       $constancia->numeroguia_serie=$_REQUEST['numeroguia_serie'];
       $constancia->numeroguia_cliente=$_REQUEST['numeroguia_cliente'];
       $constancia->idplaca=$_REQUEST['placatractor'];
       $constancia->cisterna=$_REQUEST['placacisterna'];
       $constancia->volumen=$_REQUEST['volumen'];
       $constancia->recorrido=$_REQUEST['recorrido'];
       //$constancia->kilometraje=$_REQUEST['Kilometraje'];
       $constancia->fechaprg=$_REQUEST['fechaprograma'];
       $constancia->fechacarga=$_REQUEST['fechaentrega'];
       $constancia->checklist=$_REQUEST['lista'];
       echo $constancia->checklist."  imprimiochecklist";
       $constancia->Id =0;
       if ($constancia->checklist!=1 )
        {$constancia->checklist=0;}
        else{ $constancia->checklist=1;}  

       //echo "Esto es un prueba de que todo salio bien ".$constancia->checklist;
        if ($constancia->Id > 0 )
            { $this->model->Actualizar($constancia);}
        else{

             $this->model->Registrar($constancia);
        }
        header('Location:'.BASE_URL.'Constancia'); 
    }

    public function Buscarplaca(){

        $placatractor=$_POST["words"];
        //echo "BUSCARPLACA".$placatractor."<br>";

        $Vcisterna=$this->model->Buscarplaca($placatractor);
        
        require_once 'Views/Constancia/busquedaplaca.php';
        echo $output;
    }
}
?>