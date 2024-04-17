<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT username, email FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<h1>Profil de <?php echo $user['username']; ?></h1>

<p>Email: <?php echo $user['email']; ?></p>

<a href="logout.php">Se déconnecter</a>