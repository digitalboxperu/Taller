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
           

            //$constancia = new Constancia();
            //$id=$_GET["id"];
      //$bienes = new Bienes();
            if(isset($_REQUEST['Id']))
            {
              $listaobjeto = $this->model->Oconstancia_byID($_REQUEST['Id']);
              $constancia=$listaobjeto[0];
              //$bienes =$this->modelbien->obtenerporidinventario($_REQUEST['Id']);
            }
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
      foreach ($_REQUEST['lista_serie'] as $lista) {
        echo "LISTATP ".$lista;
      }
      /*
       $constancia = new Constancia();

       $constancia->idplaca=$_REQUEST['placatractor'];
       $constancia->cisterna=$_REQUEST['placacisterna'];
       $constancia->recorrido=$_REQUEST['recorrido'];
       //$constancia->kilometraje=$_REQUEST['kilometraje'];
       $constancia->fechaprg=$_REQUEST['fechaprograma'];
       $constancia->fechacarga=$_REQUEST['fechaentrega'];
       //$constancia->checklist=$_REQUEST['lista'];
       $constancia->serie=$_REQUEST['numeroguia_serie'];
       $constancia->numero=$_REQUEST['numeroguia_cliente'];
       $constancia->observacion=$_REQUEST['observacion'];

       $constancia->kilometraje=12;//SACAR KILOMETRaAJE CON VIAJES Y VIAJESDOC

       if ($constancia->checklist!=1 )
        {$constancia->checklist=0;}
        else{ $constancia->checklist=1;}  
      $id=$_REQUEST['Id'];
      if($id==-1)
        $id_constancia=$this->model->Registrar($constancia);
      else
      {
        //echo "ID SERIO ".$id;
        $id_constancia=$this->model->Aptualizar($constancia,$id);
      }
      // $constancia->Id =0;
       echo '<input type="hidden" id="IdConstancia"  name="IdConstancia"  value="'.$id_constancia.'">';     */
    }

    public function Buscarplaca(){

        $placatractor=$_POST["placat"];
        
        $Vcisterna=$this->model->Buscarplaca($placatractor);
        
        require_once 'Views/Constancia/busquedaplaca.php';
        echo $output;
    }

    public function BuscarplacaCisterna()
    {
        $placacisterna=$_POST["placac"];
        $placatractor=$_POST["placat"];
        $fila=$this->model->BuscarplacaCisterna($placacisterna);
        require_once 'Views/Constancia/busquedaplacaconstancia.php';
        echo $output;  
    }

    public function Detalle_guardar()
    {
        $dia=$_POST["dia"];
        $lugar=$_POST["lugar"];
        $inicio=$_POST["inicio"];
        $fin=$_POST["fin"];
        $excesovelocidad=$_POST["excesovelocidad"];
        $idconstancia=$_POST["idconstancia"];
        $fila=$this->model->guarda_detalle($dia,$lugar,$inicio,$fin,$excesovelocidad,$idconstancia);
    }

    public function listar_tractor()
    {
      $cargo = new Constancia();
        
      $listatractores = $this->model->listar_tractores();
      return $listatractores;
    }
}
?>