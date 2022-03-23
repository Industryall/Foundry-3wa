<?php if($_SESSION['role']==='admin' && !isset($_GET['fromMenu'] ))  :?>
    <a class="return ajustA" href="index.php?route=admin_users&page=1" title="Retour page admin">Retour liste des utilisateurs</a>
<?php elseif ($_SESSION['role']==='user' || isset($_GET['fromMenu'] )) :?>
<div class="flex column">
    <a class="return" href="index.php?route=home#menu" title="Retour au menu général">Retour au menu</a>
    <a href="index.php?route=credentials&sessionKey=<?= $user['sessionKey'] ?>"  class="return" title="Credentials">Afficher mes infos</a>
</div>
<?php endif; ?>

<?php if( isset( $_GET['success'] ) ) : ?>
    <p class="error"><?= $_GET['success'] ?></p>
<?php endif; ?>
 
<div class="flex spaceEvenly ajust3">
  <!--Premier formulaire-->
  <div class="flexForm ajust2">
    <form method="POST" action="index.php?route=updateUser" class="form rewidthForm">
      <?php if( isset( $_GET['error'] ) ) : ?>
      <p class="error"><?= $_GET['error'] ?></p>
      <?php endif; ?>

      <h2 class="title">Modifier mes infos</h2>
      <input
        name="id"
        class="input"
        type="text"
        value="<?= htmlspecialchars($user['id'])  ?>"
        hidden
      />
      <input
        name="sessionKey"
        class="input"
        type="text"
        value="<?= htmlspecialchars($user['sessionKey'])  ?>"
        hidden
      />

      <div class="input-container ic1">
        <input
          id="adminUsername"
          name="username"
          class="input"
          type="text"
          value="<?= htmlspecialchars($user['username']) ?>"
        />
        <div class="cut"></div>
        <label for="adminUsername" class="placeholder">Nom</label>
      </div>

      <div class="input-container ic2">
        <input
          id="adminEmail"
          name="email"
          class="input"
          type="email"
          value="<?= htmlspecialchars($user['email']) ?>"
        />
        <div class="cut cut-short"></div>
        <label for="adminEmail" class="placeholder">Email</label>
      </div>

      <div class="input-container ic2">
        <input id="adminpassword" name="password" class="input" type="password" />
        <div class="cut"></div>
        <label for="adminpassword" class="placeholder">Mot de passe</label>
      </div>

      <div class="input-container ic2">
        <input id="adminNewPassword" name="newPassword" class="input" type="password" />
        <div class="cut"></div>
        <label for="adminNewPassword" class="placeholder">Nouveau mot de passe</label>
      </div>

      <div class="input-container ic2">
        <input id="adminPasswordConfirmed" name="passwordConfirmed" class="input" type="password" />
        <div class="cut"></div>
        <label for="adminPasswordConfirmed" class="placeholder">Confirmation mot de passe</label>
      </div>

      <?php if($_SESSION['role']==='admin') :?>
      <div class="input-container ic2">
        <select name="role" class="input">
          <option value="" disabled>Choisir le rôle</option>

          <?php if($user['role'] === 'admin') :?>
          <option value="admin" selected>Admin</option>
          <option value="user">Utilisateur</option>

          <?php else :?>
          <option value="admin">Admin</option>
          <option value="user" selected>Utilisateur</option>
          <?php endif; ?>
        </select>
      </div>
      <?php else :?>
      <input type="hidden" name="role" value="<?= htmlspecialchars($user['role']) ?>" />
      <?php endif; ?>

      <button type="text" class="submit">Valider</button>
    </form>
  </div>

  <!--All CHARACTERS-->
  <div class="listCharUpdate">
    <h2 class="welcome titleCharAjust">Liste des personnages:</h2>
    <?php  foreach($characters as $character) : ?>

    <div class="row fullCenter spaceBetween">
      <p class="pEachChar"><?= htmlspecialchars($character['name']) ?></p>
      <a
        class="updateBtn"
        title="Afficher les infos persos"
        href="index.php?route=updateCharacter&id=<?= htmlspecialchars($character['id']) ?>">Voir
      </a>
    </div>
    <hr />
    <?php endforeach; ?>
  </div>
</div>