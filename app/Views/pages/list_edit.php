<div class="container">
    <div class="card bg-light mt-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong><h1><?= $title; ?></h1></strong></div>
                <div class="h5"><strong></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <div id="toolbar" >
                <a href="<?=base_url('/personen/ced_edit/0/0/')?>">
                    <button class="btn btn-primary mb-2" type="button" name="btnNeu" id="btnNeu">
                        <i class="fas fa-plus-square"></i> Neu</button>
                </a>
            </div>

            <table class="table table-responsive table-bordered table-striped table-hover w-100 d-block d-md-table"
                   data-show-columns="true"
                   showColumnsToggleAll="true"
                   data-show-toggle="true"
                   data-toggle="table"
                   data-search="true"
                   data-sort-stable="true"
                   data-toolbar="#toolbar">
                <thead align="left">
                <tr>
                    <th data-sortable="true">ID</th>
                    <th data-sortable="true">Vorname</th>
                    <th data-sortable="true">Name</th>
                    <th>E-Mail</th>
                    <th class="text-right">Bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($personen as $item ): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['vorname'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['email']?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?=base_url('/personen/ced_edit/' . $item['id'] . '/1/')?>">
                                    <button type='button' name='btnBearbeiten' id='btnBearbeiten' class='btn'><i style="color: Dodgerblue;" class="fas fa-edit"></i></button>
                                </a>
                                <a href="<?=base_url('/personen/ced_edit/' . $item['id'] . '/2/')?>">
                                    <button type='submit' name='btnLoeschen' id='btnLoeschen' class='btn'><i style="color: Dodgerblue;" class="fas fa-trash"></i></button>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
