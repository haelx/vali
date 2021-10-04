<?php
if($_POST){
    echo json_encode(array('Success'=>1,'error'=>0,'mensaje'=>'persona registrada correctamente'));
}
else{
    echo json_encode(array('Success'=>0,'error'=>1,'mensaje'=>'Post no enviado'));
}
