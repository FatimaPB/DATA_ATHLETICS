<?php
    class PrendaModel{
        
        private $PrendaConnection;
        public function __construct(){
            require_once('app/config/DBConnection.php');
            $this->PrendaConnection=new DBConnection();
        }

        //metodo para obtener todos los usuarios de la tabla user
        public function getAll(){
            //paso 1 creo la consulta
            $sql="CALL SP_CONSULTAPRENDATOTAL()";
            $connection =$this->PrendaConnection->getConnection();
            $result= $connection->query($sql);
            $prendas=array();
            while($prenda=$result->fetch_assoc()){
                $prendas[]=$prenda;
            }
            $this->PrendaConnection->closeConnection();
            return $prendas;
        }
        //metodo que obtiene un usuario por su id
        public function getById($id){
            $sql="CALL SP_CONSULTAPRENDAID($id);";
            $connection=$this->PrendaConnection->getConnection();
            $reslt=$connection->query($sql);
            if($reslt && $reslt->num_rows > 0){
                $prenda=$reslt->fetch_assoc();
            }else{
                $prenda=false;
            }
            $this->PrendaConnection->closeConnection();
            //arrojamos resultados
            return $prenda;
        }
        public function consuPrendaMaterial($material){
            $sql="CALL SP_CONSULTAPRENDAxMATERIAL('$material');";
            $connection=$this->PrendaConnection->getConnection();
            $result= $connection->query($sql);
            $prendas=array();
            while($prenda=$result->fetch_assoc()){
                $prendas[]=$prenda;
            }
            $this->PrendaConnection->closeConnection();
            return $prendas;
        }
        public function consuPrendaCorte($corte){
            $sql="CALL SP_CONSULTAPRENDAxCORTE('$corte');";
            $connection=$this->PrendaConnection->getConnection();
            $result= $connection->query($sql);
            $prendas=array();
            while($prenda=$result->fetch_assoc()){
                $prendas[]=$prenda;
            }
            $this->PrendaConnection->closeConnection();
            return $prendas;
        }
        //metodo para insertar un usuario
        public function add($prendas){
            //paso1 creamos la consulta
            $sql="CALL SP_INSERTARPRENDAS('".$prendas['model']."','".$prendas['Gen']."','".$prendas['PrecioV']."','".$prendas['iv']."','".$prendas['Foto']."',
            '".$prendas['idCorte']."','".$prendas['idTalla']."','".$prendas['idColor']."','".$prendas['exi']."',
            '".$prendas['maxi']."','".$prendas['mini']."','".$prendas['idMat']."','".$prendas['porc']."');";
            //paso 2 conectamos a la base de datos
            $connection =$this->PrendaConnection->getConnection();
            //paso 3 ejecutamos la consulta
            $reslt = $connection->query($sql);
            //paso 4 preparamos la respuesta
            if($reslt){
                $res=true;
            }else{
                $res=false;
            }
            //paso 5 cerramos la coneccion
            $this->PrendaConnection->closeConnection();
            //paso 6 arrojamos resultados
            return $res;
        }
        

        //metodo para editar un usuario
        public function update($prendas){
            //paso1 creamos la consulta
            $sql="CALL SP_ACTUALIZARPRENDA('".$prendas['id_prenda']."','".$prendas['model']."','".$prendas['Gen']."','".$prendas['PrecioV']."','".$prendas['iv']."','".$prendas['Foto']."',
            '".$prendas['idCorte']."','".$prendas['idTalla']."','".$prendas['idColor']."','".$prendas['exi']."',
            '".$prendas['maxi']."','".$prendas['mini']."','".$prendas['idMat']."','".$prendas['porc']."');";
            //paso 2 conectamos a la base de datos
            $connection =$this->PrendaConnection->getConnection();
            //paso 3 ejecutamos la consulta
            $reslt = $connection->query($sql);
            //paso 4 preparamos la respuesta
            if($reslt){
                $res=true;
            }else{
                $res=false;
            }
            //paso 5 cerramos la coneccion
            $this->PrendaConnection->closeConnection();
            //paso 6 arrojamos resultados
            return $res;
        }

        public function Delete($id){
            //paso1 creamos la consulta
            $sql="CALL SP_ELIMINARPRENDA('$id')";
            //paso 2 conectamos a la base de datos
            $connection =$this->PrendaConnection->getConnection();
            //paso 3 ejecutamos la consulta
            $reslt = $connection->query($sql);
            //paso 4 preparamos la respuesta
            if($connection->affected_rows==1){
                $res=true;
            }else{
                $res=false;
            }
            //paso 5 cerramos la coneccion
            $this->PrendaConnection->closeConnection();
            //paso 6 arrojamos resultados
            return $res;
        }
    }
?>