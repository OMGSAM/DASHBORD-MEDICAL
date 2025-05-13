<?php
include 'server/server.php';
?>
<?php
// session_start();
 

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['id'];

// Récupérer les informations de l'utilisateur
$stmt = $conn->prepare("SELECT username, user_type ,created_at, password, id FROM tbl_users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "Utilisateur non trouvé.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Utilisateur</title>
</head>
<body>
    <h1>Profil de <?php echo htmlspecialchars($user['username']); ?></h1>
    <p>pass : <?php echo htmlspecialchars($user['password']); ?></p>
    <p>type : <?php echo htmlspecialchars($user['user_type']); ?></p>
    <p>date : <?php echo htmlspecialchars($user['created_at']); ?></p>

    <p>id : <?php echo htmlspecialchars($user['id']); ?></p>

    <a href="logout.php">Se déconnecter</a>
</body>
</html>
