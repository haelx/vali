<?php
include_once ('../modelo/RegistroPersonaModelo.php');
if($_POST and $_POST['operacion']=='registroPersona'){
    $nombres=htmlspecialchars($_POST['nombres']);
    $primerApellido=htmlspecialchars($_POST['primerApellido']);
    $segundoApellido=htmlspecialchars($_POST['segundoApellido']);
    $fechaNac=htmlspecialchars($_POST['fechaNac']);
    $telefono=htmlspecialchars($_POST['telefono']);
    $celular=htmlspecialchars($_POST['celular']);
    $direccion=htmlspecialchars($_POST['direccion']);
    $email=htmlspecialchars($_POST['email']);
    $genero=htmlspecialchars($_POST['genero']);
    $per=new RegistroPersonaModelo();
    $per->fijar('nombres',$nombres);
    $per->fijar('primerApellido',$primerApellido);
    $per->fijar('segundoApellido',$segundoApellido);
    $per->fijar('fechaNac',$fechaNac);
    $per->fijar('telefono',$telefono);
    $per->fijar('celular',$celular);
    $per->fijar('direccion',$direccion);
    $per->fijar('email',$email);
    $per->fijar('genero',$genero);
    $per->registrarNuevaPersona();
//    echo json_encode(array('Success'=>1,'error'=>0,'mensaje'=>'persona registrada correctamente'));
}
else{
    echo json_encode(array('Success'=>0,'error'=>1,'mensaje'=>'Post no enviado'));
}
