<div class="container">
    <div class="card bg-light mt-4 mb-4">
        <legend class="card-header">
            <div class="d-flex justify-content-between">
                <div class="h5"><strong>Task <?= $todo == 2 ? 'löschen' : ($todo == 0 ? 'neu erstellen' : 'bearbeiten') ?></strong></div>
            </div>
        </legend>
        <div class="card-body">

            <?php
            $lock = $todo == 2 ? 'readonly' : '';
            $disabled = $todo == 2 ? 'disabled' : '';
            $error = $error ?? [];
            ?>

            <!-- Bearbeitungsformular -->

            <form action="<?= base_url('tasks/speichern') ?>" method="post">

                <div class="form-group row mb-3">
                    <label for="tasks" class="col-sm-2 col-form-label">Aufgabe:</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id" name="id" value="<?= isset($tasks['id']) ? ($tasks['id']) : '' ?>">
                        <input type="text"
                               class="form-control <?= isset($error['tasks']) ? 'is-invalid' : '' ?>"
                               id="tasks" name="tasks"
                               value="<?= isset($tasks['tasks']) ? ($tasks['tasks']) : '' ?>" <?= $lock ?> >
                        <?php if (isset($error['tasks'])) : ?>
                            <div class="invalid-feedback"><?= ($error['tasks']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Taskarten -->

                <div class="form-group row mb-3">
                    <label for="taskartenid" class="col-sm-2 col-form-label">Taskart:</label>
                    <div class="col-sm-10">

                        <!-- Hidden Input -->

                        <input type="hidden" id="taskartenid" name="taskartenid"
                               value="<?= isset($tasks['taskartenid']) ? $tasks['taskartenid'] : '' ?>">
                        <input type="hidden" name="boardsid" value="<?= ($currentBoardId ?? '1') ?>">

                        <!-- Button-Gruppe -->

                        <div class="btn-group" role="group" aria-label="Taskarten">
                            <?php if (isset($taskarten) && is_array($taskarten)): ?>
                                <?php foreach ($taskarten as $taskart): ?>
                                    <button type="button"
                                            class="btn btn-outline-primary taskart-btn"
                                            data-id="<?= $taskart['id'] ?>"
                                            data-icon="<?= $taskart['taskartenicon'] ?>"
                                            data-name="<?= $taskart['taskart'] ?>">
                                        <i class="fa <?= $taskart['taskartenicon'] ?> me-1"></i>
                                        <?= $taskart['taskart'] ?>
                                    </button>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <?php if (isset($error['taskartenid'])) : ?>
                            <div class="invalid-feedback d-block"><?= ($error['taskartenid']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Zugewiesene Person -->

                <div class="form-group row mb-3">
                    <label for="personenid" class="col-sm-2 col-form-label">Zugewiesene Person:</label>
                    <div class="col-sm-10">
                        <select class="form-control <?= isset($error['personenid']) ? 'is-invalid' : '' ?>"
                                id="personenid" name="personenid" <?= $disabled ?>>
                            <option value="">-- Bitte wählen --</option>
                            <?php if (isset($personen) && is_array($personen)): ?>
                                <?php foreach ($personen as $person): ?>
                                    <option value="<?= $person['id'] ?>"
                                            <?= (isset($tasks['personenid']) && $tasks['personenid'] == $person['id']) ? 'selected' : '' ?>>
                                        <?= ($person['vorname'] . ' ' . $person['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <?php if (isset($error['personenid'])) : ?>
                            <div class="invalid-feedback"><?= ($error['personenid']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Spalten -->

                <div class="form-group row mb-3">
                    <label for="spaltenid" class="col-sm-2 col-form-label">Spalte:</label>
                    <div class="col-sm-10">
                        <select class="form-control <?= isset($error['spaltenid']) ? 'is-invalid' : '' ?>"
                                id="spaltenid" name="spaltenid" <?= $disabled ?>>
                            <option value="">-- Bitte wählen --</option>
                            <?php if (isset($spalten) && is_array($spalten)): ?>
                                <?php foreach ($spalten as $spalte): ?>
                                    <option value="<?= $spalte['id'] ?>"
                                            <?= (isset($tasks['spaltenid']) && $tasks['spaltenid'] == $spalte['id']) ? 'selected' : '' ?>>
                                        <?=($spalte['spalte']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <?php if (isset($error['spaltenid'])) : ?>
                            <div class="invalid-feedback"><?=($error['spaltenid']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Erinnerung -->

                <div class="form-group row mb-3">
                    <label for="erinnerung" class="col-sm-2 col-form-label">Erinnerung:</label>
                    <div class="col-sm-10 d-flex align-items-center">
                        <input type="hidden" name="erinnerung" value="0">
                        <input type="checkbox" class="form-check-input m-0" id="erinnerung" name="erinnerung" value="1" <?= !empty($tasks['erinnerung']) ? 'checked' : '' ?> <?= $disabled ?> >
                    </div>
                </div>

                <!-- Erinnerungsdatum -->

                <div class="form-group row mb-3" id="erinnerungsdatum-row"> <label for="erinnerungsdatum" class="col-sm-2 col-form-label">Erinnerungsdatum:</label>
                    <div class="col-sm-10">
                        <input type="datetime-local"
                               class="form-control <?= isset($error['erinnerungsdatum']) ? 'is-invalid' : '' ?>"
                               id="erinnerungsdatum" name="erinnerungsdatum"
                               value="<?= isset($tasks['erinnerungsdatum']) ? (str_replace(' ', 'T', substr($tasks['erinnerungsdatum'], 0, 16))) : '' ?>" <?= $lock ?> >
                        <?php if (isset($error['erinnerungsdatum'])) : ?>
                            <div class="invalid-feedback"><?= esc($error['erinnerungsdatum']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Notizen -->

                <div class="form-group row mb-3">
                    <label for="notizen" class="col-sm-2 col-form-label">Notiz:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= isset($error['notizen']) ? 'is-invalid' : '' ?>"
                                  rows="4" style="resize : none" id="notizen" name="notizen" <?= $lock ?>><?= isset($tasks['notizen']) ? ($tasks['notizen']) : '' ?></textarea>
                        <?php if (isset($error['notizen'])) : ?>
                            <div class="invalid-feedback"><?= ($error['notizen']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Buttons zum Speichern/Löschen der Task sowie Abbruchbutton -->

                <div class="row mt-4">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10 d-flex gap-2 flex-wrap">
                        <?php if($todo == 0) : ?>
                            <button type="submit" class="btn btn-success" name="btnSpeichern"><i class="far fa-plus-square"></i> Erstellen</button>
                        <?php endif ?>

                        <?php if($todo == 1) : ?>
                            <button type="submit" class="btn btn-success" name="btnSpeichern"><i class="far fa-save"></i> Speichern</button>
                        <?php endif ?>

                        <?php if($todo == 2) : ?>
                            <button type="submit" class="btn btn-danger" name="btnLoeschen"><i class="fas fa-trash"></i> Löschen</button>
                        <?php endif ?>

                        <a href="<?= base_url('tasks/tasksfromboards/'.($currentBoardId ?? '0')) ?>" class="btn btn-primary">
                            <i class="far fa-window-close"></i> Abbrechen
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Einbindung JS -->

<script src="<?= base_url('js/taskart.js') ?>"></script>