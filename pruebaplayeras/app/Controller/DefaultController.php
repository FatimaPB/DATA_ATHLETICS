<?php
//en esta clase definimos el controlador por default, este se llama cunado no indicamos 
//a que controlador queremos llamar 
class DefaultController{

    //nuestro controlador por default tendra una variable llamada vista que llmara a la 
    //ventana espesifica que yo quiero mostrar en la plantilla
    private $vista;

    //metodo por default este metodo es el encargado de cargar la plnatilla en pantalla
    //junto con la vista que quiero mostrar
    public function index(){
        //inicializamos vista con la ruta de la pantalla que queremos llamar
        $vista="app/View/InicioView.php";
        //cargamos la plantilla del administrador que por default se lleva a la variable 
        //vista
        include_once("app/View/PlantillaInicioView.php");
    }
    public function indexpublic(){
        //inicializamos vista con la ruta de la pantalla que queremos llamar
         $vista="app/View/public/InicioView.php";
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
        {
        //cargamos la plantilla del administrador que por default se lleva a la variable 
        //vista
        include_once("app/View/public/PlantillaInicioView.php");
        }else{
            include_once("app/View/PlantillaInicioView.php");
        }        
    }
    public function indexadmin(){
        //inicializamos vista con la ruta de la pantalla que queremos llamar
        $vista="app/View/admin/Empleados/LoginEmpleadoView.php";
        include_once("app/View/admin/Empleados/PlantillaInicioEmpleadoView.php");   
    }
    public function indexadmin2(){
        session_start();
        //inicializamos vista con la ruta de la pantalla que queremos llamar
        $vista="app/View/admin/InicioView.php";
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        include_once("app/View/admin/PlantillaInicioAdminView.php");
        }else{
        include_once("app/View/PlantillaInicioView.php");
        }    
    }
}
?>