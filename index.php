<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Presence Tracker - Gestion de présence utilisateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Presence Tracker</a>
  <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['user_id'])): ?>
    <li class="nav-item">
      <a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Déconnexion</a>
    </li>
    <?php else: ?>
    <li class="nav-item">
      <a class="nav-link" href="login.php">Connexion</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="register.php">Inscription</a>
    </li>
    <?php endif; ?>
  </ul>
</nav>

<div class="jumbotron text-center">
  <h1>Bienvenue sur Presence Tracker</h1>
  <p>Une application de gestion de présence utilisateur simple et efficace !</p>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Inscription</h3>
      <p>Créez votre compte en quelques clics.</p>
      <a href="register.php" class="btn btn-primary">S'inscrire</a>
    </div>
    <div class="col-sm-4">
      <h3>Connexion</h3>
      <p>Accédez à votre espace personnel.</p>
      <a href="login.php" class="btn btn-success">Se connecter</a>
    </div>
    <div class="col-sm-4">
      <h3>Fonctionnalités</h3>        
      <p>Gérez facilement vos informations de profil et votre présence.</p>
      <a href="#" class="btn btn-info">En savoir plus</a>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>&copy; 2023 Presence Tracker. Tous droits réservés.</p>
</div>

</body>
</html>