<!-- Require bootstrap -->
<?php require 'bootstrap.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administration - Authentification</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="/css/login.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin">
    <!--<img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
    <h1 class="h3 mb-3 font-weight-normal">Authentification</h1>
    <label for="inputEmail" class="sr-only">Adresse email</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Adresse email" required autofocus>
    <label for="inputPassword" class="sr-only">Mot de passe</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
    <!--<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>-->
</form>
</body>
</html>
