<div class="card mt-4 mx-3 mb-4">
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <div class="card-header d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fs-5 mb-0">Boards</h1>

<!-- Button zum Boards erstellen -->

                    <a href="<?=base_url('boards/edit/0/0/')?>">
                        <button class="mt-2 mb-2 btn btn-sm btn-primary" type="button">
                            + Boards erstellen
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

<!-- Tabelle der Boards -->

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Board</th>
                    <th>Bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($boards as $board): ?>
                    <tr>
                        <td> <?= $board['id'] ?> </td>
                        <td> <?= $board['board'] ?> </td>
                        <td>

    <!-- Button zum Bearbeiten eines Boards -->

                            <a href="<?= base_url('boards/edit/'.$board['id'].'/1/') ?>" class="text-decoration-none text-primary me-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>

    <!-- Button zum Löschen eines Boards -->

                            <a href="<?= base_url('boards/edit/'.$board['id'].'/2/') ?>" class="text-decoration-none text-danger">
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
