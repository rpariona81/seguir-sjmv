<script>
    function activaGrabar() {
        $(':input[type="submit"]').prop('disabled', false);
        $("#thank_you").empty();
    }
</script>

<script>
    $(document).ready(function() {
        $("#limpiar").click(function() {
            document.getElementById("FRM_DATOS").reset();
            $("#ENTIDAD").prop("disabled", false);
            $("#thank_you").empty();
        });

    })
</script>

<script>
    $(function() {
        var verEntidades = function() {
            var verRegion = $('#REGION').val();
            console.log(verRegion);
            $('#ENTIDAD').empty();
            $('#TIPO_ENTIDAD').val("");
            //limpiar();
        }
        $('#REGION').change(verEntidades);
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#TIPO_ENTIDAD").change(function() {
            /*dropdown post */ //  
            var verRegion = $('#REGION').val();
            var verTipo = $('#TIPO_ENTIDAD').val();
            //$('#ENTIDAD').empty();
            console.log(verRegion);
            console.log(verTipo);
            $.post("<?php echo base_url('home/loadentidades') ?>", {
                'cod_region': verRegion,
                'cod_tipo_entidad': verTipo
            }, function(data, statusText, jqXHR) {
                $("#ENTIDAD").empty().append(data);
                //listaInstitutos(data)
                console.log(jqXHR);
            });
        });
    });
</script>

<script>
    $(function() {
        var especificaCargo = function() {
            var cargoSelect = $('#CARGO').val();
            //alert(cargoSelect);
            if (cargoSelect == "Otro cargo") {
                //$('#OTRO_CARGO').removeAttr('readonly');
                $('#OTRO_CARGO').prop('disabled', false);
                //document.getElementById("myText").placeholder = "Type name here..";
                $('#OTRO_CARGO').attr('placeholder', 'Especifique su otro cargo')
                $('#OTRO_CARGO').focus();
            } else if (cargoSelect == "Coordinador(a) de Área Académica") {
                //$('#OTRO_CARGO').removeAttr('readonly');
                $('#OTRO_CARGO').prop('disabled', false);
                $('#OTRO_CARGO').attr('placeholder', 'Especifique área o programa de estudios')
                $('#OTRO_CARGO').focus();
            } else {
                $('#OTRO_CARGO').prop('disabled', true);
                $('#OTRO_CARGO').val('');
                //$('#OTRO_CARGO').text('');
                $('#OTRO_CARGO').removeAttr('placeholder');
                //$('#grabar').focus();
            }
        }
        $('#CARGO').change(especificaCargo);
    });
</script>

<script>
    $(document).ready(function() {
        $("#DNI").keydown(function(e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('DNI').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        $("#CELULAR").keydown(function(e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('CELULAR').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        $("#NOMBRES").keydown(function(e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('NOMBRES').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.keyCode >= 48 && e.keyCode <= 57) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        $("#APELLIDOS").keydown(function(e) {
            if (e.keyCode === 13 || e.keyCode === 193)
                document.getElementById('APELLIDOS').focus();
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.keyCode >= 48 && e.keyCode <= 57) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card card-primary">
        <div class="card-header bg-info text-white">ACTUALIZACIÓN DE ENCUESTA: &nbsp; <div class="d-inline" id="fechaHoy"><?= date('d/m/Y'); ?></div>
        </div>
        <div class="card-body">

            <!--<form action="< ?php echo base_url('home/guarda_asistencia') ?>" method="POST" id="FRM_DATOS" name="FRM_DATOS" class="form-horizontal" >-->
            <?= form_open('users/guarda_encuesta', array('id' => 'FRM_DATOS', 'class' => 'needs-validation', 'onsubmit' => 'grabar.disabled = true; return true;')); ?>
            <fieldset>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Tienes alguna discapacidad?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="career_id">Carrera/ Especialidad / Opción ocupacional que egreso</label>
                            <?= form_dropdown('career_id', $career, $perfil->career_id, 'class="form-control" id="career_id" disabled'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Es titulado?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Año que se tituló</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Actualmente te encuentras trabajando?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Si trabajas, para quién lo haces?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Institución pública</option>
                            <option value="No">Empresa privada</option>
                            <option value="No">Independiente</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Si trabajas en una institución pública…?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Con contrato de trabajo</option>
                            <option value="No">Emito recibo por honorarios</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Si trabajas en una Empresa privada, cuentas con...?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Con contrato de trabajo</option>
                            <option value="No">Emito recibo por honorarios</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Independiente (Esto se refiere a un trabajo por tu cuenta propia)?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Cuál fue tu ingreso del mes pasado? (S/.)</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="1">Menos de 500</option>
                            <option value="2">Entre 500 y 750</option>
                            <option value="3">Entre 751 y 1000</option>
                            <option value="4">Entre 1001 y 1500</option>
                            <option value="5">Entre 1501 y 2000</option>
                            <option value="6">Entre 2001 y 3000</option>
                            <option value="7">Más de 3000</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿En qué área de trabajo te desempeñas actualmente en la institución o empresa que trabajas?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="1">Administración y Dirección</option>
                            <option value="2">Atención al Cliente</option>
                            <option value="3">Consultoría</option>
                            <option value="4">Diseño</option>
                            <option value="5">Investigación y Desarrollo</option>
                            <option value="6">Operativo</option>
                            <option value="7">Ingeniería y Producción</option>
                            <option value="8">Comercial/Ventas/Marketing</option>
                            <option value="9">Dirección y seguimiento de obras</option>
                            <option value="10">Calidad</option>
                            <option value="11">Informática</option>
                            <option value="12">Otros</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Tu empleo está relacionado con la carrera, especialidad u ocupación que estudiaste?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="1">Directamente</option>
                            <option value="2">Indirectamente</option>
                            <option value="3">Nada relacionado</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿A qué actividad económica se dedica la institución y/o empresa en la que trabajas?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="1">Administración Pública</option>
                            <option value="2">Seguridad Social de Afiliación Obligatoria</option>
                            <option value="3">Reparación de Automotores, Motocicletas</option>
                            <option value="4">Agricultura, Ganadería, Caza y Silvicultura</option>
                            <option value="5">Explotación de Minas e Hidrocarburos</option>
                            <option value="6">Industrias Manufactureras</option>
                            <option value="7">Suministros de Electricidad, Gas y Agua Construcción</option>
                            <option value="8">Organización No Gubernamental (ONG)</option>
                            <option value="9">Actividades Inmobiliarias de Alquiler y Empresariales</option>
                            <option value="10">Transporte, Almacenamiento y Comunicaciones</option>
                            <option value="11">Servicios Sociales y de Salud</option>
                            <option value="12">Hoteles y Restaurantes</option>
                            <option value="13">Finanzas</option>
                            <option value="14">Educación</option>
                            <option value="15">Servicio doméstico</option>
                            <option value="16">Defensa</option>
                            <option value="17">Comercio</option>
                            <option value="18">Servicios</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿QuÉ medios usas para buscar empleos?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="1">Revista</option>
                            <option value="2">Periódico</option>
                            <option value="3">Radio</option>
                            <option value="4">Bolsa de Trabajo </option>
                            <option value="5">Redes sociales</option>
                            <option value="6">Afiches y volantes</option>
                            <option value="7">Internet</option>
                            <option value="8">Ninguna de las anteriores</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Cuántos empleos has tenido en el último año?</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Cuántos empleos han sido de tu carrera?</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" />

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Nombre de la Empresa donde actualmente laboras?</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Nombre del jefe inmediato</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Teléfono de la empresa</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Página web y/o correo electrónico</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Si trabajas independiente ¿Tienes un negocio o empresa que formaste?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Cuántos trabajadores tienes en tu negocio o empresa que formaste? (Considera a familiares que trabajan contigo)</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Tu negocio o empresa que formaste, está constituida como:</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="1">Persona natural con RUC</option>
                            <option value="2">Persona natural sin RUC</option>
                            <option value="3">EIRL</option>
                            <option value="4">SRL</option>
                            <option value="5">SAC</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿A qué actividad económica se dedica tu negocio o la empresa formaste?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="3">Reparación de Automotores, Motocicletas</option>
                            <option value="4">Agricultura, Ganadería, Caza y Silvicultura</option>
                            <option value="5">Explotación de Minas e Hidrocarburos</option>
                            <option value="6">Industrias Manufactureras</option>
                            <option value="7">Suministros de Electricidad, Gas y Agua Construcción</option>
                            <option value="8">Organización No Gubernamental (ONG)</option>
                            <option value="9">Actividades Inmobiliarias de Alquiler y Empresariales</option>
                            <option value="10">Transporte, Almacenamiento y Comunicaciones</option>
                            <option value="11">Servicios Sociales y de Salud</option>
                            <option value="12">Hoteles y Restaurantes</option>
                            <option value="13">Finanzas</option>
                            <option value="14">Educación</option>
                            <option value="15">Servicio doméstico</option>
                            <option value="16">Defensa</option>
                            <option value="17">Comercio</option>
                            <option value="18">Servicios</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Según tu experiencia laboral, la formación técnica profesional recibida te sirvió para desempeñarte adecuadamente en tu trabajo?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿Tu formación técnico profesional te permitió acceder a un empleo en la misma región en la que estudiaste?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label>¿La formación recibida, te facilita adecuarte a los cambios tecnológicos?</label>
                    </div>
                    <div class="col-md-3">
                        <select name="REGION" id="REGION" class="form-control input-sm">
                            <option value="">Seleccione</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <hr>
                <?= my_validation_errors(validation_errors()); ?>
                <div class="form-group row">
                    <div class="col-md-12">
                        <span id="thank_you" name="thank_you"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <input type="hidden" id="FECHASESION">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" id="grabar" class="btn btn-success form-control input-sm" disabled>Grabar</button>
                    </div>
                    <div class="col-md-3">
                        <button type="reset" id="limpiar" class="btn btn-primary form-control input-sm">Limpiar</button>
                    </div>
                </div>
            </fieldset>
            <!--</form>-->
            <?= form_close() ?>
        </div>

    </div>

</div>
<!-- /.container-fluid -->