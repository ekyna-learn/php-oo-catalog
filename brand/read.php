<!-- Require bootstrap -->
<?php

require '../bootstrap.php';

use Entity\Brand;

// Ce fichier reçoit un paramètre 'id' via l'URL ( brand/read.php?id= ??? )
// On peut donc récupérer cet identifiant via la variable $_GET (GET = paramètres URL)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// On prépare une requête pour récupérer les données de la marque ayant l'identifiant
$select = $connection->prepare(
    'SELECT id, title, description FROM brand WHERE id=:id LIMIT 1'
);

// On assigne la valeur de l'identifiant au paramètre 'id' de la requête
$select->bindValue('id', $id);

// On exécute la requête select
$select->execute();

// Puis on récupère la (première) ligne de résultat
$data = $select->fetch(\PDO::FETCH_ASSOC);

// Si data vaut FALSE, c'est que l'identifiant ne correspond à aucun enregistrement
// dans la base de données
if (false === $data) {
    // Redirige l'utlisateur vers la page "Liste des marques"
    // On redirige l'internaute vers la page détail...
    http_response_code(302); // Code http de redirection temporaire
    header('Location: index.php'); // Attention à bien écrire "Location: "
    exit;
}

// (Sinon) On créé une instance de la classe Brand et on assigne les données
// provenant du résultat de la requête select.
$brand = new Brand();
$brand->setId($data['id']);
$brand->setTitle($data['title']);
$brand->setDescription($data['description']);

// On utilisera les accesseurs (méthodes get*) plus bas pour afficher les infos.

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
                <h1 class="h2">Détail de la marque</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="/brand/update.php?id=<?php echo $brand->getId(); ?>" class="btn btn-warning">
                        Modifier
                    </a>
                    &nbsp;
                    <a href="/brand/delete.php?id=<?php echo $brand->getId(); ?>" class="btn btn-danger">
                        Supprimer
                    </a>
                </div>
            </div>

            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td><?php echo $brand->getId() ?></td>
                    </tr>
                    <tr>
                        <th>Titre</th>
                        <td><?php echo $brand->getTitle() ?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?php echo $brand->getDescription() ?></td>
                    </tr>
                </tbody>
            </table>

        </main>
    </div>
</div>

<!-- Scripts -->
<?php include PROJECT_ROOT . '/includes/scripts.php'; ?>
</html>
