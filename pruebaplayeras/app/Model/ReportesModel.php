<?php
    class ReportesModel{
        
        private $ReporteConnection;
        public function __construct(){
            require_once('app/config/DBConnection.php');
            $this->ReporteConnection=new DBConnection();
        }

        //metodo para obtener todos los usuarios de la tabla user
        public function getAll(){
            //paso 1 creo la consulta
            $sql="CALL SP_CONSULTAPRENDATOTAL()";
            $connection =$this->ReporteConnection->getConnection();
            $result= $connection->query($sql);
            $prendas=array();
            while($prenda=$result->fetch_assoc()){
                $prendas[]=$prenda;
            }
            $this->ReporteConnection->closeConnection();
            return $prendas;
        }

        public function consuPrendaMaterial($material){
            $sql="CALL SP_CONSULTAPRENDAxMATERIAL('$material');";
            $connection=$this->ReporteConnection->getConnection();
            $reslt=$connection->query($sql);
            if($reslt && $reslt->num_rows > 0){
                $prenda=$reslt->fetch_assoc();
            }else{
                $prenda=false;
            }
            $this->ReporteConnection->closeConnection();
            return $prenda;
        }
    }
?>