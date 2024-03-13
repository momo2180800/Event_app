<?php
require_once('connexion.php');

function createUserM($userData) {
    global $conn;
    // Prépare la requête
    $stmt = $conn->prepare("INSERT INTO users (email, first_name, last_name, mot_pass, numero_tel) VALUES (?, ?, ?, ?, ?)");
    // Exécute la requête en associant les valeurs aux marqueurs
    $stmt->execute([
        $userData['email'],
        $userData['first_name'],
        $userData['last_name'],
        password_hash($userData['password'], PASSWORD_DEFAULT), // Utilisation de hashage sécurisé
        $userData['telephone']
    ]);
    // Retourne le nombre de lignes affectées
    return $stmt->rowCount();
}

// Renvoie true si l'utilisateur existe et les identifiants sont valides ; false sinon
function authenticateUser($email, $password) {
    global $conn;

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['mot_pass'])) {
        return false;
    }

    return $user;
}