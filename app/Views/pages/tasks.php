<div class="card mt-4 mx-3 mb-4">
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <div class="card-header d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fs-5 mb-0">Aufgaben</h1>

                        <a href="<?=base_url('/tasks/edit/0/0/')?>">
                            <button class="mt-2 mb-2 btn btn-sm btn-primary" name="btnNeu" id="btnNeu" type="button">+ Neu erstellen</button>
                        </a>

                </div>

            </div>
        </div>

        <?php foreach ($tasks as $item): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                <div class="card flex-fill mx-3 mb-5 d-flex flex-column">
                    <div class="card-header">
                        <h5 class="card-title d-flex justify-content-between align-items-center mb-0">
                            <?php echo $item['tasks']; ?>
                            <a href="<?=base_url('/tasks/edit/'.$item['id'].'/1/')?>" class="text-decoration-none">
                                <i class="fas fa-edit text-primary"></i>
                            </a>
                        </h5>
                    </div>
                        <div class="card-body d-flex flex-column">
                        <h6 class="card-subtitle mb-2 text-muted"> <i class="bi bi-person-circle"></i> <?php echo $item['vorname']. ' '.$item['name']; ?></h6>
                        <p class="card-text">

                            <strong>Notizen:</strong> <?php echo $item['notizen']; ?><br>
                            <strong>Erstellt am:</strong> <?= date('d.m.Y', strtotime($item['erstellungsdatum'])); ?> </p>

                        <div class="mt-auto d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
                            <a href="<?=base_url('/tasks/delete/'.$item['id']. '/')?>">
                                <button name="btnErledigt" id="btnErledigt" class="btn btn-primary w-100 w-md-auto btn-outline-success" style=" background-color: white;" >
                                    <i class="bi bi-check2-square"></i> Erledigt
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