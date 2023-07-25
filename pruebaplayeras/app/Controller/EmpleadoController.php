<?php
require_once("app/Model/EmpleadoModel.php");
require_once("app/Model/EstadoModel.php");
require_once("app/Model/MunicipioModel.php");
require_once("app/Model/ColoniaModel.php");
require_once("app/Model/DireccionModel.php");
class EmpleadoController{
    private $vista;
    private $modelo;
    private $modeloEmp;
    private $modeloEs;
    private $modeloMun;
    private $modelocolo;
    private $modelodir;
    private $modeloEm;

    public function index(){
        $modelo=new EmpleadoModel;
        $empleados=$modelo->getAll();
        $vista="app/View/admin/Empleados/ShowEmpleadoView.php";
        include_once("app/View/admin/PlantillaInicioAdminView.php");
    }
    
    public function CFLogin(){

        $vista="app/View/admin/Empleados/LoginEmpleadoView.php";
        include_once("app/View/admin/Empleados/PlantillaInicioEmpleadoView.php");
    }
    public function CFAdd(){
        $modeloEs=new EstadoModel();
        $estados=$modeloEs->getAll();
        $modeloMun=new MunicipioModel();
        $muncipios=$modeloMun->getAll();
        $modelocolo=new ColoniaModel();
        $colonias=$modelocolo->getAll();
        $modelodir=new DireccionModel();
        $direcciones=$modelodir->getAll();
        $modeloEm=new EmpleadoModel();
        $cargos=$modeloEm->getAllCargo();
        $vista="app/View/admin/Empleados/AddEmpleadoView.php";
        include_once("app/View/admin/PlantillaInicioAdminView.php");
    }
    public function Login(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $vista="app/View/admin/InicioView.php";
            $this->modelo=new EmpleadoModel();
            $usuario=$this->modelo->getCredenctials($_POST['user'],$_POST['password']);
            if($usuario==false){
                //$vista="app/View/admin/Empleados/NoLogeadoEmpleadoView.php"
                include_once("app/View/admin/Empleados/PlantillaInicioEmpleadoView.php");
            }
            else{
                session_start();
                $_SESSION['loged']=true;//con esto indicamos que se estarán manejando sesiones guardadas para utilizarlas en el sitio
                include_once("app/View/admin/PlantillaInicioAdminView.php");
            }
        }
   
    }
    public function cerrarsesion()
	{
        session_start();
		session_destroy();
        $vista="app/View/public/InicioView.php";
        include_once("app/View/PlantillaInicioView.php");
	}
    //creamos el metodo para agregar un usuario
    public function Add(){
        //verificamos que el metodo venga por post
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //creamos un arreglo para almacenar los datos del formulario
            $datos=array(
                'RFC'=>$_POST['rfc'],
                'Nombre'=>$_POST['nombre'],
                'APaterno'=>$_POST['apaterno'],
                'AMaterno'=>$_POST['amaterno'],
                'Telefono'=>$_POST['tel'],
                'numIne'=>$_POST['ine'],
                'email'=>$_POST['correo'],
                'CURPP'=>$_POST['curp'],
                'Pass'=>$_POST['pasword'],
                'Usuario'=>$_POST['user'],
                'cargo'=>$_POST['cargoo'],
                'dir'=>$_POST['Direccion']
            );

            //procesamiento del archivo
           if (isset($_FILES['fot']) && $_FILES['fot']['error'] === UPLOAD_ERR_OK) {
            //OBTENEMOS LA INFORMACION DEL ARCHIVO CARGADO EN EL FORMULARIO
            $nombreArchivo = $_FILES['fot']['name'];
            $tipoArchivo = $_FILES['fot']['type'];
            $tamanoArchivo = $_FILES['fot']['size'];
            $rutaTemporal = $_FILES['fot']['tmp_name'];
            //validamos que el formato del archivo sea el indicado
            $extenciones = array('jpg', 'jpeg', 'png');
            $extencion = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            if (!in_array($extencion, $extenciones)) {
                echo "El archivo tiene un formato no valido";
                exit;
            }
            //validamos el tamaño maximo del archivo
            $tamanomaximo = 2 * 1024 * 1024;
            if ($tamanoArchivo > $tamanomaximo) {
                echo "El archivo es muy grande, intenta con uno que pese menos";
                exit;
            }

            //definimos el nombre que va a tener la imagen en el servidor 
            $nombreArchivo = uniqid('foto_') . '.' . $extencion;
            //definimos la ruta destino
            $rutaDestino = "app/src/img/empleados/" . $nombreArchivo;
            //movemos el archivo de la tura temporal al destino final
            if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                echo "Error al cargar el archivo al servidor";
                exit;
            }
            //ahora si incluimos el nombre al arreglo que se almacena en la bd
            $datos['foto'] = $nombreArchivo;
        }
            
            //creamos una instancia de UserModel
            $modelo=new EmpleadoModel();
            //llamamos al metodo add
            $result=$modelo->add($datos);
            //verificamos el resultado
            if($result){
                //si es verdadero lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=EmpleadoController&M=index');
            }else{
                //si es falso lo redireccionamos a la vista de agregar usuario
                header('Location: http://localhost/pruebaplayeras/?C=EmpleadoController&M=CFAdd');
            }
        }
    }
    //creamos el metodo para llamar al formulario de editar usuario
    public function CFEdit(){
        //verificamos que el metodo venga por get
        if($_SERVER['REQUEST_METHOD']=='GET'){
            //creamos una instancia de UserModel
            $modelo=new EmpleadoModel();
            //llamamos al metodo getById
            $datos=$modelo->getById($_GET['id']);
            //verificamos el resultado
            if($datos){
                //si es verdadero lo redireccionamos a la vista de editar usuario
                $modeloEs=new EstadoModel();
                $estados=$modeloEs->getAll();
                $modeloMun=new MunicipioModel();
                $muncipios=$modeloMun->getAll();
                $modelocolo=new ColoniaModel();
                $colonias=$modelocolo->getAll();
                $modelodir=new DireccionModel();
                $direcciones=$modelodir->getAll();
                $modeloEm=new EmpleadoModel();
                $cargos=$modeloEm->getAllCargo();
                
                
                $vista="app/View/admin/Empleados/EditEmpleadoView.php";
                include_once("app/View/admin/PlantillaInicioAdminView.php");
            }else{
                //si es falso lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=EmpleadoController&M=index');
            }
        }
    }
    public function Edit()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos=array(
                'RFC'=>$_POST['rfc'],
                'Nombre'=>$_POST['nombre'],
                'APaterno'=>$_POST['apaterno'],
                'AMaterno'=>$_POST['amaterno'],
                'Telefono'=>$_POST['tel'],
                'numIne'=>$_POST['ine'],
                'email'=>$_POST['correo'],
                'CURPP'=>$_POST['curp'],
                'Pass'=>$_POST['pasword'],
                'Usuario'=>$_POST['user'],
                'cargo'=>$_POST['cargoo'],
                'dir'=>$_POST['Direccion']
            );
            
            //procesamiento del archivo
           if (isset($_FILES['fot']) && $_FILES['fot']['error'] === UPLOAD_ERR_OK) {
            //OBTENEMOS LA INFORMACION DEL ARCHIVO CARGADO EN EL FORMULARIO
            $nombreArchivo = $_FILES['fot']['name'];
            $tipoArchivo = $_FILES['fot']['type'];
            $tamanoArchivo = $_FILES['fot']['size'];
            $rutaTemporal = $_FILES['fot']['tmp_name'];
            //validamos que el formato del archivo sea el indicado
            $extenciones = array('jpg', 'jpeg', 'png');
            $extencion = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            if (!in_array($extencion, $extenciones)) {
                echo "El archivo tiene un formato no valido";
                exit;
            }
            //validamos el tamaño maximo del archivo
            $tamanomaximo = 2 * 1024 * 1024;
            if ($tamanoArchivo > $tamanomaximo) {
                echo "El archivo es muy grande, intenta con uno que pese menos";
                exit;
            }

            //definimos el nombre que va a tener la imagen en el servidor 
            $nombreArchivo = uniqid('foto_') . '.' . $extencion;
            //definimos la ruta destino
            $rutaDestino = "app/src/img/empleados/" . $nombreArchivo;
            //movemos el archivo de la tura temporal al destino final
            if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                echo "Error al cargar el archivo al servidor";
                exit;
            }
                //eliminamos el archivo anterior
                //obtengo los datos originales para tener el nombre de la imagen anterior
                $this->modelo = new EmpleadoModel();
                $anterior = $this->modelo->getById($_POST['id']);
                if (!empty($anterior['foto'])) {
                    unlink("app/src/img/empleados/" . $anterior['foto']);
                }
                //ahora si incluimos el nombre al arreglo que se almacena en la bd
                $datos['foto'] = $nombreArchivo;
            } else {
                $datos['foto'] = $_POST['ava'];
            }

            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo = new EmpleadoModel();
            $modelo->update($datos);
            //redireccionamos al index de usuarios
            header("Location:http://localhost/pruebaplayeras/?C=EmpleadoController&M=index");
        }
    }
    public function Delete(){
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a eliminar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que elimina al usuario de la base de datos
            $this->modelo = new EmpleadoModel();
            $dato = $this->modelo->getById($_GET['id']);
            $modelo2 = new EmpleadoModel();
            $modelo2->Delete($id);
            if (!empty($dato['foto'])) {
                unlink("app/src/img/empleados/" . $dato['foto']);
            }
        }

        //redireccionamos al index de usuarios
        header("Location:http://localhost/pruebaplayeras/?C=EmpleadoController&M=index");
    }

}
?>