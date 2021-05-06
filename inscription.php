<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include './head.php'; 
include './nav.php'; ?>

<div class="center">
  <div class="wrapper registration-flex">
    <section class="form signup">
      <form action="./php/signup.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Prénom</label>
            <input type="text" name="fname" placeholder="Prénom" required>
          </div>
          <div class="field input">
            <label>Nom</label>
            <input type="text" name="lname" placeholder="Nom" required>
          </div>
        </div>
        <div class="field input">
          <label>Adresse email</label>
          <input type="text" name="email" placeholder="Entrez votre email" required>
        </div>
        <div class="field input">
          <label>Mot de passe</label>
          <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Selectionnez l'image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Let's go">
        </div>
      </form>
      <div class="link">Déjà inscrit ? <a href="login.php">Se connecter</a></div>
    </section>
  </div>
</div>


  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

  