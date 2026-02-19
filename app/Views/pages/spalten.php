<div class="card mt-4 mx-3 mb-4">
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <div class="card-header d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fs-5 mb-0">Spalten</h1>

<!-- Button "Spalte erstellen" -->

                    <a href="<?=base_url('spalten/edit/0/0/')?>">
                        <button class="mt-2 mb-2 btn btn-sm btn-primary" type="button">
                            + Spalten erstellen
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Body mit Spalten aus DB -->

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Board</th>
                    <th>Sortid</th>
                    <th>Spalte</th>
                    <th>Spaltenbeschreibung</th>
                    <th>Bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($spalten as $spalte): ?>
                    <tr>
                        <td> <?= $spalte['id'] ?> </td>
                        <td> <?= $spalte['board'] ?> </td>
                        <td> <?= $spalte['sortid'] ?> </td>
                        <td> <?= $spalte['spalte'] ?> </td>
                        <td> <?= $spalte['spaltenbeschreibung'] ?> </td>
                        <td>
                            <a href="<?= base_url('spalten/edit/'.$spalte['id'].'/1/') ?>" class="text-decoration-none text-primary me-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?= base_url('spalten/edit/'.$spalte['id'].'/2/') ?>" class="text-decoration-none text-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>