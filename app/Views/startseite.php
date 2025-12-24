
    <div class="row justify-content-center">
        <?php foreach ($tasks as $item): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
            <div class="card flex-fill text-center m-3 d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo $item['tasks']; ?></h5>

                    <h6 class="card-subtitle mb-2 text-muted">
                        ID: <?php echo $item['id']; ?>
                    </h6>

                    <p class="card-text">
                        <strong>Notizen:</strong> <?php echo $item['notizen']; ?><br>
                        <strong>Erstellt am:</strong> <?php echo $item['erstellungsdatum']; ?>
                    </p>
                    <div class="mt-auto d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
                    <a href="" class="btn btn-primary w-100 w-md-auto">Bearbeiten</a>
                    <a href="" class="btn btn-primary w-100 w-md-auto" style="background-color: red; border: red">Löschen</a>
                    </div> </div> </div>
            </div>
        <?php endforeach; ?>
    </div>


