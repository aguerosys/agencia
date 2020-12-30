<?php 

    class Region{
        private $regID;
        private $regNombre;

        public function listarRegiones(){
            $link = Conexion::conectar();
            $sql = "SELECT regID, regNombre FROM regiones";
            $stmt = $link->prepare($sql);
            $stmt->execute();

            $regiones = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $regiones;
            
        }

        public function verRegionPorID(){
            $regID = $_GET['regID'];
            $link = Conexion::conectar();
            $sql = "SELECT regID, regNombre FROM regiones WHERE regID = :regID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetch(PDO::FETCH_ASSOC);
            
            
            //registramos valores de los atributos //se le da los valores con los setters
            $this->setRegID($regID);
            $this->setRegNombre($datos['regNombre']);
            return $this;
        }

        public function agregarRegion(){
            $regNombre = $_POST['regNombre'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO regiones (regNombre) VALUE (:regNombre)";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regNombre', $regNombre, PDO::PARAM_STR);

            if ($stmt->execute()){
                $this->setRegID($link->lastInsertId());
                $this->setRegNombre($regNombre);
                return $this;
            }return false;

        }

        public function modificarRegion(){
            $regID = $_POST['regID'];
            $regNombre = $_POST['regNombre'];
            $link = Conexion::conectar();
            $sql= "UPDATE regiones SET regNombre = :regNombre WHERE regID = :regID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regNombre', $regNombre, PDO::PARAM_STR);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);

            if ($stmt->execute()){
                //registramos atributos

                $this->setregNombre($regNombre);
               


                return $this;
            }return false;
            
        }

        public function eliminarRegion(){
            $regID = $_POST['regID'];
            $regNombre = $_POST['regNombre'];
            $link = Conexion::conectar();
            $sql = "DELETE FROM regiones WHERE regID = :regID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);

            if ($stmt->execute()){
                //registramos atributos
                $this->setRegID( $regID );
                $this->setRegNombre($regNombre);
                return $this;
            }return false;
        }
        

        public function getRegID()
        {
            return $this->regID;
        }

        public function setRegID($regID)
        {
            $this->regID = $regID;

            return $this;
        }
        public function getRegNombre()
        {
            return $this->regNombre;
        }

        public function setRegNombre($regNombre)
        {
            $this->regNombre = $regNombre;

            return $this;
        }



    }

?>