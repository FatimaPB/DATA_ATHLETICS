<?php
    class CorteModel{
        //definimos el atributo para conectar el modelo de usuario a la base de datos
        private $CorteConnection;

        //creamos el contructor de la clase para inicializar nuestro atributo UserConnection
        public function __construct(){
            //requerimos llamar a la clase DBConnection
            require_once('app/config/DBConnection.php');
            //instanciamos a UserConnection de DBConnection
            $this->CorteConnection=new DBConnection();
        }

        //ahora si viene la ligica del modelo
        
        //metodo para obtener todos los estados de la tabla tblestado
        public function getAll(){
            //paso 1 creo la consulta
            $sql="CALL SP_CONSULTACORTE()";
            //paso 2 obtengo la coneccion a la base de datos 
            $connection =$this->CorteConnection->getConnection();
            //paso 3 ejecuto la consulta 
            $result= $connection->query($sql);
            //paso 4 verifico errores y acomodo el resultado
            //paso 4.1 creamos un arreglo que alamacene los resultados 
            $cortes=array();
            //paso 4.2 recorremos $result para ir pasando cada rengon al $users
            while($dato=$result->fetch_assoc()){
                $cortes[]=$dato;
            }
            //paso 5 cierro la coneccion a la bd
            $this->CorteConnection->closeConnection();
            //paso 6 arrojo resultados 
            return $cortes;
        }
        //metodo que obtiene un usuario por su id
        public function getById($id){
            //creamos consulta
            $sql="CALL SP_GETCORTEBYID($id)";
            //obtenemos la coneccion 
            $connection=$this->CorteConnection->getConnection();
            //ejecutamos la consulta
            $reslt=$connection->query($sql);
            //verificamos que traiga datos y los sacamos a una variable
            if($reslt && $reslt->num_rows > 0){
                $corte=$reslt->fetch_assoc();
            }else{
                $corte=false;
            }
            //cerramos la coneccion
            $this->CorteConnection->closeConnection();
            //arrojamos resultados
            return $corte;
        }
        
        //metodo para insertar un estado
        public function add($datos){
            //paso1 creamos la consulta
            $sql="CALL SP_INSERTARCORTE('".$datos['Corte']."');";
            //paso 2 conectamos a la base de datos
            $connection =$this->CorteConnection->getConnection();
            //paso 3 ejecutamos la consulta
            $reslt = $connection->query($sql);
            //paso 4 preparamos la respuesta
            if($reslt){
                $res=true;
            }else{
                $res=false;
            }
            //paso 5 cerramos la coneccion
            $this->CorteConnection->closeConnection();
            //paso 6 arrojamos resultados
            return $res;
        }
        //metodo para editar un usuario
        public function update($datos){
            //paso1 creamos la consulta
            $sql="CALL SP_ACTUALIZARCORTE('".$datos['id_corte']."','".$datos['Corte']."')";
            //paso 2 conectamos a la base de datos
            $connection =$this->CorteConnection->getConnection();
            //paso 3 ejecutamos la consulta
            $reslt = $connection->query($sql);
            //paso 4 preparamos la respuesta
            if($reslt){
                $res=true;
            }else{
                $res=false;
            }
            //paso 5 cerramos la coneccion
            $this->CorteConnection->closeConnection();
            //paso 6 arrojamos resultados
            return $res;
        }
        public function Delete($id){
            //paso1 creamos la consulta
            $sql="CALL SP_ELIMINARCORTE('$id')";
            //paso 2 conectamos a la base de datos
            $connection =$this->CorteConnection->getConnection();
            //paso 3 ejecutamos la consulta
            $reslt = $connection->query($sql);
            //paso 4 preparamos la respuesta
            if($connection->affected_rows==1){
                $res=true;
            }else{
                $res=false;
            }
            //paso 5 cerramos la coneccion
            $this->CorteConnection->closeConnection();
            //paso 6 arrojamos resultados
            return $res;
        }
    
    }
?>