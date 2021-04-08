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
                <h1 class="h2">Utilisateurs</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="/user/create.php" class="btn btn-success">
                        Nouvel utilisateur
                    </a>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>admin@example.org</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">
                            Modifier
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            Supprimer
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>

        </main>
    </div>
</div>

<!-- Scripts -->
<?php include PROJECT_ROOT . '/includes/scripts.php'; ?>
</html>
