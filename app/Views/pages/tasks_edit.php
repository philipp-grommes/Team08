
<div class="container">
    <div class="card bg-light mt-4 mb-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong>Datensatz <?= $todo == 2 ? 'löschen' : 'bearbeiten oder neu erstellen' ?></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <?php
            $lock = $todo == 2 ? 'readonly' : '';
            $disabled = $todo == 2 ? 'disabled' : '';
            ?>

            <form action="<?= base_url('tasks/submit') ?>" method="post">

                <div class="form-group row mb-2">
                    <label for="task" class="col-sm-2 col-form-label">Task:</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id" name="id" value="<?=isset($tasks['id']) ? $tasks['id'] : '' ?>">
                        <input type="text" class="form-control"  id="task" name="task"
                               value="<?=isset($tasks['tasks']) ? $tasks['tasks'] : '' ?>" <?= $lock ?> >
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="taskartenid" class="col-sm-2 col-form-label">TaskartenID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="taskartenid" name="taskartenid" value="<?=isset($tasks['taskartenid']) ? $tasks['taskartenid'] : '' ?>" <?= $lock ?>>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="personenid" class="col-sm-2 col-form-label">PersonenID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  id="personenid" name="personenid" value="<?=isset($tasks['personenid']) ? $tasks['personenid'] : '' ?>" <?= $lock ?> >
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="spaltenid" class="col-sm-2 col-form-label">SpaltenID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  id="spaltenid" name="spaltenid" value="<?=isset($tasks['spaltenid']) ? $tasks['spaltenid'] : '' ?>" <?= $lock ?> >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="erinnerungsdatum" class="col-sm-2 col-form-label">Erinnerungsdatum:</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" id="erinnerungsdatum" name="erinnerungsdatum"
                               value="<?= isset($tasks['erinnerungsdatum']) ? str_replace(' ', 'T', substr($tasks['erinnerungsdatum'], 0, 16)) : '' ?>" <?= $lock ?> >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="erinnerung" class="col-sm-2 col-form-label">Erinnerung:</label>
                    <div class="col-sm-10 d-flex align-items-center">
                        <input type="hidden" name="erinnerung" value="0">
                        <input type="checkbox" class="form-check-input m-0"  id="erinnerung" name="erinnerung" value="1"  <?= !empty($tasks['erinnerung']) ? 'checked' : '' ?> <?= $disabled ?> >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="notizen" class="col-sm-2 col-form-label">Notiz:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control"  rows="4" style="resize : none" id="notizen" name="notizen" <?= $lock ?>><?= isset($tasks['notizen']) ? $tasks['notizen'] : '' ?></textarea>
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
                            <button type="submit" class="btn btn-danger mb-2 mr-2" name="btnLoeschen" id="btnLoeschen"><i class="fas fa-trash"></i> Löschen</button>
                        <?php endif ?>

                        <button class="btn btn-primary mb-2" type="submit" name="btnAbbrechen" id="btnAbbrechen"><i class="far fa-window-close"></i> Abbrechen</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



