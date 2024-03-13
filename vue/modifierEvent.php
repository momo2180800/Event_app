<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="anime.css">
  <link rel="stylesheet" href="vue/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://font.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Creation d'evenement</title>
</head>
<body>
    <header class="connected">
        <div class="logo">
          <img src="vue/img/event-planner-high-resolution-logo.png" alt="Mon logo"> 
        </div>
        <ul>
            <li><a href="index.php?action=accueilConnected">Accueil</a></li>
            <li><a href="index.php?action=creer">Creer Un Evenement</a></li>
            <li><a href="index.php?action=dashboardConnected">Tableau De Bord</a></li>
        </ul>
        <div class="dropdown">
            <button class="dropbtn">
                <i class="fa fa-user"></i>
                <?php echo $_SESSION['name'] ?>
            </button>
            <div class="dropdown-content">
                <a href="#"><i class="fas fa-bell"></i> notifications</a>
                <a href="#"><i class="fa fa-cog"></i> Paramètres</a>
                <a href="index.php?action=deconnexion"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </div>
            
        </div>

      </header>

      <section class="banner">
        <h1>Creer un evenement</h1>
      </section>

      <section class="form">
        <form action="index.php?action=modifier_Event" method="post" enctype="multipart/form-data">
            <div class="form-input">
                <input value="<?= $event['title'] ?>" type="text" name="nom_event" placeholder="Nom de l'evenement" required>
                <select name="cat_event" required>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php } ?>
                  </select>
            </div>
            <div class="form-input">
                <textarea value="<?= $event['desc'] ?>" name="description" placeholder="Description" required></textarea>
                <label for="image" id="drop-area">
                    <input value="vue/img/<?= $event['image_url'] ?>" type="file" id="image" name="image_event" accept="image/*" hidden required>
                    <div id="upload-icon">
                        <img src="vue/img/upload.png" alt="upload icon">
                        <p id="upload-text">Ajouter une image</p>
                    </div>
                </label>
                
            </div>
            <div class="form-input">
                <i class="fas fa-map-marker"></i>
                <input value="<?= $event['lieu'] ?>" type="text" name="location_event" placeholder="Localisation" required>
                <i class="fas fa-calendar"></i>
                <input value="<?= $event['date_event'] ?>" type="date" name="date_event" placeholder="Date de l'evenement" required>
            </div>
            
            <div class="form-input">
                <i class="fas fa-clock"></i>
                <input value="<?= $event['start_date_time'] ?>" type="time" name="heure_debut_event" placeholder="Heure de debut de l'evenement" required>
                <i class="fas fa-clock"></i>
                <input value="<?= $event['end_date_time'] ?>" type="time" name="heure_fin_event" placeholder="Heure de fin de l'evenement" required>
            </div>
            <div class="form-input">
                <i class="fas fa-dollar-sign"></i>
                <input value="<?= $event['price'] ?>" type="number" name="prix_event" placeholder="Prix de l'evenement">
                <i class="fas fa-users"></i>
                <input value="<?= $event['places'] ?>" type="number" name="places_event" placeholder="Nombre de places" required>
            </div>
            <button type="submit" name="submit" class="btn_form">Modifier</button>
        </form>
      </section>    
    <footer>
        <p>2024 Evently. Tous droits reserves.</p>
    </footer>
    <script src="vue/bootstrap/js/bootstrap.min.js"></script>
    <script src="anime.js"></script>
</body>
</html>