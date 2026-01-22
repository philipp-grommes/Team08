<div class="card mt-4 mx-3 mb-4">
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <div class="card-header d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fs-5 mb-0">Personen</h1>
                    <a href="<?= base_url('personen/personenerstellen') ?>">
                        <button class="mt-2 mb-2 btn btn-sm btn-primary" type="button">
                            + Person erstellen
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover w-100"
                   data-show-columns="true"
                   data-show-toggle="true"
                   data-toggle="table"
                   data-search="true"
                   data-sort-stable="true">
                <thead>
                <tr>
                    <th data-sortable="true">ID</th>
                    <th data-sortable="true">Vorname</th>
                    <th data-sortable="true">Name</th>
                    <th>E-Mail</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($personen as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['vorname'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['email'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>