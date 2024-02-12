<?php
session_start(); 
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = strip_tags($_POST['nom']);
    if (!empty($nom)) {
        $message = "Bonjour, " . htmlspecialchars($nom) . "!";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Simple</title>
</head>
<body>
    <?php if (!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
    <form action="index.php" method="post">
        <label for="nom">Votre nom :</label>
        <input type="text" id="nom" name="nom" required>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
