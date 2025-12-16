<card>
    <div class="p-3">
    <table class="table table-responsive table-bordered table-striped table-hover w-100 d-block d-md-table mt-2"
           data-show-columns="true"
           showColumnsToggleAll="true"
           data-show-toggle="true"
           data-toggle="table"
           data-search="true"
           data-sort-stable="true"
           data-toolbar="#toolbar">

        <thead align="left">
        <tr>
            <th data-sortable="true" style="width: 300px">ID</th>
            <th data-sortable="true" style="width: 300px">Vorname</th>
            <th data-sortable="true" style="width: 300px">Name</th>
            <th style="width: 300px">E-Mail</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($personen as $item ): ?>
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
</card>