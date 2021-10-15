<?php
include_once('cabecera.php');
include_once('header.php');
include_once('menu.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="col-md-12">
        <div class="tile">
            <form id="formRegistroNuevoUsuario">
                <h3 class="tile-title">Registro Nuevo Usuario</h3>
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Persona</label>
                        <div class="col-md-8">
                            <select required class="js-example-basic-single form-control" name="persona" id="persona">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Nick</label>
                        <div class="col-md-8">
                            <input required type="text" class="form-control" name="nick" id="nick">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Clave</label>
                        <div class="col-md-8">
                            <input required type="password" class="form-control" name="clave1" id="clave1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Repita la Clave</label>
                        <div class="col-md-8">
                            <input required type="password" class="form-control" name="clave2" id="clave2">
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar
                                </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
include_once('scripts.php');
?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        function verificarClave(){
            var clave1 = $('#clave1').val();
            var clave2 = $('#clave2').val();
            if(clave1===clave2 && clave1!=='' && clave2!==''){
                return 1
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'incorrecto',
                    text: 'Las claves no coninciden',
                })
            }
        }
        $(document).ready(function() {

        });
        $('.js-example-basic-single').select2({
            ajax: {
                url: '../modelo/ListarPersonas.php',
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });
        //validacion
        $('#nombreRol').on('input', function () {
            this.value = this.value.replace(/[^a-zA-ZñÑáéíóú ]/g, '');
        });
        //envio del formulario
        $('#formRegistroNuevoUsuario').submit(function (e) {
            e.preventDefault();
            var op=verificarClave();
            if(op===1){
                var persona = $('#persona').val();
                var nick = $('#nick').val();
                var clave1 = $('#clave1').val();
                var formData = {
                    'persona': persona,
                    'nick': nick,
                    'clave1': clave1,
                    'operacion': 'RegistroNuevoUsuario'
                }
                $.ajax({
                    type: "POST",
                    url: '../controlador/RegistroUsuarioControlador.php',
                    data: formData,
                    dataType: 'json',
                    encode: true,
                }).done(function (data) {
                    console.log(data)
                })
            }

        })

    </script>
<?php
include_once('footer.php');