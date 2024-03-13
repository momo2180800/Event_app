<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="vue/inscription.css">
    <title>Boostrap Login | Ludiflex</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 " >
           <div class="featured-image mb-3">
            <img src="vue/img/login.jpg" class="img-fluid" style="width: 100%; height: 650px; object-fit: cover">
           </div>
           
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Inscription</h2>
                     <p>Entrez vos informations</p>
                </div>
                <form action="index.php?action=register" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="first_name" class="form-control form-control-lg bg-light fs-6" placeholder="Prenom">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="last_name" class="form-control form-control-lg bg-light fs-6" placeholder="Nom">
                </div>
                <div class="input-group mb-1">
                    <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email" required>
                </div>
                <div class="input-group mb-1">
                    <input type="number" name="telephone" class="form-control form-control-lg bg-light fs-6" placeholder="Telephone" pattern="[0-9]{9}" required>
                </div>
                <div class="input-group mb-1">
                    <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre" required>
                </div>
                <div class="input-group mb-5 d-flex justify-content-start">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>J'accepte les <a href="#">termes et conditions</a></small></label>
                    </div>
                    
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">S'inscrire</button>
                </div>
                </form>
                <div class="row">
                    <small>Vous avez deja un compte? <a href="index.php?action=login">Connectez vous</a></small>
                </div>
          </div>
       </div> 

      </div>
    </div>

</body>
</html>