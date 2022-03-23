<?php 
if ($_SESSION['role'] === 'admin')
{
}
else
{
    if($_SESSION['sessionKey'] === $user['sessionKey'])
    {
    }
    else 
    {
        header( 'Location: index.php?route=credentials&sessionKey='.$_SESSION['sessionKey']);
        exit();
    }
}

?>

<?php if($_SESSION['role'] === 'admin') : ?>
<div class="flex column">
  <a title="Retour au menu" class="return" href="index.php?route=home#menu">Retour au menu</a>
  <a title="retour à la liste users" class="return" href="index.php?route=admin_users&page=1">Liste des utilisateurs</a>
</div>

<?php elseif($_SESSION['role'] === 'user') : ?>
<div class="flex column">
  <a title="Retour au menu" class="return" href="index.php?route=home#menu">Retour au menu</a>
  <a
    title="Modifier les informations"
    class="return"
    href="index.php?route=credential_update&id=<?= $_SESSION['id'] ?>&fromMenu">Modifier mes infos
  </a>
</div>
<?php endif; ?>

<?php if (isset ($_GET['success']) ) :?>
    <p class="pink"> <?= $_GET['success'] ?><p>
<?php endif; ?>
          
<?php if (isset ($_GET['error']) ) :?>
    <p class="pink"><?= $_GET['error'] ?></p>
<?php endif; ?> 



<div class="flexCenter flex ajust1">
  <table class="tableAdminUsers tableAdminCred">
    <thead>
      <tr>
        <th colspan="6">Informations utilisateurs</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Nom du joueur</td>
        <td><?= htmlspecialchars($user['username'])  ?></td>
      </tr>
      <tr>
        <td>Nombre de personnages</td>
        <td><?= htmlspecialchars($data) ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?= htmlspecialchars($user['email']) ?></td>
      </tr>
      <?php if($_SESSION['role'] === 'admin') :?>
      <tr>
        <td>Rôle</td>
        <td><?= htmlspecialchars($user['role']) ?></td>
      </tr>
      <?php endif; ?>
    </tbody>
    <tfoot></tfoot>
  </table>
</div>

<!--ALL CHARACTERS-->

<?php if(empty($characters))  :?>
<p class="welcome listChar">Vous n'avez pas encore de personnage</p>
<?php else :?>
<div class="divListChar">
  <h2 class="welcome center">Liste des personnages:</h2>
  
  <?php  foreach($characters as $character) : ?>
  <div class="row fullCenter spaceBetween ajustListChar">
    <p class="pEachChar"><?= htmlspecialchars($character['name']) ?></p>
    <a
      title="Afficher les infos"
      class="updateBtn"
      href="index.php?route=updateCharacter&id=<?= $character['id'] ?>">Voir
    </a>
     <a
      title="Suppression personnage"
      class="deleteChar"
      data-idChar="<?= htmlspecialchars($character['id']) ?>"
      href="index.php?route=deleteCharacter&id=<?= htmlspecialchars($character['id']) ?>">Supprimer
    </a>
  </div>
  <hr/>
  <?php endforeach; ?>
</div>
<?php endif; ?>