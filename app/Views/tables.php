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
                            <a href="<?=base_url('tables/add')?>">
                                <button class="btn btn-primary mb-2" type="button">Erstellen</button>
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
                    <tr>
                        <td>1</td>
                        <td>Allgemeine Todos</td>
                        <td>100</td>
                        <td>Zu Besprechen</td>
                        <td>Noch zu besprechende Todos</td>
                        <td>
                            <a href="<?= base_url('tables') ?>" class="text-decoration-none text-primary me-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?= base_url('tables') ?>" class="text-decoration-none text-primary">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Allgemeine Todos</td>
                        <td>200</td>
                        <td>In Bearbeitung</td>
                        <td>Todos die aktuell bearbeitet werden</td>
                        <td>
                            <a href="<?= base_url('tables') ?>" class="text-decoration-none text-primary me-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?= base_url('tables') ?>" class="text-decoration-none text-primary">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
        </div>

    </div>
</div>
