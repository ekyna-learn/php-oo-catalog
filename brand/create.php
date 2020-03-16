<!-- Require bootstrap -->
<?php

require '../bootstrap.php';

// Avec les espaces de noms (namespaces) on doit importer les classes
// que l'on souhaite utiliser avec le mot clé "use".
use Entity\Brand;

// On créé une nouvelle instance de la classe Brand en vue
// de lui assigner les valeurs saisies dans le formulaire
$brand = new Brand();

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
    'brand'       => 'create', // Champ invisible (<input type="hidden" ...>)
    'title'       => 'Apple',
    'description' => 'Marque de smartphones',
];
*/

// Pour savoir si le formulaire a été soumis, on vérifie la présence
// du champ invisible et sa valeur dans le tableau $_POST
if (isset($_POST['brand']) && ($_POST['brand'] === 'create')) {
    // On utilise le mutateur (méthode get*) pour assigner la
    // valeur du champ 'title' à la propriété 'title' de notre
    // instance de la classe Brand.
    $brand->setTitle($_POST['title']);
    $brand->setDescription($_POST['description']);

    // On "prépare" une requête d'insertion. ":brand" et ":description" sont
    // des paramètres auxquels on va assigner des valeurs
    $insert = $connection->prepare(
        'INSERT INTO brand(title, description) VALUES (:title, :description)'
    );

    // On assigne des valeurs aux paramètres.
    // Ici, 'title' fait référence au paramètre ':title'
    $insert->bindValue('title', $brand->getTitle());
    $insert->bindValue('description', $brand->getDescription());

    // On exécute la requête d'insertion
    $insert->execute();

    // On récupère l'identifiant généré par la base de données...
    $id = $connection->lastInsertId();

    // Que l'on attribut à notre instance de la class Brand
    $brand->setId($id);

    // On redirige l'internaute vers la page détail...
    http_response_code(302); // Code http de redirection temporaire
    header('Location: /brand/read.php?id=' . $brand->getId()); // Attention à bien écrire "Location: "
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
                <h1 class="h2">Créer une nouvelle marque</h1>
            </div>

            <!-- Formulaire d'ajout -->
            <form action="/brand/create.php" method="post">

                <!-- Ce champ invisible permet de déterminer si le formulaire a été soumis -->
                <input type="hidden" name="brand" value="create">

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
