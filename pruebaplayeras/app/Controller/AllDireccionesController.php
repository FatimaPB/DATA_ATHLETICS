<?php
require_once("app/Model/EstadoModel.php");
require_once("app/Model/MunicipioModel.php");
require_once("app/Model/ColoniaModel.php");
require_once("app/Model/DireccionModel.php");

//en esta clase definimos el controlador por default, este se llama cunado no indicamos 
//a que controlador queremos llamar 
class AllDireccionesController{

    //nuestro controlador por default tendra una variable llamada vista que llmara a la 
    //ventana espesifica que yo quiero mostrar en la plantilla
    private $vistaADDESTADO;
    private $modelo;
    private $modelomun;
    private $modelocol;
    private $modelodir;
    //metodo por default este metodo es el encargado de cargar la plnatilla en pantalla
    //junto con la vista que quiero mostrar
    public function index(){
        session_start();
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        $vista="app/View/admin/Direcciones/AllDireccionesView.php";
        
        $modelo=new EstadoModel();
        $datos=$modelo->getAll();
        $vistaADDESTADO="app/View/admin/Direcciones/Estado/AddEstadoView.php";

        $modelomun=new MunicipioModel();
        $municipios=$modelomun->getAll();
        $vistaMUNICIPIO="app/View/admin/Direcciones/Municipio/AddMunicipioView.php";

        $modelocol=new ColoniaModel();
        $colonias=$modelocol->getAll();
        $vistaCOLONIA="app/View/admin/Direcciones/Colonia/AddColoniaView.php";

        $modelodir=new DireccionModel();
        $direcciones=$modelodir->getAll();
        $vistaCALLE="app/View/admin/Direcciones/Direccion/AddDireccionView.php";

        include_once("app/View/admin/PlantillaInicioAdminView.php");
    }else{
        $vista="app/View/InicioView.php";
        include_once("app/View/PlantillaInicioView.php");
    }  
    }
   
}
?>