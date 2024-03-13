<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les tickets vendus d'un evenement</title>
    <link rel="stylesheet" type="text/css" href="anime.css">
    <link rel="stylesheet" href="vue/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://font.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <h1>Reservations</h1>
      </section>
      <section class="liste_reservations">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID Reservation</th>
                <th scope="col">Nom Evenement</th>
                <th scope="col">Acheteur</th>
                <th scope="col">Date creation</th>
                <th scope="col">Prix</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
      </section>
    

    <footer>
        <p>2024 Evently. Tous droits reserves.</p>
    </footer>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="anime.js"></script>
</body>
</html>