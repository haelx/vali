<?php
include_once ('../modelo/RegistroRolModelo.php');
if($_POST and $_POST['operacion']=='registroNuevoRol'){
    $nombreRol=htmlspecialchars($_POST['nombreRol']);

    $per=new RegistroRolModelo();
    $per->fijar('nombreRol',$nombreRol);
    $per->registrarNuevoRol();
//    echo json_encode(array('Success'=>1,'error'=>0,'mensaje'=>'persona registrada correctamente'));
}
else{
    echo json_encode(array('Success'=>0,'error'=>1,'mensaje'=>'Post no enviado'));
}
