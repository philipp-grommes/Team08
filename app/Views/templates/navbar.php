<nav class="navbar navbar-bg navbar-expand-lg px-3 navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=base_url()?>">
            <img class="navbar_logo" src="<?=base_url('Images/07_-_WE-Logo.svg')?>" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
        <a class=" navbar-link navbar-items text-decoration-none" href="<?= base_url('tasks') ?>">Tasks</a>
        <a class=" navbar-link navbar-items text-decoration-none" href="<?= base_url() ?>">Boards</a>
        <a class=" navbar-link navbar-items text-decoration-none" href="<?= base_url('tables') ?>">Spalten</a>
        <a class=" navbar-link navbar-items text-decoration-none" href="<?= base_url('personen') ?>">Personen</a>
            </div>
    </div>
</nav>
