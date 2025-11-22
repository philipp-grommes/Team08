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

<!-----------------------------Navigationsleiste Anfang----------------------------->
<nav class="navbar navbar-bg px-3">
    <div class="d-flex align-items-center h-100">
        <a href="https://team08.wi1cm.uni-trier.de/public/">
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
        Tasks
    </div>
    <div class="card-body">
    </div>
    </div>
</div>

<!-----------------------------Footer Anfang----------------------------->
<footer class="footer_class mt-auto">
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


