<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">
    <!-- column -->
    <div class="col-12">
        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0 bg-secondary">
                <!-- <div class="d-sm-flex align-items-center"> -->
                <?= form_open('', array('id' => 'FRM_DATOS', 'class' => 'form-horizontal', 'onsubmit' => 'window.location.reload()')); ?>

                <div class="row pt-3">
                    <div class="col-md-4 col-lg-4 align-self-center">
                        <div class="mb-3">
                            <h5 class="card-title text-dark">Estudiantes</h5>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 mx-auto">
                        <div class="mb-3">
                            <div class="input-group mb-3">

                                <?= form_dropdown('career_id', $career, $selectValue, 'class="form-select" id="career_id" required'); ?>
                                <button class="btn btn-primary pull-right font-weight-medium mb-0" type="submit">
                                    <!--<i class="ti-search"></i>-->
                                    <i class="fa fa-search"></i>&nbsp;Filtrar por programa
                                    <!--<i class="fa fa-filter"></i>-->
                                </button>

                                &nbsp;
                                <a class="btn btn-danger" href="<?= base_url('/admin/estudiantes') ?>">Limpiar filtro</a>

                                &nbsp;
                                <a class="btn waves-effect waves-light btn-success pull-right hidden-sm-down" data-toggle="tooltip" data-placement="bottom" title="Crear nuevo registro" href="<?= base_url('/admin/newestudiante') ?>">Nuevo usuario&nbsp;&nbsp;<i class="fa fa-plus"></i></a>

                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <!--<table id="datatable" name="datatablesSimple" class="table display nowrap table-hover table-bordered mb-0 border-top text-sm" style="width:100%">-->
                    <table id="datatable" name="datatablesSimple" class="table table-striped nowrap dataTable no-footer dtr-inline" style="width:100%">
                        <thead>
                            <tr>
                                <th colspan="10" class="heading"></th>
                            </tr>
                            <tr class="table-primary">
                                <th class="px-2">Cod Usuario</th>
                                <th>Usuario</th>
                                <!-- <th>Programa de estudios</th> -->
                                <th>Nombres y apellidos</th>
                                <th>Acciones</th>
                                <th>Documento identidad</th>
                                <!-- <th>Email</th> -->
                                <th>Celular</th>
                                <th>Sexo</th>
                                <th>F. nacimiento</th>
                                <th>Condición</th>
                                <th>Última actualización</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query as $item) : ?>
                                <tr class="align-middle">
                                    <td class="align-middle"><?= str_pad($item->id, 5, '0', STR_PAD_LEFT); ?></td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <strong class="text-gray-800 text-hover-primary mb-1"><?= $item->username ?></strong>
                                            <span><?= $item->email ?></span>
                                        </div>
                                    </td>
                                    <!-- <td></td> -->
                                    <td>
                                        <div class="d-flex flex-column">
                                            <strong class="text-hover-primary mb-1"><?= $item->name . ' ' . $item->paternal_surname . ' ' . $item->maternal_surname ?></strong>
                                            <span class="text-gray-800"><?= $item->career_title ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        if ($item->status) {
                                            echo '<span class="badge bg-success border text-white">' . $item->flag . '</span>';
                                        } else {
                                            echo '<span class="badge bg-danger border text-white">' . $item->flag . '</span>';
                                        }
                                        ?>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <?php
                                            if ($item->status) {
                                                //echo '<a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" href="<?= $item->id ? >"><i class="fa fa-eye-slash"></i></a>';
                                                echo form_open('admincontroller/enviaPassword');
                                                echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                                echo '<button type="submit" name="submit" class="btn btn-outline-info btn-sm display-inline" data-bs-toggle="tooltip" data-bs-placement="left" title="Enviar contraseña"><i class="fa fa-envelope" style="color:red"></i></button>';
                                                echo form_close();
                                                echo "&nbsp;";

                                                echo form_open('admincontroller/desactivaEstudiante');
                                                echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                                echo '<button type="submit" id="showtoast" name="submit" class="btn btn-outline-danger btn-sm display-inline" data-bs-toggle="tooltip" data-bs-placement="left" title="Desactivar"><i class="fa fa-eye-slash"></i></button>';
                                                echo form_close();
                                            } else {
                                                //echo '<a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" href="<?= $item->id>"><i class="fa fa fa-eye"></i></a>';
                                                echo form_open('admincontroller/activaEstudiante');
                                                echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                                echo '<button type="submit" id="showtoast" name="submit" class="btn btn-outline-primary btn-sm display-inline" data-bs-toggle="tooltip" data-bs-placement="left" title="Activar"><i class="fa fa-eye"></i></button>';
                                                echo form_close();
                                            }
                                            ?>
                                            &nbsp;&nbsp;
                                            <a class="btn btn-outline-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Editar" href="<?= base_url('/admin/estudiante/' . $item->id) ?>"><i class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                    <td><?= $item->document_type_label . ' ' . $item->document_number ?></td>
                                    <!-- <td></td> -->
                                    <td class="text-center"><?= $item->mobile ?></td>
                                    <td><?= $item->gender ?></td>
                                    <td><?php
                                        if ($item->birthdate) {
                                            echo date_format($item->birthdate, 'd/m/Y');
                                        } else {
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center"><?= $item->graduated ?></td>
                                    <td><?= $item->updated_at ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/plugins/pdfobject/jquery-3.7.1.min.js') ?>"></script>
<script>
    jQuery(document).ready(function() {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        <?php if ($this->session->flashdata('success')) { ?>
            //$('.toast').toast('show');
            toastr.info("<?= $this->session->flashdata('success') ?>");
            console.log("<?= $this->session->flashdata('success') ?>");
        <?php } else if ($this->session->flashdata('error')) {  ?>
            toastr.error("<?= $this->session->flashdata('error') ?>");
        <?php } else if ($this->session->flashdata('flashSuccess')) { ?>
            toastr.success("<?= $this->session->flashdata('flashSuccess') ?>");
        <?php } ?>
    });
</script>