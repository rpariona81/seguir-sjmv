<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Información del instituto</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <!--<a href="../../account/settings.html" class="btn btn-primary align-self-center">Edit Profile</a>-->
        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::Row-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Nombre o Razón Social</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800"><?=getenv('CLIENT_DISPLAY')?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Módulo</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-bold text-gray-800 fs-6">Seguimiento de egresados</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Teléfono
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bolder fs-6 text-gray-800 me-2"><?=getenv('CLIENT_PHONE')?></span>
                <!--<span class="badge badge-success">Verified</span>-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Sitio Web</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <a href="#" class="fw-bold fs-6 text-gray-800 text-hover-primary"><?=getenv('CLIENT_WEBURL')?></a>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">País
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i></label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800"><?=getenv('CLIENT_COUNTRY')?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Email</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?=getenv('CLIENT_EMAIL')?></span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->