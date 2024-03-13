<!DOCTYPE html>
<html>
<head>
  <title>Utilisateur non connecte</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

  <!-- Dans la section hero -->

<section class="hero">

  <div class="text">
    <h1>Organisez vos evenements en toute simplicite</h1>
    
    <p>Notre application vous permet de gerer facilement tous les aspects de vos evenements : inscription des participants, planification des activites, suivi du budget, etc. Optimisez l'organisation de vos conferences, seminaires, fêtes en quelques clics !</p>
    <a href="#" class="btn-hero">Explorer</a>
  
  </div>

  <div class="image">
    <img src="vue/img/hero.png" alt="Image Hero">
  </div>

</section>

<section class="evenements">

  <div class="titre">
    <h2><strong>Decouvrez les evenements à venir</strong></h2> 
  </div>

  <form method="post">
  <div class="recherche">
  <div class="item_s">
    <span class="icon_recherche"><i class="fas fa-search"></i></span>
    <input type="text" placeholder="Rechercher..." id="search-box">
  </div>
  
  <div class="filtres">

    <select id="category-select">
      <option>Toutes les categories</option>
      <?php foreach ($categories as $category) { ?>
        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
      <?php } ?>
    </select>

    <input type="date" id="date-input">

  </div>

</div>
</form>

  <div class="liste">
    <?php foreach ($events as $event) { ?>
      <div class="evenement">
      <div class="entete">
        <a href="index.php?action=detail_event_ncUser&id=<?= $event['id'] ?>"><img src="vue/img/<?= $event['image_url'] ?>" alt="concert"></a>
      </div>
      <div class="corps">
        <div>
          <span class="prix"><?= $event['price'] ?>FCFA</span>
          <span class="categorie"><?= $event['category_name'] ?></span>
        </div>
        <p class="date"><?= $event['date_event'] ?></p>
        <p class="titre"><a href="index.php?action=detail_event_ncUser&id=<?= $event['id'] ?>"><?= $event['title'] ?></a></p>
        <p class="org"><?= $event['organizer_first_name'] ?></p>
      </div>
      
    </div>
    <?php } ?>
  </div>

</section>

<footer>
  <p>2024 Evently. Tous droits reserves.</p>
</footer>

<script src="anime.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $('#search-box, #category-select, #date-input').on('change keyup', function () {
        var query = $("#search-box").val();
        var categoryId = parseInt($("#category-select option:selected").val());
        var selectedDate = $("#date-input").val();

        $.ajax({
            url: "index.php?action=searchEvents",
            method: "GET",
            data: {
               
                term: query,
                categoryId: isNaN(categoryId) ? -1 : categoryId,
                startDate: selectedDate
            },
            dataType: "json",
            success: function (response) {
                afficherResultats(response.data);
            }
        });
    });
});

function afficherResultats(resultats) {
    var eventListe = "<div class='evenements'>";
    for (let i = 0; i < resultats.length; i++) {
        eventListe += `
            <div class="evenement">
              <div class="entete">
                <a href="index.php?action=detail_event_ncUser&id=${resultats[i].id}"><img src="vue/img/${resultats[i].image_url}" alt="${resultats[i].title}"></a>
              </div>
              <div class="corps">
                <div>
                  <span class="prix">${resultats[i].price} FCFA</span>
                  <span class="categorie">${resultats[i].category_name}</span>
                </div>
                <p class="date">${resultats[i].date_event}</p>
                <p class="titre"><a href="index.php?action=detail_event_ncUser&id=${resultats[i].id}">${resultats[i].title}</a></p>
                <p class="org">${resultats[i].organizer_first_name}</p>
              </div>
            </div>
        `;
    }
    eventListe += "</div>";
    $('.liste').html(eventListe);
}
</script>
</body>
</html>
