<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">
    <!--begin::Col-->
    <div class="col-xxl">
        <!--begin::Mixed Widget 2-->
        <div class="card card-xxl-stretch">
            <!--begin::Header-->
            <div class="card-header border-0 bg-danger py-5">
                <h3 class="card-title fw-bolder text-white">Panel de administración</h3>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body p-0">

                <div class="card-p mb-5">
                    <!--begin::Row-->
                    <div class="row g-0">
                        <!--begin::Col-->
                        <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
                                    <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
                                    <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
                                    <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
                                </svg>&nbsp;<?= $cantEgres ?>
                            </span>
                            <!--end::Svg Icon-->
                            <a href="<?= base_url('admin') . '/egresados' ?>"
                                class="text-warning fw-bold fs-6">Egresados registrados</a>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                        fill="black"></path>
                                    <path
                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                        fill="black"></path>
                                </svg>&nbsp;<?= $cantEncuestas ?>
                            </span>
                            <!--end::Svg Icon-->
                            <a href="<?= base_url('admin') . '/catalogo' ?>" class="text-primary fw-bold fs-6">Libros
                                disponibles</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row g-0">
                        <!--begin::Col-->
                        <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                        fill="black"></path>
                                    <path
                                        d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                        fill="black"></path>
                                </svg>&nbsp;<?= $cantCareers ?>
                            </span>
                            <!--end::Svg Icon-->
                            <a href="<?= base_url('admin') . '/programas' ?>"
                                class="text-danger fw-bold fs-6 mt-2">Programas de estudios</a>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col bg-light-success px-6 py-8 rounded-2">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                        fill="black"></path>
                                    <path opacity="0.3"
                                        d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                        fill="black"></path>
                                </svg>&nbsp;<?= getenv('CLIENT_EMAIL') ?? '' ?>
                            </span>
                            <!--end::Svg Icon-->
                            <a href="<?= base_url('admin') . '/info' ?>"
                                class="text-success fw-bold fs-6 mt-2">Información del Instituto</a>
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row gy-5 g-xl-8 mt-9">

    <!---- RESUMEN DE ESTUDIANTES POR PROGRAMA DE ESTUDIOS --->

    <div class="col-12 col-lg-6 col-xl-6 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header bg-light">
                <h4 class="card-title text-dark">Estudiantes por programas de estudios</h4>
            </div>
            <div class="card-body p-0">

                <div class="card-p mb-5 pb-3">
                    <!--begin::Row-->
                    <div class="row g-0 me-5">

                        <?php foreach ($cantUsersByCareer as $item) : ?>
                        <!-- <div class="wrapper container"> -->
                        <!--<div class="d-flex justify-content-between">
                                <h5 class="mb-2">< ?= $item->career_title ?></h5>
                                <p class="mb-2 text-primary display-6">< ?= ($item->cant_Users) ? $item->cant_Users : 0 ?></p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="height:50px; width:<?= ($item->cant_Users / $cantEstudEgres) * 100 + 25 ?>%" aria-valuenow="<?= ($item->cant_Users / $cantEstudEgres) ?>" aria-valuemin="0" aria-valuemax="<?= $cantEstudEgres ?>"></div>
                            </div>-->
                        <!--</div>--><br>
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item px-4 pb-4">
                                <p class="mb-2 font-weight-bold"><strong
                                        class="text-primary"><?= $item->career_title ?></strong>
                                    <strong
                                        class="float-end text-secondary"><?= ($item->cant_Users) ? $item->cant_Users : 0 ?></strong>
                                </p>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                                        role="progressbar"
                                        style="height:50px; width:<?= ($item->cant_Users / $cantEstudEgres) * 100 + 25 ?>%"
                                        aria-valuenow="<?= ($item->cant_Users / $cantEstudEgres) ?>" aria-valuemin="0"
                                        aria-valuemax="<?= $cantEstudEgres ?>"></div>
                                </div>
                            </li>
                        </ul>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!--</div>-->
        </div>
    </div>
    <!--</div>-->
    <!---- ULTIMAS PUBLICACIONES --->
    <!--<div class="row">-->
    <div class="col-12 col-lg-6 col-xl-6 d-flex">
        <div class="card flex-fill w-100 mb-4">
            <div class="card-header bg-light">
                <h5 class="card-title text-dark">Últimos libros solicitados</h5>
            </div>
            <div class="card-body">
                <?php
                //print_r($offersjobsLast);
                if (empty($booksLast)) {
                    echo '<p>No hay libros recientemente vistos</p>';
                } else {
                }
                ?>
                <div class="container-fluid">
                    <?php foreach ($booksLast as $book) : ?>
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-10 border-bottom pb-3 mb-3">
                        <!--begin::Icon-->
                        <i class="fas fa-book-open text-primary fs-1 me-5"></i>
                        <!--end::SymIconbol-->
                        <!--begin::Info-->
                        <div class="d-flex flex-column">
                            <h5 class="text-gray-800 fw-bolder">[Cód.
                                <?= str_pad($book->ebook_code, 6, '0', STR_PAD_LEFT) ?>
                                ]</span>&nbsp;<?= $book->ebook_display . ' <br>' ?> </h5>
                            <!--begin::Section-->
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-muted"><?= $book->catalog_display ?></span>
                                <!--end::Desc-->
                            </div>
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-dark"><?= $book->ebook_pages ?>&nbsp;páginas</span>
                                <!--end::Desc-->
                            </div>
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-dark">Editorial: &nbsp;<?= $book->ebook_editorial ?></span>
                                <!--end::Desc-->
                            </div>
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-dark">Autores: &nbsp;<?= $book->ebook_author ?></span>
                                <!--end::Desc-->
                            </div>
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-dark">Año: &nbsp;<?= $book->ebook_year ?></span>
                                <!--end::Desc-->
                            </div>
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-dark">Temas:
                                    &nbsp;<?= substr(strip_tags(htmlspecialchars_decode($book->ebook_details), "<div><b><br>"), 0, 100) ?></span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Section-->
                        </div>

                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>