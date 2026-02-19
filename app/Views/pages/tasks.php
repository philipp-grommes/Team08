<div class="container-fluid mt-4">
    <div class="card p-3 mb-4 shadow-sm border-0 bg-white">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h4 mb-0 fw-bold text-dark">
                    <i class="bi bi-kanban me-2 text-primary"></i><?= ($activeBoardName ?? 'Übersicht') ?>
                </h1>
            </div>

            <!-- Drop-Down zum Wechseln der Boards -->

            <div class="d-flex gap-2">
                <div class="dropdown">
                    <button class="btn btn-outline-success btn-sm dropdown-toggle shadow-sm" data-bs-toggle="dropdown">
                        <i class="bi bi-arrow-left-right me-1"></i> Board wechseln
                    </button>
                    <div class="dropdown-menu dropdown-menu-end shadow border-0">
                        <?php if (!empty($allBoards)): ?>
                            <?php foreach ($allBoards as $b): ?>
                                <a class="dropdown-item" href="<?= base_url('/tasks/tasksfromboards/'.$b['id']) ?>">
                                    <?= ($b['board']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (isset($currentBoardId) && $currentBoardId > 0): ?>
                    <a href="<?= base_url('/tasks/edit/0/0/'.$currentBoardId) ?>" class="btn btn-primary btn-sm shadow-sm">
                        <i class="bi bi-plus-lg me-1"></i> Neu erstellen
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Aufbau Spalten des Boards -->

    <div class="row flex-nowrap overflow-auto pb-4 custom-kanban-scroll" style="min-height: 75vh;">
        <?php if (!empty($spalten)): ?>
            <?php foreach ($spalten as $sId => $spalte): ?> <div class="col-12 col-sm-6 col-md-4 col-lg-4" style="min-width: 320px;">
                <div class="card bg-light h-100 shadow-sm border-0 rounded-3">
                    <div class="card-header border-bottom-0 bg-transparent pt-3 pb-2 px-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0 text-truncate" title="<?= ($spalte['name']) ?>">
                                <?= ($spalte['name']) ?>
                            </h5>
                            <span class="badge bg-secondary-soft text-dark rounded-pill small">
                                    <?= count($spalte['tasks'] ?? []) ?>
                                </span>
                        </div>
                        <small class="text-muted d-block text-truncate"><?= ($spalte['beschreibung'] ?? '') ?></small>
                    </div>

                    <!-- Aufbau Tasks der Boards innerhalb der Spalte -->

                    <div class="card-body px-2 pt-0 drag-container" data-column-id="<?= $sId ?>" style="min-height: 150px;">
                        <?php if (!empty($spalte['tasks'])): ?>
                            <?php foreach ($spalte['tasks'] as $item): ?>

                                <!-- Titel der Tasks -->

                                <div class="card mb-3 shadow-sm border-0 rounded-3 task-card" data-task-id="<?= $item['task_id'] ?>">
                                    <div class="card-header bg-white border-bottom-0 pt-3 pb-0 px-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="d-flex align-items-center gap-4">
                                                <h6 class="fw-bold mb-0 text-dark lh-base">
                                                    <?= ($item['task_titel'] ?? 'Kein Titel'); ?>
                                                </h6>
                                            </div>

                                            <!-- Icon zum Bearbeiten -->

                                            <a href="<?= base_url('/tasks/edit/'.($item['task_id']).'/1/'.($currentBoardId ?? 0)) ?>"
                                               class="text-primary p-1 hover-scale transition" title="Bearbeiten">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="card-body py-2 px-3">

                                        <!-- Zugewiesene Person -->

                                        <div class="d-flex align-items-center mb-2 text-muted small">
                                            <i class="bi bi-person-circle me-2 text-secondary" style="width: 18px;"></i>
                                            <span><?= (($item['vorname'] ?? '') . ' ' . ($item['nachname'] ?? '')); ?></span>
                                        </div>

                                        <!-- Notizen zur Task -->

                                        <div class="d-flex align-items-start mb-2 text-muted small">
                                            <i class="bi bi-card-text me-2 text-secondary flex-shrink-0" style="width: 18px; margin-top: 2px;"></i>
                                            <span class="text-break w-100"><?= ($item['notizen'] ?? '-'); ?></span>
                                        </div>

                                        <!-- Zugewiesene Person -->

                                        <div class="d-flex align-items-center mb-2 text-muted small">
                                            <i class="bi bi-calendar3 me-2 text-secondary" style="width: 18px;"></i>
                                            <span><?= date('d.m.Y', strtotime($item['erstellungsdatum'])); ?></span>
                                        </div>

                                        <!-- Erinnerungsdatum -->

                                        <div class="d-flex align-items-center text-muted small">

                                            <div class="d-flex align-items-center">
                                                <?php if (!empty($item['erinnerungsdatum']) && $item['erinnerungsdatum'] !== '0000-00-00 00:00:00'): ?>
                                                    <i class="bi bi-bell me-2 text-secondary" style="width: 18px;"></i>
                                                    <span><?= date('d.m.Y H:i', strtotime($item['erinnerungsdatum'])); ?> Uhr</span>
                                                <?php else: ?>
                                                    <i class="bi bi-bell-slash me-2 text-secondary-50" style="width: 18px;"></i>
                                                    <span class="text-secondary-50">Keine Erinnerung</span>
                                                <?php endif; ?>
                                            </div>

                                            <span class="d-flex align-items-center ms-auto">
                                                <i class="bi <?= ($item['taskartenicon'] ?? 'bi-question-circle') ?> fs-5" style="color: darkblue"></i>
                                                <span class="ms-1 small text-dark">
                                                    <?= ($item['taskartenname'] ?? '') ?>
                                                </span>
                                            </span>
                                        </div>

                                        <!-- Erledigt Button -->

                                        <div class="mt-3 pt-2 border-top d-flex gap-2">
                                            <a href="<?= base_url('/tasks/edit/'.($item['task_id']).'/2/'.($currentBoardId ?? 0)) ?>"
                                               class="btn btn-sm btn-outline-success flex-grow-1 py-1">
                                                <i class="bi bi-check-lg"></i> <span class="d-none d-md-inline">Erledigt</span>
                                            </a>

                                            <!-- Löschen Button -->

                                            <a href="<?= base_url('/tasks/edit/'.($item['task_id']).'/2/'.($currentBoardId ?? 0)) ?>"
                                               class="btn btn-sm btn-outline-danger flex-grow-1 py-1">
                                                <i class="bi bi-trash"></i> <span class="d-none d-md-inline">Löschen</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Fallback Seite, falls kein Board ausgewählt wurde -->

        <?php else: ?>
            <div class="col-12 text-center py-4">
                <div class="py-5 bg-white rounded-3 shadow-sm border">
                    <i class="bi bi-layout-three-columns display-4 text-muted mb-3 d-block"></i>
                    <h3 class="text-muted">Bitte wähle ein Board aus</h3>
                    <p class="text-muted">Wähle oben ein Board, um deine Kanban-Spalten zu sehen.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Einbindung JS -->

<script>

    const tasks = {
        updateUrl: '<?= base_url("tasks/updatecolumn") ?>',
    };
</script>
<script src="<?= base_url('js/draganddrop.js') ?>"></script>