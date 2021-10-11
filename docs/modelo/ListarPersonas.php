<?php
include_once ('conexionBase.php');
$per=new conexionBase();
$sql="select * from persona left join usuario u on persona.idpersona = u.persona_idpersona where activo=1 and activoUsuario is null";
$per->CreateConnection();
$result=$per->ExecuteQuery($sql);
if($result){
    $rowcount=$per->GetCountAffectedRows();
    if($rowcount>0){
        $per->CloseConnection();
        $datos=array();
        while ($row=$per->GetRows($result)){
            $datos['results'][]=['id'=>$row[0], 'text'=>$row[1].' '.$row[2].' '.$row[3]];
        }
        echo json_encode($datos,JSON_UNESCAPED_UNICODE);
    }
}
