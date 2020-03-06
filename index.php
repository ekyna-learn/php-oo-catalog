<!-- Require bootstrap -->
<?php require 'bootstrap.php'; ?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Head -->
    <?php include PROJECT_ROOT . '/includes/head.php'; ?>
    <title>Administration</title>
</head>
<body>
<!-- Top bar -->
<?php include PROJECT_ROOT . '/includes/topbar.php'; ?>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar bar -->
        <?php include PROJECT_ROOT . '/includes/sidebar.php'; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tableau de bord</h1>
            </div>



        </main>
    </div>
</div>

<!-- Scripts -->
<?php include PROJECT_ROOT . '/includes/scripts.php'; ?>
</html>
