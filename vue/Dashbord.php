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
                <a href="index.php?action=deconnexion"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
            </div>
            
        </div>

      </header>

      <section class="banner banner1">
        <h1>Mes tickets</h1>
        <a href="#" class="btn-hero">Explorer plus d'evenements</a>
      </section>

      <section class="ticket">
        <div class="noTicket">
            <h3>Vous n'avez pas de tickets encore <i class="far fa-trash-alt"></i></h3>
            <p>Explorer les evenements pour voir les tickets</p>
        </div>
        <div class="myTicket">

        </div>
      </section>

      <section class="banner banner1">
        <h1>Mes evenements</h1>
        <a href="index.php?action=creer" class="btn-hero">Creer un nouveau evenement</a>
      </section>
      <section class="similaires">
     <?php if (!empty($myEvents)) { ?>
      <div class="liste">

      <?php foreach ($myEvents as $event) { ?>

<div class="evenement">
          <div class="entete">
          <a href="#"><img src="vue/img/<?= $event['image_url'] ?>" alt="concert"></a>
          </div>
          <div class="action_on_event">
            <a href="index.php?action=editer&id=<?= $event['id'] ?>"  style="color : green; font-size : 1.5rem"><i class="far fa-edit"></i></a>
            <a href="index.php?action=delete&id=<?= $event['id'] ?>"  style="color : red; font-size : 1.5rem"><i class="far fa-trash-alt"></i></a>
          </div>
          <div class="corps">
            <div>
              <span class="prix"><?= $event['price'] ?></span>
              <span class="categorie"><?= $event['category_name'] ?></span>
            </div>
            <p class="date">Mar,15 2023</p>
            <p class="titre"><a href="#"><?= $event['title'] ?></a></p>
            <a style="color: #0062cc;" class="order_details" href="index.php?action=check&id=<?= $event['id'] ?>">Details reservation <i class="fas fa-external-link-alt"></i></a>
            
          </div>
          
      </div>
    <?php } ?>

</div>
<?php } else { ?>

    <div class="noTicket">
            <h3>Liste vide <i class="far fa-trash-alt"></i></h3>
            
        </div>

<?php } ?>

      </section>


      <footer>
        <p>2024 Evently. Tous droits reserves.</p>
      </footer>
    <script src="vue/bootstrap/js/bootstrap.min.js"></script>
    <script src="anime.js"></script>
</body>
</html>