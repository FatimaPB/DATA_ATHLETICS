<?php

require_once("app/Model/MunicipioModel.php");

class MunicipioController{
    private $vista;
    private $modelo;
    private $modeloEs;

    public function index(){
        session_start();
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        $vista="app/View/admin/Direcciones/Municipio/ShowMunicipioView.php";
        $modelo=new MunicipioModel();
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
        $vista="app/View/admin/Direcciones/Municipio/AddMunicipioView.php";
        $modeloEs= new EstadoModel();
        $estados=$modelo->getAll();
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
            $datosMUN=array(
                'Ciudad'=>$_POST['nomMunicipio'],
                'id_Estado'=>$_POST['nomEstado']
            );
            //creamos una instancia de UserModel
            $modelo=new MunicipioModel();
            //llamamos al metodo add
            $result=$modelo->add($datosMUN);
            
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
            $modelo=new MunicipioModel();
            //llamamos al metodo getById
            $municipios=$modelo->getById($_GET['id']);
            //verificamos el resultado
            if($municipios){
                session_start();
                if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
                {
                //si es verdadero lo redireccionamos a la vista de editar usuario
                $vista="app/View/admin/Direcciones/Municipio/EditMunicipioView.php";
                require_once("app/Model/EstadoModel.php");
                $modeloEs= new EstadoModel();
                $estados=$modeloEs->getAll();
                }else{
                $vista="app/View/InicioView.php";
                include_once("app/View/PlantillaInicioView.php");
                }
                
                include_once("app/View/admin/PlantillaInicioAdminView.php");
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
            $datosMUN=array(
                'id_ciudad'=>$_POST['id'],//agregamos el id del usuario a editar
                'Ciudad'=>$_POST['nomCiudad'],
                'id_Estado'=>$_POST['nomEstado']
            );
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo=new MunicipioModel();
            $modelo->update($datosMUN);
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
            $modelo=new MunicipioModel();
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