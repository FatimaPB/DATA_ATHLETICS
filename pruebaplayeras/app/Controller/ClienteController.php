<?php
require_once("app/Model/ClienteModel.php");
require_once("app/Model/EstadoModel.php");
require_once("app/Model/MunicipioModel.php");
require_once("app/Model/ColoniaModel.php");
require_once("app/Model/DireccionModel.php");
class ClienteController{
    private $vista;
    private $modelo;
    private $modelop;
    private $modelo2;
    

    public function index(){
        $vista="app/View/public/Clientes/UserLoginView.php";
        include_once("app/View/public/PlantillaInicioView.php");
    }

    public function CFLogin(){
        $vista="app/View/public/Clientes/UserLoginView.php";
        include_once("app/View/PlantillaInicioView.php");
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
        $vista="app/View/public/Clientes/AddClienteView.php";
        include_once("app/View/PlantillaInicioView.php");
    }
    public function Login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $vista="app/View/public/InicioView.php";
            $this->modelo=new ClienteModel();
            $usuario=$this->modelo->getCredenctials($_POST['user'],$_POST['password']);
            if($usuario==false){
                //$vista="app/View/admin/Empleados/NoLogeadoEmpleadoView.php"
                
                include_once("app/View/PlantillaInicioView.php");
            }
            else{
                session_start();
                $_SESSION['logedin']=true;//con esto indicamos que se estarán manejando sesiones guardadas para utilizarlas en el sitio
                $_SESSION['id']=$usuario['idCliente'];
                include_once("app/View/public/PlantillaInicioView.php");
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
                'Nombre'=>$_POST['nombre'],
                'APaterno'=>$_POST['apaterno'],
                'AMaterno'=>$_POST['amaterno'],
                'NumIne'=>$_POST['numine'],
                'Edad'=>$_POST['edad'],
                'Email'=>$_POST['email'],
                'Usuario'=>$_POST['user'],
                'Pass'=>$_POST['pass'],
                'idDireccion'=>$_POST['Direccion'],
                'TipoSangre'=>$_POST['TP'],
                'Padecimientos'=>$_POST['Pad'],
                'Alergias'=>$_POST['ale'],
                'Medicamentos'=>$_POST['Med']
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
            $nombreArchivo = uniqid('Foto_') . '.' . $extencion;
            //definimos la ruta destino
            $rutaDestino = "app/src/img/Clientes/" . $nombreArchivo;
            //movemos el archivo de la tura temporal al destino final
            if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                echo "Error al cargar el archivo al servidor";
                exit;
            }
            //ahora si incluimos el nombre al arreglo que se almacena en la bd
            $datos['Foto'] = $nombreArchivo;
        }
            //creamos una instancia de UserModel
            $modelo=new ClienteModel();
            //llamamos al metodo add
            $result=$modelo->add($datos);
            //verificamos el resultado
            if($result){
                //si es verdadero lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=ClienteController&M=index');
            }else{
                //si es falso lo redireccionamos a la vista de agregar usuario
                header('Location: http://localhost/pruebaplayeras/?C=ClienteController&M=index');
            }
        }
    }
    public function CFEdit(){
        //verificamos que el metodo venga por get
        if($_SERVER['REQUEST_METHOD']=='GET'){
            //creamos una instancia de UserModel
            $modelo=new ClienteModel();
            //llamamos al metodo getById
            $datos=$modelo->getById($_GET['id']);
            //verificamos el resultado
            if($datos){
                //si es verdadero lo redireccionamos a la vista de editar usuario
                session_start();
                if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
                {
                    $modeloEs=new EstadoModel();
                    $estados=$modeloEs->getAll();
                    $modeloMun=new MunicipioModel();
                    $muncipios=$modeloMun->getAll();
                    $modelocolo=new ColoniaModel();
                    $colonias=$modelocolo->getAll();
                    $modelodir=new DireccionModel();
                    $direcciones=$modelodir->getAll();
                    $vista="app/View/public/Clientes/EditClienteView.php";
                    include_once("app/View/public/PlantillaInicioView.php");
                }else{
                    $vista="app/View/InicioView.php";
                    include_once("app/View/PlantillaInicioView.php");
                }   
            }else{
                //si es falso lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=DefaultController&M=index');
            }
        }
    }
    public function Edit()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos=array(
                'idCliente'=>$_POST['id'],
                'Nombre'=>$_POST['nombre'],
                'APaterno'=>$_POST['apaterno'],
                'AMaterno'=>$_POST['amaterno'],
                'NumIne'=>$_POST['numine'],
                'Edad'=>$_POST['edad'],
                'Email'=>$_POST['email'],
                'Usuario'=>$_POST['user'],
                'Pass'=>$_POST['pass'],
                'idDireccion'=>$_POST['Direccion'],
                'TipoSangre'=>$_POST['TP'],
                'Padecimientos'=>$_POST['Pad'],
                'Alergias'=>$_POST['ale'],
                'Medicamentos'=>$_POST['Med']
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
            $nombreArchivo = uniqid('Foto_') . '.' . $extencion;
            //definimos la ruta destino
            $rutaDestino = "app/src/img/Clientes/" . $nombreArchivo;
            //movemos el archivo de la tura temporal al destino final
            if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                echo "Error al cargar el archivo al servidor";
                exit;
            }
                //eliminamos el archivo anterior
                //obtengo los datos originales para tener el nombre de la imagen anterior
                $this->modelo = new ClienteModel();
                $anterior = $this->modelo->getById($_POST['id']);
                if (!empty($anterior['Foto'])) {
                    unlink("app/src/img/Clientes/" . $anterior['Foto']);
                }
                //ahora si incluimos el nombre al arreglo que se almacena en la bd
                $datos['Foto'] = $nombreArchivo;
            } else {
                $datos['Foto'] = $_POST['ava'];
            }

            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo = new ClienteModel();
            $modelo->update($datos);
            //redireccionamos al index de usuarios
            header("Location: http://localhost/pruebaplayeras/?C=DefaultController&M=indexpublic");
        }
    }
}
?>