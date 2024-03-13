<?php

require_once('modele/Event.php');
require_once('modele/connexion.php');

function createEvent(array $event, $img ,string $organizer_id) {
   
        // Appel de la fonction createEventModel en passant les valeurs nécessaires
        $success = createEventModel($event['nom_event'],$event['description'],$event['location_event'],$event['date_event'],$img,$event['heure_debut_event'],$event['heure_fin_event'],$event['prix_event'],$event['places_event'],$event['cat_event'],$organizer_id);
        if ($success) {
            $event = getEventByIdModel($success);
            require_once('vue/detailsEvent.php');
        }
        
}



function findAllEvents() {
    $events = getAllEventsModel();
}

function findEventById($id) {
    $event = getEventByIdModel($id);
    require_once('vue/detailsEvent.php');
}

function findEventById_ncUser($id) {
    $event = getEventByIdModel($id);
    require_once('vue/DetailsUnonC.php');
}


function searchEvents() {
    // Récupération des données envoyées depuis le frontend via AJAX
    $searchTerm = isset($_REQUEST['term']) ? $_REQUEST['term'] : '';
    $categoryId = isset($_REQUEST['categoryId']) ? intval($_REQUEST['categoryId']) : -1;
    $startDate = isset($_REQUEST['startDate']) ? $_REQUEST['startDate'] : null;
    
    // Requête SQL pour chercher les événements correspondants
    $sql = "SELECT * FROM events WHERE title LIKE '%$searchTerm%'";
    
    if ($categoryId != -1) {
        $sql .= " AND category_id = $categoryId";
    }
    
    if (!empty($startDate)) {
        $sql .= " AND date_event >= '$startDate'";
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourne les résultats au format JSON
    echo json_encode(['data' => $results]);
}

