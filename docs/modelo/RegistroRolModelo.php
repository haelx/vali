<?php
include_once ('conexionBase.php');
class RegistroRolModelo {
    private $nombreRol;
    private $conexion;
    function __construct(){
        $this->nombreRol="";
        $this->conexion= new conexionBase();
    }
    public function fijar($atributo,$valor){
        $this->$atributo=$valor;
    }
    private function verificarExistente(){
        $sql="select * from rol where nombreRol='$this->nombreRol'";
        $this->conexion->CreateConnection();
        $result=$this->conexion->ExecuteQuery($sql);
        $rowCount=$this->conexion->GetCountAffectedRows();
        if($rowCount>0){
            $this->conexion->CloseConnection();
            return 1;
        }else{
            return 0;
        }
    }
    public function registrarNuevoRol(){
        $duplicado=$this->verificarExistente();
        if($duplicado==1){
            echo json_encode(array('Success'=>0,'Error'=>1,'Mensaje'=>'El rol ya se encuentra registrado'));
        }else{
            date_default_timezone_set('America/Boa_Vista');
            $fecha=strftime("%Y-%m-%d");
            $hora=strftime("%H:%M:%S");
            $sql="insert into rol (nombreRol, fechaCreado, activoRol) values ('$this->nombreRol','$fecha $hora',1)";
            $this->conexion->CreateConnection();
            $result=$this->conexion->ExecuteQuery($sql);
            if($result){
                echo json_encode(array('Success'=>1,'Error'=>0,'Mensaje'=>'Registro correcto del rol'));
            }else{
                echo json_encode(array('Success'=>0,'Error'=>1,'Mensaje'=>'Hubo algun error al momento de registrar el rol'));
            }
        }

    }
}