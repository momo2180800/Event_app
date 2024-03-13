<!DOCTYPE html>
<html>
<head>
  <title>Utilisateur non connecte</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

  <header>
    <div class="logo">
      <img src="vue/img/event-planner-high-resolution-logo.png" alt="Mon logo"> 
    </div>
    <div class="login">
      <a href="index.php?action=signup">Inscription</a>
      <a class="button" href="index.php?action=login">Login</a>
      
    </div>
  </header>

  <section class="Details">
        <div class="container_detail">
            <div class="detail_img">
                <img src="vue/img/<?= $event['image_url'] ?>" alt="Image de l'événement">
            </div>
            <div class="detail_text">
                <h2><strong><?= $event['title'] ?></strong></h2>
                <div class="info">
                    <span class="prix"><?= $event['price'] ?>FCFA</span>
                    <span class="categorie"><?= $event['category_name'] ?></span>
                    <strong style="margin-left: 1rem;">    par </strong>
                    <span class="auteur"> <?= $event['organizer_first_name'] ?> <?= $event['organizer_last_name'] ?></span>
                </div>
                <a href="index.php?action=signup" class="btn-hero">Acheter Ticket</a>
                
                    <p><i class="fas fa-map-marker-alt"></i> <span><?= $event['lieu'] ?></span></p>
                    <p><i class="far fa-clock"></i> <span><?= $event['date_event'] ?></span> / <span><?= $event['start_date_time'] ?></span>-<span><?= $event['end_date_time'] ?></span></p>
                
                <div class="detail_description">
                    <span class="a_propos">A propos</span>
                    <?= $event['descp'] ?>
                </div>
            </div>
        </div>
      </section>
      <div class="detail_map"></div>
      <section class="similaires">
        <h2><strong>Evenements similaires</strong></h2>
        
        <div class="liste_similaires">
            <div class="evenement">
                <div class="entete">
                  <a href="#"><img src="vue/img/test.png" alt="concert"></a>
                </div>
                <div class="corps">
                  <div>
                    <span class="prix">5000FCFA</span>
                    <span class="categorie">Technologie</span>
                  </div>
                  <p class="date">Mar,15 2023</p>
                  <p class="titre"><a href="#">Changement climatique</a></p>
                  <p class="org">Organisateur</p>
                </div>
                
            </div>
            <div class="evenement">
                <div class="entete">
                  <a href="#"><img src="vue/img/test.png" alt="concert"></a>
                </div>
                <div class="corps">
                  <div>
                    <span class="prix">5000FCFA</span>
                    <span class="categorie">Technologie</span>
                  </div>
                  <p class="date">Mar,15 2023</p>
                  <p class="titre"><a href="#">Changement climatique</a></p>
                  <p class="org">Organisateur</p>
                </div>
                
              </div>
              <div class="evenement">
                <div class="entete">
                  <a href="#"><img src="vue/img/test.png" alt="concert"></a>
                </div>
                <div class="corps">
                  <div>
                    <span class="prix">5000FCFA</span>
                    <span class="categorie">Technologie</span>
                  </div>
                  <p class="date">Mar,15 2023</p>
                  <p class="titre"><a href="#">Changement climatique</a></p>
                  <p class="org">Organisateur</p>
                </div>
                
              </div>
              
             
              
                
              
              
              
        </div>
        
      </section>

  <footer>
    <p>2024 Evently. Tous droits reserves.</p>
  </footer>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
 </body>
</html>
