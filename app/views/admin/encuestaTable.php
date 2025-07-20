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

            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <!-- <table id="datatable" name="datatablesSimple" class="table display nowrap table-hover table-bordered mb-0 border-top text-sm" style="width:100%"> -->
                    <table id="datatable" name="datatablesSimple" class="table table-striped nowrap dataTable no-footer dtr-inline" style="width:100%">
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
                                    <td><?= $item->row?></td>
                                    <td><?= str_pad($item->id, 7, '0', STR_PAD_LEFT); ?></td>
                                    <td><?= $item->career_title ?></td>
                                    <td><?= $item->name . ' ' . $item->paternal_surname . ' ' . $item->maternal_surname ?></td>
                                    <td><?= $item->var10 ?></td>
                                    <td><?= $item->flagInicio ?></td>
                                    <td><?= $item->flagAvance ?></td>
                                    <td class="text-center"><?= $item->var3 ? date_format($item->var3, 'd/m/Y'):'' ?></td>
                                    <td><?= $item->updated_at ?></td>
                                    <td>
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