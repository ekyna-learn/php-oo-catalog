<!-- Require bootstrap -->
<?php

require '../bootstrap.php';

use Entity\Brand;

// Avant de gérer le formulaire, il nous faut récupérer
// l'instance de la class Brand à modifier. Une partie
// de ce code est donc identique au fichier read.php

// Ce fichier reçoit un paramètre 'id' via l'URL ( brand/update.php?id= ??? )
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
    header('Location: /brand/index.php'); // Attention à bien écrire "Location: "
    exit;
}

// (Sinon) On créé une instance de la classe Brand et on assigne les données
// provenant du résultat de la requête select.
$brand = new Brand();
$brand->setId($data['id']);
$brand->setTitle($data['title']);
$brand->setDescription($data['description']);

// On utilisera les accesseurs (méthodes get*) plus bas pour mettre les
// valeurs acuelles dans les champs du formulaire.

/*
La variable globale $_POST contient les données soumises par un formulaire
(si ce formulaire a l'attribut method="post").
Lorsque vous affichez le formulaire la première fois (pour pouvoir saisir
des données dans les champs) la variable $_POST est un tableau vide.
Mais suite à un clic de l'internaute sur le bouton (type="submit"), les données
du formulaire sont transmises et sont disponibles dans la variable $_POST.

 -> J'ai ajouté un champ invisible (<input type="hidden" ...>) dans le
    code HTML du formulaire plus bas pour détecter plus facilement
    si le formulaire a été soumis.

Ainsi, si je saisi 'Apple' dans le champ titre, et 'Marque de smartphones'
dans le champ description, la variable $_POST sera dans l'état suivant :

$_POST = [
    'brand'       => 'update', // Champ invisible (<input type="hidden" ...>)
    'title'       => 'Apple',
    'description' => 'Marque de smartphones',
];
*/

// Pour savoir si le formulaire a été soumis, on vérifie la présence
// du champ invisible et sa valeur dans le tableau $_POST
if (isset($_POST['brand']) && ($_POST['brand'] === 'update')) {
    // On utilise le mutateur (méthode get*) pour assigner la
    // valeur du champ 'title' à la propriété 'title' de notre
    // instance de la classe Brand.
    $brand->setTitle($_POST['title']);
    $brand->setDescription($_POST['description']);

    // On "prépare" une requête de modification. ":brand" et ":description" sont
    // des paramètres auxquels on va assigner des valeurs
    $update = $connection->prepare(
        'UPDATE brand SET title=:title, description=:description WHERE id=:id LIMIT 1'
    );

    // On assigne des valeurs aux paramètres.
    // Ici, 'id' fait référence au paramètre ':id'
    $update->bindValue('id', $brand->getId());
    // Ici, 'title' fait référence au paramètre ':title'
    $update->bindValue('title', $brand->getTitle());
    $update->bindValue('description', $brand->getDescription());

    // On exécute la requête de modification
    $update->execute();

    // On redirige l'internaute vers la page détail...
    http_response_code(302); // Code http de redirection temporaire
    header('Location: read.php?id=' . $brand->getId()); // Attention à bien écrire "Location: "
    exit; // Il faut terminer le script pour que la redirection fonctionne.
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
                <h1 class="h2">Modifier la marque</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="/brand/read.php?id=<?php echo $brand->getId(); ?>" class="btn btn-default">
                        Retour au détail
                    </a>
                    &nbsp;
                    <a href="/brand/delete.php?id=<?php echo $brand->getId(); ?>" class="btn btn-danger">
                        Supprimer
                    </a>
                </div>
            </div>

            <!-- Formulaire de modification (ATTENTION à l'attribut action) -->
            <form action="/brand/update.php?id=<?php echo $brand->getId(); ?>" method="post">

                <!-- Ce champ invisible permet de déterminer si le formulaire a été soumis -->
                <input type="hidden" name="brand" value="update">

                <!-- Champ titre -->
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Titre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title"
                               value="<?php echo $brand->getTitle(); ?>">
                    </div>
                </div>

                <!-- Champ description -->
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description">
                            <?php echo $brand->getDescription(); ?>
                        </textarea>
                    </div>
                </div>

                <!-- Bouton submit -->
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

<!-- Les 2 balises <scripts> suivantes permettent de "transformer" le champ description en éditeur HTML !  -->
<script src="https://cdn.tiny.cloud/1/mrjmq4qadtxpbjbrzs3dhn0fqy6m7gj28f707yykznc8dr99/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description',
        menubar: 'edit view format table'
    });
</script>

</html>
