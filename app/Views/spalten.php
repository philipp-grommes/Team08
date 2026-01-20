<div class="container mt-5" style="display: flex; align-items: center; justify-content: center">
    <div class="card w-100">

            <div class="card-header d-flex justify-content-between">
                <strong>
                    <h1 class="fs-4">Spalten</h1>
                </strong>
            </div>

        <div class="card-body">
            <div class="bootstrap-table fixed-table-toolbar float-left">
                        <div id="toolbar">
                            <a href="<?=base_url('spalten/edit/0/0/')?>">
                                <button class="btn btn-primary btn-sm mb-3" type="button">+ Neu erstellen</button>
                            </a>
                        </div>
            </div>
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
                   <a href="<?= base_url('spalten/edit/'.$spalte['id'].'/2/') ?>" class="text-decoration-none text-danger text-primary">
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
</div>


