<div class="flex column">
  <a title="Retour Accueil" class="return" href="index.php?route=home#menu">Retour à l'accueil</a>
  <a title="Retour se connecter" class="return" href="index.php?route=connexion">Retour à la connexion</a>
</div>

<div class="flexForm flex regulHeight">
  <form method="POST" action="index.php?route=registerUser" class="form">
    <?php if( isset( $_GET['error'] ) ) : ?>
    <p class="error"><?= $_GET['error'] ?></p>
    <?php endif; ?>

    <div class="title">Inscription</div>

    <div class="input-container ic1">
      <input id ="userLogin" name="username" class="input" type="text" placeholder=" " />
      <div class="cut"></div>
      <label for="userLogin" class="placeholder">Username</label>
    </div>

    <div class="input-container ic2">
      <input id="emailLogin" name="email" class="input" type="email" placeholder=" " />
      <div class="cut cut-short"></div>
      <label for="emailLogin" class="placeholder">Email</label>
    </div>

    <div class="input-container ic2">
      <input id="passwordLogin" name="password" class="input" type="password" placeholder=" " />
      <div class="cut"></div>
      <label for="passwordLogin" class="placeholder">Mot de passe</label>
    </div>

    <div class="input-container ic2">
      <input id="passwordConfirmedLogin" name="passwordConfirmed" class="input" type="password" placeholder=" " />
      <div class="cut"></div>
      <label for="passwordConfirmedLogin" class="placeholder">Confirmation du mot de passe</label>
    </div>

    <button type="submit" class="submit">Valider</button>
  </form>
</div>
