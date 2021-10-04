<?php
include_once('cabecera.php');
include_once('header.php');
include_once('menu.php'); ?>
    <div class="col-md-12">
        <div class="tile">
            <form id="formRegistroPersona">
                <h3 class="tile-title">Registro Persona</h3>
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Nombre del Rol</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" id="nombreRol" name="nombreRol"
                                   placeholder="Ingrese el nombre del rol">
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
    <script type="text/javascript">
        //validacion
        $('#nombreRol').on('input', function () {
            this.value = this.value.replace(/[^a-zA-ZñÑáéíóú ]/g, '');
        });
        //envio del formulario
        $('#formRegistroPersona').submit(function (e) {
            e.preventDefault();
            var nombreRol = $('#nombreRol').val();
            var formData = {
                'nombreRol': nombreRol,
            }
            $.ajax({
                type: "POST",
                url: '../controlador/RegistroRolControlador.php',
                data: formData,
                dataType: 'json',
                encode: true,
            }).done(function (data) {
                console.log(data)
            })
        })

    </script>
<?php
include_once('footer.php');