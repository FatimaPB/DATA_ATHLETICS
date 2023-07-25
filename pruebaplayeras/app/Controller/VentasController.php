<?php
//en esta clase definimos el controlador por default, este se llama cunado no indicamos 
//a que controlador queremos llamar 
require_once("app/Model/PrendaModel.php");
class VentasController{
    //nuestro controlador por default tendra una variable llamada vista que llmara a la 
    //ventana espesifica que yo quiero mostrar en la plantilla
    private $vista;
    private $modelo;
    private $modeloP;
    //metodo por default este metodo es el encargado de cargar la plnatilla en pantalla
    //junto con la vista que quiero mostrar
    public function index(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            session_start();
            //creamos una instancia de UserModel
            $modelo=new PrendaModel();
            //llamamos al metodo getById
            $datos=$modelo->getById($_GET['id']);
            //verificamos el resultado
            if($datos){
                $modeloP=new PrendaModel();
                $datos=$modeloP->getById($_GET['id']);
                $vista="app/View/public/Venta/VentasView.php";
                if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
                {
                include_once("app/View/public/PlantillaInicioView.php");
                }else{
                include_once("app/View/PlantillaInicioView.php");
                }
            }else{
                //si es falso lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=DefaultController&M=index');
            }
        }
    }
    public function CFVender(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            session_start();
            if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
            {
                $vista="app/View/public/Venta/Vender.php";
                include_once("app/View/public/PlantillaInicioView.php");
            }else{
                header('Location: http://localhost/pruebaplayeras/?C=ClienteController&M=CFLogin');
            }
        }
    }
    public function Vender(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            session_start();
            if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
            {
                //aqui se hace el proceso de venta hacia el usuario
            }else{
                header('Location: http://localhost/pruebaplayeras/?C=DefaultController&M=indexpublic');
            }
        }
    }
}
?>