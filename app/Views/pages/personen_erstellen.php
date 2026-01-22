<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h1 class="fs-4 mb-0">Neue Person anlegen</h1>
        </div>

        <div class="card-body">
            <form action="<?= base_url('personen/store') ?>" method="post">
                <?= csrf_field() ?> <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="vorname" class="form-label">Vorname</label>
                        <input type="text" name="vorname" id="vorname" class="form-control" placeholder="z.B. Max" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="z.B. Mustermann" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail Adresse</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="name@beispiel.de" required>
                </div>

                <div class="mb-4">
                    <label for="passwort" class="form-label">Passwort</label>
                    <input type="password" name="passwort" id="passwort" class="form-control" required>
                    <div class="form-text">Wähle ein sicheres Passwort.</div>
                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="<?= base_url('personen') ?>" class="btn btn-outline-secondary">Abbrechen</a>
                    <button name="btnStore" type="submit" class="btn btn-primary">Person speichern</button>
                </div>
            </form>
        </div>
    </div>
</div>