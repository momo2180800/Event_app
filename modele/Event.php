<?php
require_once('connexion.php');

function createEventModel($title, $descp, $lieu, $date_event, $image_url, $start_date_time, $end_date_time, $price, $places, $category_id, $organizer_id) {
    // Construire l'URL relative de l'image
    global $conn;

    // Assurez-vous que l'image est définie
    
    $query = "INSERT INTO events (title, descp, lieu, date_event, image_url, start_date_time, end_date_time, price, places, category_id, organizer_id) 
              VALUES (:title, :descp, :lieu, :date_event, :image_url, :start_date_time, :end_date_time, :price, :places, :category_id, :organizer_id)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':descp', $descp);
    $stmt->bindParam(':lieu', $lieu);
    $stmt->bindParam(':date_event', $date_event);
    $stmt->bindParam(':image_url', $image_url);
    $stmt->bindParam(':start_date_time', $start_date_time);
    $stmt->bindParam(':end_date_time', $end_date_time);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':places', $places);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':organizer_id', $organizer_id);

    $success = $stmt->execute();

    global $conn;
    return $conn->lastInsertId();
}


function getAllEventsModel() {
    global $conn;

    $query = "SELECT events.id, events.title, events.descp, events.lieu, events.date_event,
                     events.image_url, events.start_date_time, events.end_date_time, events.price,
                     categories.name as category_name,
                     users.first_name as organizer_first_name, users.last_name as organizer_last_name
              FROM events
              LEFT JOIN categories ON events.category_id = categories.id
              LEFT JOIN users ON events.organizer_id = users.id";

    $stmt = $conn->query($query);

    $events = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $events[] = $row;
    }

    return $events;
}


function getEventByIdModel($id) {
    global $conn;

    $query = "SELECT events.id, events.title, events.descp, events.lieu, events.date_event, 
                     events.image_url, events.start_date_time, events.end_date_time, events.price,
                     categories.name as category_name,
                     users.first_name as organizer_first_name, users.last_name as organizer_last_name
              FROM events
              LEFT JOIN categories ON events.category_id = categories.id
              LEFT JOIN users ON events.organizer_id = users.id
              WHERE events.id = :event_id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':event_id', $id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $event = [
            'id' => $row['id'],
            'title' => $row['title'],
            'descp' => $row['descp'],
            'lieu' => $row['lieu'],
            'date_event' => $row['date_event'],
            'image_url' => $row['image_url'],
            'start_date_time' => $row['start_date_time'],
            'end_date_time' => $row['end_date_time'],
            'price' => $row['price'],
            'category_name' => $row['category_name'],
            'organizer_first_name' => $row['organizer_first_name'],
            'organizer_last_name' => $row['organizer_last_name'],
    
        ];
        return $event;
}

function getMyEventsModel($user){
    global $conn;

    $query = "SELECT events.id, events.title, events.descp, events.lieu, events.date_event, 
                     events.image_url, events.start_date_time, events.end_date_time, events.price,
                     categories.name as category_name,
                     users.first_name as organizer_first_name, users.last_name as organizer_last_name
              FROM events
              LEFT JOIN categories ON events.category_id = categories.id
              LEFT JOIN users ON events.organizer_id = users.id
              WHERE events.organizer_id = :event_organizer_id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':event_organizer_id', $user);
    $stmt->execute();

    $events = [];

    while($row = $stmt->fetch()){
        $event = [
            'id' => $row['id'],
            'title' => $row['title'],
            'descp' => $row['descp'],
            'lieu' => $row['lieu'],
            'date_event' => $row['date_event'],
            'image_url' => $row['image_url'],
            'start_date_time' => $row['start_date_time'],
            'end_date_time' => $row['end_date_time'],
            'price' => $row['price'],
            'category_name' => $row['category_name'],
            'organizer_first_name' => $row['organizer_first_name'],
            'organizer_last_name' => $row['organizer_last_name'],
    
        ];
        $events[] = $event;
    }
        return $events;
};

function deleteEventModel($id){
    global $conn;
    $query = "DELETE FROM events WHERE id = :event_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':event_id', $id);
    $stmt->execute();
}


function getEventsForLiveSearch($query, $categoryId = '', $selectedDate = false)
{
    global $conn;

    $sql = "SELECT * FROM events ";
    $whereClause = [];

    if (!empty($query)) {
        $whereClause[] = "title LIKE '%{$query}%' OR description LIKE '%{$query}%'";
    }

    if (!empty($categoryId)) {
        $whereClause[] = "category_id = {$categoryId}";
    }

    if ($selectedDate !== false) {
        $whereClause[] = "DATE(date_event) = '".date('Y-m-d', $selectedDate)."'";
    }

    if (!empty($whereClause)) {
        $sql .= " WHERE " . implode(" AND ", $whereClause);
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}