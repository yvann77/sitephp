<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
  
  $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("sss", $username, $email, $password);
  
  if ($stmt->execute()) {
    $success = "Inscription réussie. Vous pouvez maintenant vous <a href='login.php'>connecter</a>.";
  } else {
    $error = "Une erreur est survenue: " . $mysqli->error;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription - Presence Tracker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Presence Tracker</a>
</nav>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4>Inscription</h4>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if(isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <div class="form-group">
              <label for="username">Nom d'utilisateur</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
          </form>
          <hr>
          <p class="text-center">Déjà inscrit ? <a href="login.php">Se connecter</a></p>
        </div>
      </div>
    </div>
  </div>  
</div>

</body>
</html>