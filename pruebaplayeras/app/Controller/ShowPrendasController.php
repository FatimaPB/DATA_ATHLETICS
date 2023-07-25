<?php
require_once("app/Model/PrendaModel.php");
//en esta clase definimos el controlador por default, este se llama cunado no indicamos 
//a que controlador queremos llamar 
class ShowPrendasController{

    //nuestro controlador por default tendra una variable llamada vista que llmara a la 
    //ventana espesifica que yo quiero mostrar en la plantilla
    private $vista;
    private $modelo;
    private $modelopren;
    //metodo por default este metodo es el encargado de cargar la plnatilla en pantalla
    //junto con la vista que quiero mostrar
    public function index(){
        session_start();
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        $modelopren=new PrendaModel();
        $prendas=$modelopren->getAll();
        $vista="app/View/admin/Prenda/ShowPrendasView.php";
        include_once("app/View/admin/PlantillaInicioAdminView.php");
        }else{
        $vista="app/View/InicioView.php";
        include_once("app/View/PlantillaInicioView.php");
        }
        
    }
}
?>