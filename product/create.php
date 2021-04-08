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
                <h1 class="h2">Créer un nouveau produit</h1>
            </div>

            <form method="post">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Titre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
                <!-- TODO <div class="form-group row">
                    <label for="brand" class="col-sm-2 col-form-label">Marque</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="brand" name="brand">
                            <option value="{brand.id}">{brand.title}</option>
                        </select>
                    </div>
                </div>-->
                <!-- TODO <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Marque</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category" name="category">
                            <option value="{category.id}">{category.title}</option>
                        </select>
                    </div>
                </div>-->
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Prix</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="price" name="price" min="0" step="0.01">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="stock" name="stock" min="0" step="1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="released_at" class="col-sm-2 col-form-label">Mise en ligne</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="released_at" name="released_at">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image">
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
<script src="https://cdn.tiny.cloud/1/mrjmq4qadtxpbjbrzs3dhn0fqy6m7gj28f707yykznc8dr99/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description',
        menubar: 'edit view format table'
    });
</script>
</html>
