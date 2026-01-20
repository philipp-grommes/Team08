<div class="card mt-4 mx-3 mb-4">
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <div class="card-header d-flex justify-content-between mb-2">
                    <strong>
                        <h1 class="fs-4">Tasks</h1>
                    </strong>
                </div>
                <div class="mx-3">
                <a href="<?=base_url('/tasks/edit/0/0/')?>">
                    <button class="mt-2 mb-2 btn btn-sm btn-primary" name="btnNeu" id="btnNeu" type="button">+ Neu erstellen</button>
                </a>
                </div>
            </div>
        </div>

        <?php foreach ($tasks as $item): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                <div class="card flex-fill text-center mx-3 mb-5 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $item['tasks']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">ID: <?php echo $item['id']; ?></h6>
                        <p class="card-text">

                            <div class="mb-2">
                            <strong> Zugewiesen an:</strong> <?= $item['vorname'].' '.$item['name']; ?> <br>
                        </div>
                            <strong>Notizen:</strong> <?php echo $item['notizen']; ?><br>
                            <strong>Erstellt am:</strong> <?= date('d.m.Y', strtotime($item['erstellungsdatum'])); ?> </p>

                        <div class="mt-auto d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
                            <a href="<?=base_url('/tasks/edit/'.$item['id'].'/1/')?>">
                                <button name="btnBearbeiten" id="btnBearbeiten" class="btn btn-primary w-100 w-md-auto" >
                                    <i class="fas fa-edit"></i> Bearbeiten
                                </button>
                            </a>
                            <a href="<?=base_url('/tasks/edit/'.$item['id'].'/2/')?>">
                                <button name="btnLoeschen" id="btnLoeschen" class="btn btn-primary w-100 w-md-auto btn-outline-danger" style=" background-color: white; ">
                                    <i class="fas fa-trash"></i> Löschen
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>