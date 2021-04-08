<!-- Require bootstrap -->
<?php require '../bootstrap.php'; ?>
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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Créer un nouvel utilisateur</h1>
            </div>

            <form method="post">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="plainPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="plainPassword" name="plainPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>

        </main>
    </div>
</div>

<!-- Scripts -->
<?php include PROJECT_ROOT . '/includes/scripts.php'; ?>

</html>
