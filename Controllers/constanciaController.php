<?php
    require_once("Core/Session.php");
    require_once 'Models/constanciaModel.php';
    require_once 'Models/det_constanciaModel.php';
class ConstanciaController{
	
	public function __construct(){
            $this->model = new Constancia();
            $this->modeldetalle = new Det_constancia();
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
       //echo "ESTO FUNCIONA DEBERAS".$_REQUEST['numeroguia_serie'];
       $constancia->numeroguia_cliente=$_REQUEST['numeroguia_cliente'];
       $constancia->idplaca=$_REQUEST['placatractor'];
       $constancia->cisterna=$_REQUEST['placacisterna'];
       $constancia->volumen=$_REQUEST['volumen'];
       $constancia->recorrido=$_REQUEST['recorrido'];
       $constancia->kilometraje=$_REQUEST['kilometraje'];
       $constancia->fechaprg=$_REQUEST['fechaprograma'];
       $constancia->fechacarga=$_REQUEST['fechaentrega'];
       $constancia->checklist=$_REQUEST['lista'];
       $constancia->serie=$_REQUEST['numeroguia_serie'];
       $constancia->numero=$_REQUEST['numeroguia_cliente'];
       $constancia->observacion=$_REQUEST['observacion'];

      // echo "Fecha programada".$constancia->fechaprg;
       if ($constancia->checklist!=1 )
        {$constancia->checklist=0;}
        else{ $constancia->checklist=1;}  
       $id_constancia=$this->model->Registrar($constancia);
      // $constancia->Id =0;
       echo '<input type="hidden" id="IdConstancia"  name="IdConstancia"  value="'.$id_constancia.'">';
        //$output="<h2> TU PUEDES ERIKA</h2>";
      // header('Location:'.BASE_URL.'Constancia'); 

       //echo "Esto es un prueba de que todo salio bien ".$constancia->checklist;
        /*if ($constancia->Id > 0 )
            { $this->model->Actualizar($constancia);}
        else{
             
        }*/

        
    }

    public function Buscarplaca(){

        $placatractor=$_POST["placat"];
        $placacisterna=$_POST["placac"];
        $volumen=$_POST["volumen"];
        //echo "HAY ".$placatractor."    ".$placacisterna."   ".$volumen;
        //echo "BUSCARPLACA".$placatractor."<br>";

        $Vcisterna=$this->model->Buscarplaca($placatractor);
        
        require_once 'Views/Constancia/busquedaplaca.php';
        //header('Location:'.BASE_URL.'Constancia');    
        echo $output;
    }

    public function BuscarplacaCisterna()
    {
        $placacisterna=$_POST["placac"];
        //echo "la placa cisterna".$placacisterna;
        $placatractor=$_POST["placat"];
        //echo "BUSCARPLACA".$placatractor."<br>";
        $fila=$this->model->BuscarplacaCisterna($placacisterna);
        require_once 'Views/Constancia/busquedaplacaconstancia.php';
        //header('Location:'.BASE_URL.'Constancia');    
        echo $output;  
    }

    public function Detalle_guardar()
    {
        $dia=$_POST["dia"];
        //echo "la placa cisterna".$placacisterna;
        $lugar=$_POST["lugar"];
        $inicio=$_POST["inicio"];
        $fin=$_POST["fin"];
        $excesovelocidad=$_POST["excesovelocidad"];
        $idconstancia=$_POST["idconstancia"];

        //echo "BUSCARPLACA".$dia."<br>";
        $fila=$this->model->guarda_detalle($dia,$lugar,$inicio,$fin,$excesovelocidad,$idconstancia);
    }

}
?>