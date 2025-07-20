<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">
    <!-- column -->
    <div class="col-12">
        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0 bg-light">
                <!--https://stackoverflow.com/questions/18842946/refresh-form-page-after-submitting-the-form-->
                <h4 class="page-title">Lista de encuestas</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Cod Encuesta</th>
                                <th>Programa de estudios</th>
                                <th>Egresado</th>
                                <th>Período de egreso</th>
                                <th>Ingresó a la encuesta</th>
                                <th>Nivel de avance %</th>
                                <th>Fecha de cierre de encuesta</th>
                                <th>Fecha de último acceso</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query as $item) : ?>
                                <tr class="align-middle">
                                    <td><?= str_pad($item->row, 4, '0', STR_PAD_LEFT) ?></td>
                                    <td><?= str_pad($item->id, 7, '0', STR_PAD_LEFT); ?></td>
                                    <td><?= $item->career_title ?></td>
                                    <td><?= $item->name . ' ' . $item->paternal_surname . ' ' . $item->maternal_surname ?></td>
                                    <td><?= $item->var10 ?></td>
                                    <td><?= $item->flagInicio ?></td>
                                    <td><?= $item->flagAvance ?></td>
                                    <td class="text-center"><?= $item->var3 ? date_format($item->var3, 'd/m/Y') : '' ?></td>
                                    <td><?= $item->updated_at ?></td>
                                    <td>
                                        <?php
                                        if ($item->status) {
                                            echo '<span class="text-white border badge bg-info">' . $item->userflag . '</span>';
                                        } else {
                                            echo '<span class="text-white border badge bg-danger">' . $item->userflag . '</span>';
                                        }
                                        ?>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <?php
                                            if ($item->var2 == '') {
                                                if ($item->status) {
                                                    //echo form_open('admin/enviaEncuesta');
                                                    //echo '<input type="hidden" id="id" name="id" value="' . $item->user_id . '">';
                                                    //echo '<button type="submit" id="showtoast" name="submit" class="btn btn-outline-info btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Enviar encuesta"><i class="fa fa-envelope" style="color:red"></i></button>';
                                                    echo '<button type="button" id="showtoast" name="submit" class="btn btn-outline-info btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Enviar encuesta"><i class="fa fa-envelope" style="color:red"></i></button>';
                                                    //echo form_close();
                                                    echo "&nbsp;";
                                                } else {
                                                }
                                            } else {
                                            }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script>
    /*$(function() {
        $('#FRM_DATOS').on('submit', function(e) {
            e.preventDefault();
            setTimeout(function() {
                window.location.reload();
            }, 0);
            $()
            this.submit();
        });
    });*/
</script>-->


<script>
	$(document).ready(function() {
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
			toastr.success("<?= $this->session->flashdata('success') ?>");
			//console.log("<?= $this->session->flashdata('success') ?>");
		<?php } else if ($this->session->flashdata('error')) {  ?>
			toastr.error("<?= $this->session->flashdata('error') ?>");
		<?php } ?>
	});
</script>


<script>
    $(document).ready(function() {
        //$.noConflict();
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-outline-primary';
        $('#datatable-buttons').DataTable({
            pageLength: 10,
            order: [],
            //responsive: true,
            //scrollX: true,
            language: {
                url: '<?= base_url('assets/libs/datatables/i18n/es-ES.json') ?>',
                "paginate": {
                    "previous": "<<",
                    "next": ">>",
                    "first": "<",
                    "last": ">"
                },
            },
            dom: 'Bfrtip',
            buttons: ['copy', 'pdf',
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        //Para ver los estilos de formato https://datatables.net/reference/button/excelHtml5
                        $('row c[r^="B"]', sheet).attr('s', '57');
                        //Para que la columna se muestre como texto https://datatables.net/forums/discussion/73814/export-to-excel-with-format-text-for-column-b-c-and-d
                        $('row c[r^="C"]', sheet).attr('s', '50');
                    }
                }
            ]
        });
    });
</script>