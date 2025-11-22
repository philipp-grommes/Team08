<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Entwicklung Team08</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css')?>">
    <!-- Bootstrap 5 CDN -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class = "d-flex flex-column min-vh-100">

<nav class="navbar navbar-bg px-3">
    <div class="d-flex align-items-center h-100">
        <a href="<?=base_url()?>">
            <img class="navbar_logo" src="<?=base_url('Images/07_-_WE-Logo.svg')?>" alt="Logo">
        </a>
        <a class="navbar-items text-decoration-none" href="<?= base_url() ?>">Tasks</a>
        <a class="navbar-items text-decoration-none" href="<?= base_url() ?>">Boards</a>
        <a class="navbar-items text-decoration-none" href="<?= base_url('tables') ?>">Spalten</a>
    </div>
</nav>
<!-----------------------------Navigationsleiste Ende----------------------------->
<div class="container mt-5" style="display: flex; align-items: center; justify-content: center">
    <div class="card w-100">

        <div class="card-header">
            <div class="d-flex justify-content-between">
                <strong>
                    <h1 class="fs-4">Spalte erstellen</h1>
                </strong>
            </div>
        </div>

        <div class="card-body">
            <fieldset>
                <div class="row mb-2">
                    <label for="Desig" class="col-sm-2 col-form-label">Spalten-Bezeichnung</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Bezeichnung für die Spalte" value>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="Descrip" class="col-sm-2 col-form-label">Spalten-Beschreibung</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="description" rows="4" style="resize : none" name="description" placeholder=""></textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="Sortid" class="col-sm-2 col-form-label">Sortid</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="sortid" name="sortid" placeholder="Sortid angeben" value>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="Board" class="col-sm-2 col-form-label">Board auswählen</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="board" name="board">
                            <option value="todos">Allgemeine Todos</option>
                            <option value="inprogress">In Bearbeitung</option>
                            <option value="done">Erledigt</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <div class="row mt-4">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-success mb-2 me-2" name="btnSpeichern" id="btnSpeichern">
                        Speichern
                    </button>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-secondary mb-2 me-2" name="btnAbbrechen" id="btnAbbrechen">
                        Abbrechen
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-----------------------------Footer Anfang----------------------------->
<footer class = "footer_class mt-auto">
    <div class = "footer-content">
        <div  class="footer-element-left">©Web-Entwicklung Team 08 </div>
        <div class ="right-group">
            <div class ="footer-element-right">Impressum </div>
            <div class ="footer-element-right">Datenschutz </div>
            <div class ="footer-element-right">Kontakt</div>
        </div>
    </div>
</footer>

<!-----------------------------Footer Ende----------------------------->

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

