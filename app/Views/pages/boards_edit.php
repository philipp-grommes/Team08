<?php
$lock = $todo == 2 ? 'readonly' : '';
$disabled = $todo == 2 ? 'disabled' : '';
$error = $error ?? [];
?>

<div class="container">
    <div class="card bg-light mt-4 mb-4">

<!-- Card Header -->

        <legend class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong>Board <?= $todo == 2 ? 'löschen' : 'bearbeiten oder neu erstellen' ?></strong></div>
            </div>
        </legend>

<!-- Card Body -->

        <div class="card-body">

    <!-- Bearbeitungsformular des Boards-->

            <form action="<?= base_url('boards/speichern') ?>" method="post">
                <div class="form-group row mb-2">
                    <label for="board" class="col-sm-2 col-form-label">Board:</label>
                        <div class="col-sm-10">
                            <input type="hidden" id="id" name="id" value="<?=isset($boards['id']) ? $boards['id'] : '' ?>">
                            <input type="text" class="form-control <?= isset($error['board']) ? 'is-invalid' : '' ?>"  id="board" name="board" value="<?=isset($boards['board']) ? $boards['board'] : '' ?>" <?= $lock ?> >
                        <?php if (isset($error['board'])) : ?>
                            <div class="invalid-feedback"><?= ($error['board']) ?></div>
                        <?php endif; ?>
                        </div>
                </div>
                <div class="row mt-4">
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


