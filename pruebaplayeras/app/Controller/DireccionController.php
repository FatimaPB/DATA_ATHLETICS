<?php

require_once("app/Model/DireccionModel.php");

class DireccionController{
    private $vista;
    private $modelo;
    private $modeloCol;
    private $modelomun;

    public function index(){
        session_start();
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        $vista="app/View/admin/Direcciones/Direccion/ShowDireccionView.php";
        $modelo=new DireccionModel();
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
        $vista="app/View/admin/Direcciones/Direccion/AddDireccionView.php";
        $modeloCol= new ColoniaModel();
        $colonias=$modeloCol->getAll();
        $modelomun=new MunicipioModel();
        $municipios=$modelomun->getAll();
        $modelo=new EstadoModel();
        $datos=$modelo->getAll();
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
            $datosDIR=array(
                'Direccion'=>$_POST['nomDireccion'],
                'id_Colonia'=>$_POST['nomColonia'],
                'costo'=>$_POST['preciocosto']
            );
            //creamos una instancia de UserModel
            $modelo=new DireccionModel();
            //llamamos al metodo add
            $result=$modelo->add($datosDIR);
            
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
            $modelo=new DireccionModel();
            //llamamos al metodo getById
            $direcciones=$modelo->getById($_GET['id']);
            //verificamos el resultado
            if($direcciones){
                session_start();
                if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
                {
                //si es verdadero lo redireccionamos a la vista de editar usuario
                $vista="app/View/admin/Direcciones/Direccion/EditDireccionView.php";
                require_once("app/Model/ColoniaModel.php");
                $modeloCol= new ColoniaModel();
                $colonias=$modeloCol->getAll();
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
            $datosDIR=array(
                'id_direccion'=>$_POST['id'],//agregamos el id del usuario a editar
                'Direccion'=>$_POST['nomDireccion'],
                'id_Colonia'=>$_POST['nomColonia'],
                'costo'=>$_POST['preciocosto']
            );
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo=new DireccionModel();
            $modelo->update($datosDIR);
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
            $modelo=new DireccionModel();
            $result=$modelo->Delete($id);
            //verificamos el resultado
            if($result){
                //si es verdadero lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=AllDireccionesController&M=index');
            }else{
                //si es falso lo redireccionamos a la vista de agregar usuario
                header('Location: http://localhost/pruebaplayeras/?C=DefaultController&M=indexadmin');
            }
            
        }
    }

}
?>