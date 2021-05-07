<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("Location: users.php");
  }
?>

<?php include './head.php'; 
include './nav.php'; ?>

<div class="center">

  <div class="wrapper registration-flex">
    <section class="form login">
      <form action="./php/login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Adresse email</label>
          <input type="text" name="email" placeholder="Entrez votre email" required>
        </div>
        <div class="field input">
          <label>Mot de passe</label>
          <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Let's go">
        </div>
      </form>
      <div class="link">Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous maintenant</a></div>
    </section>
  </div>
</div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</main>



