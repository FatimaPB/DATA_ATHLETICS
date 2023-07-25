<?php

require_once("app/Model/EstadoModel.php");
class EstadoController{
    private $vista;
    private $modelo;

    public function index(){
        session_start();
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        $vista="app/View/admin/Direcciones/Estado/ShowEstadoView.php";
        $modelo=new EstadoModel();
        $datos=$modelo->getAll();
        include_once("app/View/admin/PlantillaInicioAdminView.php");
        }else{
        $vista="app/View/InicioView.php";
        include_once("app/View/PlantillaInicioView.php");
        }
        
    }
    public function CFAdd(){
        session_start();
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        $vista="app/View/admin/Direcciones/Estado/AddEstadoView.php";
        include_once("app/View/admin/PlantillaInicioAdminView.php");
        }else{
        $vista="app/View/InicioView.php";
        include_once("app/View/PlantillaInicioView.php");
        }
    }
    //creamos el metodo para agregar un usuario
    public function Add(){
        //verificamos que el metodo venga por post
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //creamos un arreglo para almacenar los datos del formulario
            $datos=array(
                'Estado'=>$_POST['nomEstado']
            );
            //creamos una instancia de UserModel
            $modelo=new EstadoModel();
            //llamamos al metodo add
            $result=$modelo->add($datos);
            
            //verificamos el resultado
            if($result){
                //si es verdadero lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=AllDireccionesController&M=index');
            }else{
                //si es falso lo redireccionamos a la vista de agregar usuario
                header('Location: http://localhost/pruebaplayeras/?C=AllDireccionesController&M=index');
            }
        }
    }
    public function CFEdit(){
        //verificamos que el metodo venga por get
        if($_SERVER['REQUEST_METHOD']=='GET'){
            //creamos una instancia de UserModel
            $modelo=new EstadoModel();
            //llamamos al metodo getById
            $estados=$modelo->getById($_GET['id']);
            //verificamos el resultado
            if($estados){
                session_start();
                if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
                {
                //si es verdadero lo redireccionamos a la vista de editar usuario
                $vista="app/View/admin/Direcciones/Estado/EditEstadoView.php";
                include_once("app/View/admin/PlantillaInicioAdminView.php");
                }else{
                $vista="app/View/InicioView.php";
                include_once("app/View/PlantillaInicioView.php");
                }
            }else{
                //si es falso lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=AllDireccionesController&M=index');
            }
        }
    }
    public function Edit(){
        //verificamos que el metodo de envio de datos sea POST
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos=array(
                'id_estado'=>$_POST['id'],//agregamos el id del usuario a editar
                'Estado'=>$_POST['nomEstado']
            );
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo=new EstadoModel();
            $modelo->update($datos);
            //redireccionamos al index de usuarios
            header("Location:http://localhost/pruebaplayeras/?C=AllDireccionesController&M=index");
        }
    }
    public function Delete(){
        //verificamos que el metodo de envio de datos sea GET
        if($_SERVER['REQUEST_METHOD']=='GET'){
            //obtenemos el id del usuario a eliminar
            $id=$_GET['id'];
            //llamamos al metodo del modelo que elimina al usuario de la base de datos
            $modelo=new EstadoModel();
            $result=$modelo->Delete($id);
            //verificamos el resultado
            if($result){
                //si es verdadero lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=AllDireccionesController&M=index');
            }else{
                //si es falso lo redireccionamos a la vista de agregar usuario
                header('Location: http://localhost/pruebaplayeras/?C=DefaultController&M=index');
            }
            
        }
    }

}
?>