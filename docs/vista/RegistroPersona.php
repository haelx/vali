<?php
include_once ("cabecera.php");
include_once ("header.php");
include_once ("menu.php");
?>
    <div class="col-md-12">
        <div class="tile">
            <form id="formRegistroPersona">
            <h3 class="tile-title">Registro Persona</h3>
            <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Nombre</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Primer Apellido</label>
                        <div class="col-md-8">
                            <input class="form-control col-md-8" type="email" placeholder="Enter email address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Segundo Apellido</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Gender</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender">Male
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender">Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Identity Proof</label>
                        <div class="col-md-8">
                            <input class="form-control" type="file">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 col-md-offset-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox">I accept the terms and conditions
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="tile-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-3">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

<?php
include_once ("scripts.php");
?>
//scripts externos

<script type="text/javascript">
    $('#nombre').on('input', function () {
        this.value = this.value.replace(/[^a-zA-ZñÑáéíóú ]/g,'');
    });
    $('#formRegistroPersona').submit(function (e) {
        e.preventDefault();
        var nombres=$('#nombre').val();
        var formData = {
        'nombres':nombres
        }
        $.ajax({
            type: "POST",
            url: '../controlador/RegistroPersonaControlador.php',
            data: formData,
            dataType: 'json',
            encode: true,
        }).done(function (data) {
            console.log(data)
        })
    })

</script>
<?php
include_once ("footer.php");?>
