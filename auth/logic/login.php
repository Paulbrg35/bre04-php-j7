<?php
// Démarrage de la session
session_start();

require '../../connexion.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user) {
            echo "<h1>Email incorrect</h1>";
        } else {
            if (password_verify($password, $user['password'])) {
                
                $_SESSION['user'] = [
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name']
                ];

                header('Location: ../../index.php?route=home');
                exit();
            } else {
                
                echo "<h1>Mot de passe incorrect</h1>";
            }
        }
    } catch (PDOException $e) {
        die("Erreur lors de la connexion : " . $e->getMessage());
    }
} else {
    echo "<h1>Formulaire incomplet</h1>";
}
?>