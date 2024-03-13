<?php
        require_once('modele/creationTable.php');
        require_once('controleur/acceuilControleur.php');
        require_once('controleur/loginControleur.php');
        require_once('controleur/signupControleur.php');
        require_once('controleur/eventControleur.php');

        if(isset($_GET['action']) && $_GET['action'] == 'login'){
                Login();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'signup'){
                Signup();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'register'){
                createUser($_POST);
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'authentification'){
                auth( $_POST);
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'acceuilU'){
                UserloggedIn();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'creer'){
                formEvent();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
                disconnect();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'creerEvent'){
        
         
        $target_dir = "vue/img/";
        $target_file = $target_dir . basename($_FILES["image_event"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
        if(isset($_POST["submit"]) && $_FILES["image_event"]) {
                createEvent($_POST,$_FILES["image_event"]["name"],$_SESSION['userId']);        
        $check = getimagesize($_FILES["image_event"]["tmp_name"]);
        if($check !== false) {
        
        $uploadOk = 1;
        } else {
        
        $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
       
        $uploadOk = 0;
        }

        // Check file size


        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["image_event"]["tmp_name"], $target_file)) {
        
        } else {
        
        }
        }


        
                
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'accueilConnected'){
                UserloggedIn();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'detail_event'){
               if(isset($_GET['id'])){
                findEventById($_GET['id']);
               }
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'detail_event_ncUser'){
                if(isset($_GET['id'])){
                        findEventById_ncUser($_GET['id']);
                }
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'accueilUD'){
                UserloggedIn();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'creerUD'){
                formEvent();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'dashboardConnected'){
                dashboard();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'check'){
                verifier_reservation();
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'delete'){
                if(isset($_GET['id'])){
                        SupprimerEvent($_GET['id']);
                }
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'edit'){
                if(isset($_GET['id'])){
                        modifierEvent($_GET['id']);
                }
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'searchEvents'){
                searchEvents();
        }
        else{
                homepage();
        }