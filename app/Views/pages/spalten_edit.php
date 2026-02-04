<div class="container mt-5" style="display: flex; align-items: center; justify-content: center">
    <div class="card w-100">
        <div class="card-header d-flex justify-content-between">
            <strong>
                <h1 class="fs-4">Spalte <?= $todo == 2 ? 'löschen' : ($todo == 1 ? 'bearbeiten' : 'erstellen') ?></h1>
            </strong>
        </div>

        <div class="card-body">
            <?php
            $lock = $todo == 2 ? 'readonly' : '';
            $disabled = $todo == 2 ? 'disabled' : '';
            $error = $error ?? [];
            ?>

            <form action="<?= base_url('spalten/speichern') ?>" method="post">
                <input type="hidden" name="id" value="<?= isset($spalten['id']) ? ($spalten['id']) : '' ?>">

                <fieldset>
                    <div class="row mb-4">
                        <label for="spalte" class="col-sm-2 col-form-label">Spalten-Bezeichnung</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= isset($error['spalte']) ? 'is-invalid' : '' ?>" id="spalte" name="spalte" value="<?= isset($spalten['spalte']) ? ($spalten['spalte']) : '' ?>" <?= $lock ?>>
                            <?php if (isset($error['spalte'])) : ?>
                                <div class="invalid-feedback">
                                    <?= ($error['spalte']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="spaltenbeschreibung" class="col-sm-2 col-form-label">Spalten-Beschreibung</label>
                        <div class="col-sm-10">
                            <textarea class="form-control <?= isset($error['spaltenbeschreibung']) ? 'is-invalid' : '' ?>" id="spaltenbeschreibung" rows="4" style="resize : none" name="spaltenbeschreibung" <?= $lock ?>><?= isset($spalten['spaltenbeschreibung']) ? ($spalten['spaltenbeschreibung']) : '' ?></textarea>
                            <?php if (isset($error['spaltenbeschreibung'])) : ?>
                                <div class="invalid-feedback">
                                    <?= ($error['spaltenbeschreibung']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="boardsid" class="col-sm-2 col-form-label">Board auswählen</label>
                        <div class="col-sm-10">
                            <select class="form-select <?= isset($error['boardsid']) ? 'is-invalid' : '' ?>" id="boardsid" name="boardsid" <?= $disabled ?>>
                                <option value="">-- Bitte wählen --</option>
                                <?php if (isset($boards) && is_array($boards)): ?>
                                    <?php foreach ($boards as $board): ?>
                                        <option value="<?= $board['id'] ?>"
                                                <?= (isset($spalten['boardsid']) && $spalten['boardsid'] == $board['id']) ? 'selected' : '' ?>>
                                            <?= ($board['board']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?php if (isset($error['boardsid'])) : ?>
                                <div class="invalid-feedback">
                                    <?= ($error['boardsid']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="sortid" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-10">
                            <select class="form-select <?= isset($error['sortid']) ? 'is-invalid' : '' ?>" id="sortid" name="sortid"<?= $lock ?>>
                                <?php if (!empty($spalten['sortid'])): ?>
                                    <option value="<?= $spalten['sortid'] ?>" selected>
                                        <?= $spalten['sortid'] ?>
                                    </option>
                                <?php else: ?>
                                    <option value="">-- zuerst Board wählen --</option>
                                <?php endif; ?>
                            </select>

                            <?php if (isset($error['sortid'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $error['sortid'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </fieldset>

                <div class="row mt-4">
                    <div class="col-sm-10 offset-sm-2 d-flex gap-2">
                        <?php if($todo == 0) : ?>
                            <button type="submit" class="btn btn-success mb-2" name="btnSpeichern"><i class="far fa-plus-square"></i> Erstellen</button>
                        <?php endif ?>

                        <?php if($todo == 1) : ?>
                            <button type="submit" class="btn btn-success mb-2" name="btnSpeichern"><i class="far fa-save"></i> Speichern</button>
                        <?php endif ?>

                        <?php if($todo == 2) : ?>
                            <button type="submit" class="btn btn-danger mb-2" name="btnLoeschen"><i class="fas fa-trash"></i> Löschen</button>
                        <?php endif ?>

                        <a href="<?= base_url('spalten') ?>" class="btn btn-primary mb-2">
                            <i class="far fa-window-close"></i> Abbrechen
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.baseUrl = "<?= base_url() ?>";
</script>
<script src="<?= base_url('js/spaltensortid.js') ?>"></script>