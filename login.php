<?php 
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT id, username, password FROM users WHERE username = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  
  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username']; 
    header("Location: index.php");
    exit();
  } else {
    $error = "Nom d'utilisateur ou mot de passe incorrect.";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion - Presence Tracker</title>
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
          <h4>Connexion</h4>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <div class="form-group">
              <label for="username">Nom d'utilisateur</label>
              <input type="text" name="username" class="form-control" required>
            </div>    
            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </form>
          <hr>
          <p class="text-center">Pas encore inscrit ? <a href="register.php">Créer un compte</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>