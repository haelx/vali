<?php
include_once("cabecera.php");
include_once("header.php");
include_once("menu.php");
session_start();
?>
<div class="col-md-12">
    <div class="tile">
        <form id="formRegistroPersona">
            <h3 class="tile-title">Registro Persona</h3>
            <div class="tile-body">
                <div class="form-group row">
                    <label class="control-label col-md-3">Nombres</label>
                    <div class="col-md-8">
                        <input required class="form-control" type="text" id="nombres" name="nombres"
                               placeholder="Ingrese sus nombres">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Primer Apellido</label>
                    <div class="col-md-8">
                        <input required id="primerApellido" name="primerApellido" class="form-control" type="text"
                               placeholder="Ingrese su primer apellido">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Segundo Apellido</label>
                    <div class="col-md-8">
                        <input id="segundoApellido" name="segundoApellido" class="form-control" type="text"
                               placeholder="Ingrese el segundo apellido">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Fecha de Nacimiento</label>
                    <div class="col-md-8">
                        <input required id="fechaNac" name="fechaNac" class="form-control" type="date"
                               placeholder="Ingrese la fecha de nacimiento">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Telefono</label>
                    <div class="col-md-8">
                        <input id="telefono" name="telefono" class="form-control" type="text" placeholder="Ingrese el telefono fijo">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Celular</label>
                    <div class="col-md-8">
                        <input required id="celular" name="celular" class="form-control" type="text" placeholder="Ingrese su numero de telefono celular">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Direccion</label>
                    <div class="col-md-8">
                        <input required id="direccion" name="direccion" class="form-control" type="text" placeholder="Ingrese la direccion de su domicilio">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Correo electronico</label>
                    <div class="col-md-8">
                        <input required id="email" name="email" class="form-control" type="email" placeholder="Ingrese su correo electronico">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Genero</label>
                    <div class="col-md-9">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input required onchange="Genero(this.value)" id="genero" class="form-check-input" value="Varon" type="radio" name="genero">Varon
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input required onchange="Genero(this.value)" id="genero" class="form-check-input" value="Mujer" type="radio" name="genero">Mujer
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tile-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-3">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register
                        </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i
                                    class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include_once("scripts.php");
?>
//scripts externos

<script type="text/javascript">

    var generoGloabal="";
    function Genero(valor){
        generoGloabal=valor;
    }

    //validacion
    $('#nombres,#primerApellido,#segundoApellido').on('input', function () {
        this.value = this.value.replace(/[^a-zA-ZñÑáéíóú ]/g, '');
        console.log(sessionStorage.getItem('prueba'));
    });
    $('#telefono,#celular').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $('#direccion').on('input', function () {
        this.value = this.value.replace(/[^0-9#a-zA-ZñÑáéíóú., -]/g, '');
    });
    //envio del formulario
    $('#formRegistroPersona').submit(function (e) {
        e.preventDefault();
        var nombres = $('#nombres').val();
        var primerApellido=$('#primerApellido').val();
        var segundoApellido=$('#segundoApellido').val();
        var fechaNac=$('#fechaNac').val();
        var telefono=$('#telefono').val();
        var celular=$('#celular').val();
        var direccion=$('#direccion').val();
        var email=$('#email').val();
        var genero=genero;
        var formData = {
            'operacion':'registroPersona',
            'nombres': nombres,
            'primerApellido':primerApellido,
            'segundoApellido':segundoApellido,
            'fechaNac':fechaNac,
            'telefono':telefono,
            'celular':celular,
            'direccion':direccion,
            'email':email,
            'genero':generoGloabal,
        }
        $.ajax({
            type: "POST",
            url: '../controlador/RegistroPersonaControlador.php',
            data: formData,
            dataType: 'json',
            encode: true,
        }).done(function (data) {
            if(data.Success===1){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: data.Mensaje,
                })
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Opps',
                    text: data.Mensaje,
                })
            }
        })
    })

</script>
<?php
include_once("footer.php"); ?>
