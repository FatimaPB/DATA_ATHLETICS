<?php
require_once("app/Model/PrendaModel.php");
require_once("app/Model/CorteModel.php");
require_once("app/Model/TallaModel.php");
require_once("app/Model/ColorModel.php");
require_once("app/Model/MaterialModel.php");
class PrendaController{
    private $vista;
    private $modelocorte;
    private $modelotalla;
    private $modelocolor;
    private $modelomaterial;

    public function indexpublic(){
        $vista="app/View/public/Prenda/PrendaPublicView.php";
        $modelo=new PrendaModel();
        $prendas=$modelo->getAll();
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
        {
        include_once("app/View/public/PlantillaInicioView.php");
        }else{
        include_once("app/View/PlantillaInicioView.php");
        }   
    }
    public function index(){
        
        $vista="app/View/public/Prenda/PrendaPublicView.php";
        $modelo=new PrendaModel();
        $prendas=$modelo->getAll();
        include_once("app/View/PlantillaInicioView.php");
    }
    public function indexadmin(){
        session_start();
        if(isset($_SESSION['loged']) && $_SESSION['loged']==true)
        {
        $vista="app/View/admin/Prenda/PrendaAdminView.php";
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
        $modelocorte=new CorteModel();
        $cortes=$modelocorte->getAll();
        $modelotalla=new TallaModel();
        $tallas=$modelotalla->getAll();
        $modelocolor=new ColorModel();
        $colores=$modelocolor->getAll();
        $modelomaterial=new MaterialModel();
        $materiales=$modelomaterial->getAll();
        $vista="app/View/admin/prenda/PPrenda/AddPrendaView.php";
        include_once("app/View/admin/PlantillaInicioAdminView.php");
        }else{
        $vista="app/View/InicioView.php";
        include_once("app/View/PlantillaInicioView.php");
        }
    }
     //creamos el metodo para agregar una prenda
    public function Add(){
        //verificamos que el metodo venga por post
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //creamos un arreglo para almacenar los datos del formulario
            $prendas=array(
                'model'=>$_POST['nomModel'],
                'Gen'=>$_POST['genero'],
                'PrecioV'=>$_POST['PrecioV'],
                'iv'=>$_POST['iva'],
                'idCorte'=>$_POST['corte'],
                'idTalla'=>$_POST['talla'],
                'idColor'=>$_POST['color'],
                'exi'=>$_POST['existencia'],
                'maxi'=>$_POST['maximo'],
                'mini'=>$_POST['minimo'],
                'idMat'=>$_POST['material'],
                'porc'=>$_POST['porcentaje'],
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
            $rutaDestino = "app/src/img/products/" . $nombreArchivo;
            //movemos el archivo de la tura temporal al destino final
            if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                echo "Error al cargar el archivo al servidor";
                exit;
            }
            //ahora si incluimos el nombre al arreglo que se almacena en la bd
            $prendas['Foto'] = $nombreArchivo;
        }
            //creamos una instancia de UserModel
            $modelo=new PrendaModel();
            //llamamos al metodo add
            $result=$modelo->add($prendas);
            //verificamos el resultado
            if($result){
                //si es verdadero lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=ShowPrendasController&M=index');
            }else{
                //si es falso lo redireccionamos a la vista de agregar usuario
                header('Location: http://localhost/pruebaplayeras/?C=PrendaController&M=CFAdd');
            }
           
        }
    }
    public function CFEdit(){
        //verificamos que el metodo venga por get
        if($_SERVER['REQUEST_METHOD']=='GET'){
            //creamos una instancia de UserModel
            $modelo=new PrendaModel();
            //llamamos al metodo getById
            $datos=$modelo->getById($_GET['id']);
            //verificamos el resultado
            if($datos){
                //si es verdadero lo redireccionamos a la vista de editar usuario
                $vista="app/View/admin/Prenda/PPrenda/EditPrendaView.php";
                $modelocorte=new CorteModel();
                $cortes=$modelocorte->getAll();
                $modelotalla=new TallaModel();
                $tallas=$modelotalla->getAll();
                $modelocolor=new ColorModel();
                $colores=$modelocolor->getAll();
                $modelomaterial=new MaterialModel();
                $materiales=$modelomaterial->getAll();
                include_once("app/View/admin/PlantillaInicioAdminView.php");
            }else{
                //si es falso lo redireccionamos a la vista de usuarios
                header('Location: http://localhost/pruebaplayeras/?C=ShowPrendasController&M=index');
            }
        }
    }
    public function Edit()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $prendas=array(
                'id_prenda'=> $_POST['id'],
                'model'=>$_POST['nomModel'],
                'Gen'=>$_POST['genero'],
                'PrecioV'=>$_POST['PrecioV'],
                'iv'=>$_POST['iva'],
                'idCorte'=>$_POST['corte'],
                'idTalla'=>$_POST['talla'],
                'idColor'=>$_POST['color'],
                'exi'=>$_POST['existencia'],
                'maxi'=>$_POST['maximo'],
                'mini'=>$_POST['minimo'],
                'idMat'=>$_POST['material'],
                'porc'=>$_POST['porcentaje'],
                'Foto'=>$_POST['ava']
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
            $rutaDestino = "app/src/img/products/" . $nombreArchivo;
            //movemos el archivo de la tura temporal al destino final
            if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                echo "Error al cargar el archivo al servidor";
                exit;
            }
                //eliminamos el archivo anterior
                //obtengo los datos originales para tener el nombre de la imagen anterior
                $this->modelo = new PrendaModel();
                $anterior = $this->modelo->getById($_POST['id']);
                if (!empty($anterior['Foto'])) {
                    unlink("app/src/img/products/" . $anterior['Foto']);
                }
                //ahora si incluimos el nombre al arreglo que se almacena en la bd
                $prendas['Foto'] = $nombreArchivo;
            } else {
                $prendas['Foto'] = $_POST['ava'];
            }

            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo = new PrendaModel();
            $modelo->update($prendas);
            //redireccionamos al index de usuarios
            header("Location:http://localhost/pruebaplayeras/?C=ShowPrendasController&M=index");
        }
    }
    //Creamos el metodo para eliminar un usuario de la base de datos, este metodo se llamara una vez que 
        //se haya confirmado la eliminacion del usuario en la vista de index mediante un confirm de javascript
        public function Delete()
        {
            //verificamos que el metodo de envio de datos sea GET
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                //obtenemos el id del usuario a eliminar
                $id = $_GET['id'];
                //llamamos al metodo del modelo que elimina al usuario de la base de datos
                $this->modelo = new PrendaModel();
                $dato = $this->modelo->getById($_GET['id']);
                $modelo2 = new PrendaModel();
                $modelo2->Delete($id);
                if (!empty($dato['Foto'])) {
                    unlink("app/src/img/products/" . $dato['Foto']);
                }
            }
    
            //redireccionamos al index de usuarios
            header("Location:http://localhost/pruebaplayeras/?C=ShowPrendasController&M=index");
        }
}
?>
