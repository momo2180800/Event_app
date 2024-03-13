<?php

require_once('modele/Categorie.php');

require_once('modele/Event.php');


function homepage() {

    $categories = findAllCategories();
    $events = getAllEventsModel();
    require('vue/acceuil.php');
}

