<nav class="navbar navbar-bg navbar-expand-lg px-3 navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=base_url()?>">
            <img class="navbar_logo" src="<?=base_url('Images/07_-_WE-Logo.svg')?>" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav w-100 align-items-lg-center"> <a class="nav-link navbar-items text-white text-decoration-none" href="<?= base_url('tasks') ?>">Tasks</a>
                <a class="nav-link navbar-items text-white text-decoration-none" href="<?= base_url('boards') ?>" id="navBoards">Boards</a>
                <a class="nav-link navbar-items text-white text-decoration-none" href="<?= base_url('spalten') ?>" id="navSpalten">Spalten</a>
                <a class="nav-link navbar-items text-white text-decoration-none" href="<?= base_url('personen') ?>" id="navPersonen">Personen</a>

                <div class="ms-auto d-flex align-items-center">
                    <div class="poke-circle me-2">
                        <img id="nav-poke-img" src="" alt="" style="display:none;">
                    </div>

                    <a class="nav-link navbar-items text-white text-decoration-none" href="<?= base_url('login/logout') ?>">
                        <i class="fas fa-sign-out-alt"></i> Ausloggen
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
