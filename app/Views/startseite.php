
    <div class="row justify-content-center">
        <?php foreach ($tasks as $item): ?>
            <div class="card" style="width: 20%; margin: 1rem; text-align: center">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['tasks']; ?></h5>

                    <h6 class="card-subtitle mb-2 text-muted">
                        ID: <?php echo $item['id']; ?>
                    </h6>

                    <p class="card-text">
                        <strong>Notizen:</strong> <?php echo $item['notizen']; ?><br>
                        <strong>Erstellt am:</strong> <?php echo $item['erstellungsdatum']; ?>
                    </p>

                    <a href="#" class="card-link">Bearbeiten</a>
                    <a href="#" class="card-link text-danger">Löschen</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


