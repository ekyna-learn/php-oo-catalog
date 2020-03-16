<!-- Require bootstrap -->
<?php

require '../bootstrap.php';

use Entity\Brand;

// Avant de gérer le formulaire, il nous faut récupérer
// l'instance de la class Brand à supprimer. Une partie
// de ce code est donc identique au fichier read.php

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
    'brand' => 'create', // Champ invisible (<input type="hidden" ...>)
    'title'       => 'Apple',
    'description' => 'Marque de smartphones',
];
*/

$error = '';

// Pour savoir si le formulaire a été soumis, on vérifie la présence
// du champ invisible et sa valeur dans le tableau $_POST
if (isset($_POST['brand']) && ($_POST['brand'] === 'delete')) {
    // Les cases à cocher sont des champs HTML un peu particulier :
    // - Si la case est cochée, on trouve la valeur dans $_POST
    // - Sinon (pas cochée) l'index n'est même pas présent dans $_POST
    $confirmed = isset($_POST['confirmed']) && ($_POST['confirmed'] == 1);

    // On "prépare" une requête de supression. ":id" est
    // un paramètre auquel on va assigner une valeur
    $delete = $connection->prepare(
        'DELETE FROM brand WHERE id=:id LIMIT 1'
    );

    // On assigne la valeur au paramètre.
    // Ici, 'id' fait référence au paramètre ':id'
    $delete->bindValue('id', $brand->getId());

    // On exécute la requête de suppression
    // Ici on utilise un try / catch car le serveur de base de données
    // peut refuser de supprimer la marque si elle est liée à un produit.
    // (à cause d'une contrainte de clé étrangère...).
    // Pour contourner cette erreur, il faudrait créer une nouvelle marque
    // (qui ne sera liée à aucun produit) puis la supprimer avec cette page.
    try {
        $delete->execute();
    } catch (\PDOException $e) {
        $error = "Cette marque est liée à un produit et ne peut pas être supprimée.";
    }

    // Si pas d'erreur
    if (empty($error)) {
        // On redirige l'internaute vers la page liste...
        http_response_code(302); // Code http de redirection temporaire
        header('Location: /brand/index.php'); // Attention à bien écrire "Location: "
        exit; // Il faut terminer le script pour que la redirection fonctionne.
    }
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
                <h1 class="h2">Détail de la marque</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="/brand/read.php?id=<?php echo $brand->getId(); ?>" class="btn btn-default">
                        Retour au détail
                    </a>
                    &nbsp;
                    <a href="/brand/update.php?id=<?php echo $brand->getId(); ?>" class="btn btn-warning">
                        Modifier
                    </a>
                </div>
            </div>

            <?php if ($error) { ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
            <?php } ?>

            <!-- Formulaire de suppression (ATTENTION à l'attribut action) -->
            <form action="/brand/delete.php?id=<?php echo $brand->getId(); ?>" method="post">

                <!-- Ce champ invisible permet de déterminer si le formulaire a été soumis -->
                <input type="hidden" name="brand" value="delete">

                <!-- Case à cocher pour confirmer la suppression -->
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="confirmed" name="confirmed" value="1" required="required">
                    <label for="confirmed">Confirmer la suppression ?</label>
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
</html>
