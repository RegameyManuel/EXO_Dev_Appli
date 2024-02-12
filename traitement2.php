<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);

    if (!empty($nom)) {
        $_SESSION['message'] = "Bonjour, " . htmlspecialchars($nom) . "!";
    } else {
        $_SESSION['message'] = "Le nom est requis.";
    }
    // Redirection pour éviter le rechargement de formulaire sur refresh
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Amélioré avec Session</title>
</head>
<body>
    <?php if (!empty($_SESSION['message'])): ?>
        <p><?= $_SESSION['message'] ?></p>
        <?php unset($_SESSION['message']); // Effacer le message après l'affichage ?>
    <?php endif; ?>
    <form action="index.php" method="post">
        <label for="nom">Votre nom :</label>
        <input type="text" id="nom" name="nom" required>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
