<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">
    <!-- column -->
    <div class="col-12">
        <!--begin::Mixed Widget 2-->
        <div class="card border shadow-xs mb-4">
            <!--begin::Header-->
            <div class="card-header border-0 bg-primary py-3">
                <h3 class="card-title fw-bolder text-white">Bienvenido(a), <?= $this->session->userdata('user_name') ?></h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body">
                <p>Para iniciar, elija una de la opciones del menú superior.</p>
                <hr>
            </div>
        </div>
    </div>
</div>
<!--end::Row-->
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-user float-right m-0 h2 text-muted"></i>
            <!-- <i class="icon-layers float-right m-0 h2 text-muted"></i> -->
            <a href="<?= base_url('admin') . '/users' ?>"
                class="text-uppercase fw-bold fs-6">Egresados registrados</a>
            <h3 class="my-3" data-plugin="counterup"><?= $cantEgres ?></h3>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-chart float-right m-0 h2 text-muted"></i>
            <a href="<?= base_url('admin') . '/encuestas' ?>" class="text-uppercase fw-bold fs-6">Encuestas
                disponibles</a>
            <h3 class="my-3">$<span data-plugin="counterup"><?= $cantEncuestas ?></span></h3>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-paypal float-right m-0 h2 text-muted"></i>
            <a href="<?= base_url('admin') . '/programas' ?>"
                class="text-uppercase fw-bold fs-6 mt-2">Programas de estudios</a>
            <h3 class="my-3">$<span data-plugin="counterup"><?= $cantCareers ?></span></h3>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-rocket float-right m-0 h2 text-muted"></i>
            <a href="<?= base_url('admin') . '/info' ?>"
                class="text-uppercase fw-bold fs-6 mt-2">Información del Instituto</a>
            <h5 class="my-3"><?= env('CLIENT_EMAIL') ?? '@' ?></h5>
        </div>
    </div>
</div>
<!-- end row -->
<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-2">
    <!-- column -->
    <div class="col-12">
        <div class="card border shadow-xs mb-3">
            <div class="card-header card-box">
                <h4 class="header-title mb-3">Egresados por programas de estudios</h4>
            </div>
            <div class="card-body p-0">
                <?php foreach ($cantUsersByCareer as $item) : ?>

                    <div class="card-p mb-1 pb-1">
                        <!--begin::Row-->
                        
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item px-4 pb-4">
                                    <p class="mb-2 font-weight-bold"><strong
                                            class="text-dark"><?= $item->career_title ?></strong>
                                        <strong
                                            class="float-end text-secondary"><?= ($item->cant_Users) ? $item->cant_Users : 0 ?></strong>
                                    </p>
                                    <div class="progress progress-sm progress-xxl">
                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                            role="progressbar"
                                            style="height:50px; width:<?= ($item->cant_Users / $cantEgres) * 100 + 25 ?>%"
                                            aria-valuenow="<?= ($item->cant_Users / $cantEgres) ?>" aria-valuemin="0"
                                            aria-valuemax="<?= $cantEgres ?>"></div>
                                    </div>
                                </li>
                            </ul>
                        
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!--</div>-->
    </div>
</div>
<!--</div>-->
</div>