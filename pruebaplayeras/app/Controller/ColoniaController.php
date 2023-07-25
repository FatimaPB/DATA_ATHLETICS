<?php

require_once("app/Model/ColoniaModel.php");

class ColoniaController{
    private $vista;
    private $modelo;
    private $modeloMun;

    public function index(){
        session_start();
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        $vista="app/View/admin/Direcciones/Colonia/ShowColoniaView.php";
        $modelo=new ColoniaModel();
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
        $vista="app/View/admin/Direcciones/Colonia/AddColoniaView.php";
        $modeloMun= new MunicipioModel();
        $municipios=$modeloMun->getAll();
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
            $datosCOL=array(
                'Colonia'=>$_POST['nomColonia'],
                'id_Ciudad'=>$_POST['nomMunicipio']
            );
            //creamos una instancia de UserModel
            $modelo=new ColoniaModel();
            //llamamos al metodo add
            $result=$modelo->add($datosCOL);
            
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
            $modelo=new ColoniaModel();
            //llamamos al metodo getById
            $colonias=$modelo->getById($_GET['id']);
            //verificamos el resultado
            if($colonias){
                
                //si es verdadero lo redireccionamos a la vista de editar usuario
                session_start();
                if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
                {
                $vista="app/View/admin/Direcciones/Colonia/EditColoniaView.php";
                require_once("app/Model/MunicipioModel.php");
                $modeloMun= new MunicipioModel();
                $municipios=$modeloMun->getAll();
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
            $datosCOL=array(
                'id_colonia'=>$_POST['id'],//agregamos el id del usuario a editar
                'Colonia'=>$_POST['nomColonia'],
                'id_Ciudad'=>$_POST['nomMunicipio']
            );
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo=new ColoniaModel();
            $modelo->update($datosCOL);
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
            $modelo=new ColoniaModel();
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