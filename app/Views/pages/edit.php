<div class="container">
    <div class="card bg-light mt-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong>Datensatz <?= isset($_POST['btnLoeschen']) ? ' löschen' : ' bearbeiten oder neu erstellen'?></strong></div>
                <div class="h5"><strong></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <form action="<?= base_url('personen/submit_edit') ?>" method="post">

                <div class="form-group row">
                    <label for="Vorname" class="col-sm-2 col-form-label">Vorname:</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id" name="id" value="<?=isset($personen['id']) ? $personen['id'] : '' ?>">
                        <input type="text" class="form-control"  id="vorname" name="vorname" placeholder="Peter"
                               value="<?=isset($personen['vorname']) ? $personen['vorname'] : '' ?>" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Mustermann" value="<?=isset($personen['name']) ? $personen['name'] : '' ?>">
                    </div>
                </div>



                <div class="form-group row">
                    <label for="PLZ" class="col-sm-2 col-form-label">E-Mail:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  id="email" name="email" placeholder="example@gmail.com" value="<?=isset($personen['email']) ? $personen['email'] : '' ?>" >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">

                        <?php if($todo == 0) : ?>
                            <button type="submit" class="btn btn-success mb-2 mr-2" name="btnSpeichern" id="btnSpeichern"><i class="far fa-plus-square"></i> Erstellen</button>
                        <?php endif ?>

                        <?php if($todo == 1) : ?>
                            <button type="submit" class="btn btn-success mb-2 mr-2" name="btnSpeichern" id="btnSpeichern"><i class="far fa-save"></i> Speichern</button>
                        <?php endif ?>

                        <?php if($todo == 2) : ?>
                            <button type="submit" class="btn btn-danger mb-2 mr-2" name="btnLoeschen" id="btnbtnLoeschen"><i class="fas fa-trash"></i> Löschen</button>
                        <?php endif ?>

                        <button class="btn btn-primary mb-2" type="submit" name="btnAbbrechen" id="btnAbbrechen"><i class="far fa-window-close"></i> Abbrechen</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


