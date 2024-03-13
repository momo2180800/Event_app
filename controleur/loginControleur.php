<?php
 session_start();
require_once('modele/User.php');
require_once('modele/Categorie.php');
require_once('modele/Event.php');

function Login(){
    require_once('vue/authentification.php');
}

function UserloggedIn(){
    if(isset($_SESSION['userId'])){
        $categories = findAllCategories();
        $events = getAllEventsModel();
        require_once('vue/acceuilUser.php');
    }
}

function formEvent(){
    if(isset($_SESSION['userId'])){
        $categories = findAllCategories();
        require_once('vue/formulaireEvent.php');
    }
}

function dashboard(){
    if(isset($_SESSION['userId'])){
        $myEvents = getMyEventsModel($_SESSION['userId']);
        require_once('vue/Dashbord.php');
    }
}

function SupprimerEvent($id){
    if(isset($_SESSION['userId'])){
        deleteEventModel($id);
        require_once('vue/Dashbord.php');
    }
}

function modifierEvent($id){
    if(isset($_SESSION['userId'])){
        $event = getEventByIdModel($id);
        require_once('vue/modifierEvent.php'); 
    }
}

function verifier_reservation(){
    if(isset($_SESSION['userId'])){
        
        require_once('vue/abonneEvent.php');
    }
};




function auth(array $userData) {
    

    if (!empty($userData)) {
        extract($userData);
        $isValidLogin = authenticateUser($userData['email'], $userData['password']);

        if ($isValidLogin !== false) {
            $_SESSION['userId'] = $isValidLogin['id'];
            $_SESSION['name'] = $isValidLogin['last_name'];
            $events = getAllEventsModel();
            $categories = findAllCategories();
            require_once('vue/acceuilUser.php');
        } else {
            echo "Identifiants incorrects.";
        }
    } else {
        login();
    }
}

function disconnect() {
    session_destroy();
    header('Location: index.php');
}

 