<!-- Require bootstrap -->
<?php

require '../bootstrap.php';

use Entity\Brand;

$statement = $connection->query('SELECT id, title, description FROM brand');

$brands = [];

while(false !== $data = $statement->fetch(\PDO::FETCH_ASSOC)) {
    $brand = new Brand();
    $brand->setId($data['id']);
    $brand->setTitle($data['title']);
    $brand->setDescription($data['description']);

    $brands[] = $brand;
}

?>
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
                <h1 class="h2">Marques</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="/brand/create.php" class="btn btn-success">
                        Nouvelle marque
                    </a>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($brands as $brand) { ?>
                <tr>
                    <th scope="row"><?php echo $brand->getId() ?></th>
                    <td>
                        <a href="/brand/read.php?id=<?php echo $brand->getId() ?>">
                            <?php echo $brand->getTitle() ?>
                        </a>
                    </td>
                    <td>
                        <a href="/brand/update.php?id=<?php echo $brand->getId() ?>" class="btn btn-sm btn-warning">
                            Modifier
                        </a>
                        <a href="/brand/delete.php?id=<?php echo $brand->getId() ?>" class="btn btn-sm btn-danger">
                            Supprimer
                        </a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

        </main>
    </div>
</div>

<!-- Scripts -->
<?php include PROJECT_ROOT . '/includes/scripts.php'; ?>
</html>
