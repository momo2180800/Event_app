
<?php
require_once('modele/User.php');

function Signup(){
    require_once('vue/inscription.php');
}



 function createUser(array $userData) {
        if(isset($userData['email'])  && isset($userData['first_name']) && isset($userData['last_name']) && isset($userData['password'])) {
            
        }
        $result = createUserM($userData);

        // Gérer le résultat (par exemple, rediriger vers une page spécifique)
        if ($result) {
            header('Location: index.php?action=login');
        } else {
            echo "Erreur lors de la création de l'utilisateur.";
        }
    }

    