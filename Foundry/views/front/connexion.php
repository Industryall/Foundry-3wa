<a title="Accueil" class="return" href="index.php?route=home#menu">Retour à l'accueil</a>

<div class="flexForm flex regulHeight">
  <form method="POST" action="index.php?route=logUser" class="form">
    <?php if( isset( $_GET['error'] ) ) : ?>
    <p class="error"><?= $_GET['error'] ?></p>
    <?php endif; ?>

    <div class="title">Connexion</div>

    <div class="input-container ic1">
      <input id="usernameConnexion" name="username" class="input" type="text" placeholder=" " />
      <div class="cut"></div>
      <label for="usernameConnexion" class="placeholder">Nom d'utilisateur</label>
    </div>

    <div class="input-container ic2">
      <input id="passwordConnexion" name="password" class="input" type="password" placeholder=" " />
      <div class="cut"></div>
      <label for="passwordConnexion" class="placeholder">Mot de passe</label>
    </div>

    <button type="text" class="submit">Valider</button>

    <div class="connexionDiv flex">
      <p class="connexionP">Pas encore de compte ?</p>
      <a title="Création du compte" class="connexionA" href="index.php?route=register"
        >Créer un compte</a
      >
    </div>
  </form>
</div>