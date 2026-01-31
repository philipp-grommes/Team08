<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow border-0 p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
        <div class="text-center mb-4">
            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="fas fa-user-lock fa-lg"></i>
            </div>

<!-- Überschrift -->

            <h1 class="fs-4 fw-bold mb-1">Herzlich Willkommen!</h1>
            <p class="text-muted small">Bitte geben Sie Ihre Login-Daten ein</p>
        </div>

<!-- Formular -->

        <form action="<?= base_url('login/authenticateuser')?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="email" class="form-label small fw-bold text-secondary">Email-Adresse</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" name="email" id="email" class="form-control bg-light border-start-0" placeholder="Ihre Email-Adresse" >
                </div>
            </div>

            <div class="mb-4">
                <label for="passwort" class="form-label small fw-bold text-secondary">Passwort</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted">
                        <i class="fas fa-key"></i>
                    </span>
                    <input type="password" name="passwort" id="passwort" class="form-control bg-light border-start-0" placeholder="••••••••" >
                </div>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="text-danger small mt-2 fw-bold">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
            </div>

<!-- Button zum Login und zum Autologin -->

            <div class="d-flex gap-2 mt-4">
                <button type="submit" name="btnLogin" id="btnLogin" class="btn btn-primary py-2 fw-bold shadow-sm flex-fill" style="border-radius: 8px;">
                    Anmelden
                </button>

                <button type="submit" name="btnAutologin" id="btnAutologin" class="btn btn-outline-primary py-2 fw-bold shadow-sm flex-fill" style="border-radius: 8px;">
                    Autologin
                </button>
            </div>
        </form>
    </div>
</div>