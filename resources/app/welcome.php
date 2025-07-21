<div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <p href="#" class="d-flex align-items-center text-dark text-decoration-none">
            <i class="icon-user float-right m-0 h2 text-muted"></i>&nbsp;&nbsp;&nbsp;
            <h3 class="fs-4">Bienvenido(a), <?= $this->session->userdata('user_name').' '.$this->session->userdata('user_paterno')?></h3>
</p>
    </header>

    <div class="p-5 mb-4 bg-light shadow rounded-3 border">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Estimados egresados,</h1>
            <p class="col-md-12 fs-4">
                Te invitamos a contestar la siguiente encuesta para poder conocer tu actual desarrollo profesional y/o académico, 
                esperamos contar con tu honesta información, que nos ayudará a mejorar nuestro servicio.</p>
            <a class="btn btn-outline-success" href="<?=site_url('users/encuesta')?>">Iniciar encuesta</a>
        </div>
    </div>

    

</div>