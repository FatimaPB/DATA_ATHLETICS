<?php
    class ClienteModel{
        //definimos el atributo para conectar el modelo de usuario a la base de datos
        private $ClienteConnection;

        //creamos el contructor de la clase para inicializar nuestro atributo UserConnection
        public function __construct(){
            //requerimos llamar a la clase DBConnection
            require_once('app/config/DBConnection.php');
            //instanciamos a UserConnection de DBConnection
            $this->ClienteConnection=new DBConnection();
        }

        //ahora si viene la logica del modelo
        
        //metodo para obtener todos los usuarios de la tabla empleados
        public function getAll(){
            //paso 1 creo la consulta
            $sql="CALL SP_GETALLCLIENTES()";
            //paso 2 obtengo la coneccion a la base de datos 
            $connection =$this->ClienteConnection->getConnection();
            //paso 3 ejecuto la consulta 
            $result= $connection->query($sql);
            //paso 4 verifico errores y acomodo el resultado
            //paso 4.1 creamos un arreglo que alamacene los resultados 
            $users=array();
            //paso 4.2 recorremos $result para ir pasando cada rengon al $users
            while($user=$result->fetch_assoc()){
                $users[]=$user;
            }
            //paso 5 cierro la coneccion a la bd
            $this->ClienteConnection->closeConnection();
            //paso 6 arrojo resultados 
            return $users;
        }
        //metodo que obtiene un usuario por su id
        public function getById($id){
            //creamos consulta
            $sql="CALL SP_GETCLIENTESBYID('$id')";
            //obtenemos la coneccion 
            $connection=$this->ClienteConnection->getConnection();
            //ejecutamos la consulta
            $reslt=$connection->query($sql);
            //verificamos que traiga datos y los sacamos a una variable
            if($reslt && $reslt->num_rows > 0){
                $user=$reslt->fetch_assoc();
            }else{
                $user=false;
            }
            //cerramos la coneccion
            $this->ClienteConnection->closeConnection();
            //arrojamos resultados
            return $user;
        }

        //metodo que nos permita hacer un logueo
        public function getCredenctials($us,$ps){
            //paso 1 creo la consulta
            $sql="CALL SP_GETCREDENTIALCLIENTES('$us','$ps')";
            //paso 2 obtengo la coneccion a la base de datos 
            $connection =$this->ClienteConnection->getConnection();
            //paso 3 ejecuto la consulta 
            $result= $connection->query($sql);
            //paso 4 verifico errores y acomodo el resultado
            //verificamos que la conslta traiga resultados
            if($result && $result->num_rows > 0){
                $user=$result->fetch_assoc();
            }else{
                $user=false;
            }
            //paso 5 cierro la coneccion a la bd
            $this->ClienteConnection->closeConnection();
            //paso 6 arrojo resultados 
            return $user;
        }

        //metodo para insertar un usuario
        public function add($datos){
            //paso1 creamos la consulta
            $sql="CALL SP_INSERTARCLIENTE('".$datos['Nombre']."','".$datos['APaterno']."','".$datos['AMaterno']."','".$datos['numIne']."',
            '".$datos['Edad']."','".$datos['Foto']."','".$datos['Email']."','".$datos['Usuario']."','".$datos['Password']."','".$datos['idDireccion']."',
            '".$datos['TipoSangre']."','".$datos['Padecimientos']."','".$datos['Alergias']."','".$datos['Medicamentos']."');";
            //paso 2 conectamos a la base de datos
            $connection =$this->ClienteConnection->getConnection();
            //paso 3 ejecutamos la consulta
            $reslt = $connection->query($sql);
            //paso 4 preparamos la respuesta
            if($reslt){
                $res=true;
            }else{
                $res=false;
            }
            //paso 5 cerramos la coneccion
            $this->ClienteConnection->closeConnection();
            //paso 6 arrojamos resultados
            return $res;
        } 
        public function update($datos){
            //paso1 creamos la consulta
            $sql="CALL SP_ACTUALIZARCLIENTE('".$datos['idCliente']."','".$datos['Nombre']."','".$datos['APaterno']."','".$datos['AMaterno']."','".$datos['NumIne']."',
            '".$datos['Edad']."','".$datos['Foto']."','".$datos['Email']."','".$datos['Usuario']."','".$datos['Pass']."','".$datos['idDireccion']."',
            '".$datos['TipoSangre']."','".$datos['Padecimientos']."','".$datos['Alergias']."','".$datos['Medicamentos']."');";
            //paso 2 conectamos a la base de datos
            $connection =$this->ClienteConnection->getConnection();
            //paso 3 ejecutamos la consulta
            $reslt = $connection->query($sql);
            //paso 4 preparamos la respuesta
            if($reslt){
                $res=true;
            }else{
                $res=false;
            }
            //paso 5 cerramos la coneccion
            $this->ClienteConnection->closeConnection();
            //paso 6 arrojamos resultados
            return $res;
        }
        
    }
?>