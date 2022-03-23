<div class="flex column wrapAndTable">
  <div class="flex divAdminGlobal">
    <!--MENU -->
    <div class="wrapper">
      <div class="sidebar">
        <div class="profile">
          <a title="Menu div" href="index.php?route=home#menu">
            <img alt="logo" src="https://i.pinimg.com/564x/d0/53/f2/d053f2394d420d8d3712046f4e8f80cc.jpg" />
          </a>
        </div>
        <ul>
          <li>
            <a title="Accueil" href="index.php?route=dashboard">
              <span class="icon"><i class="fas fa-home"></i></span>
              <span class="item">Accueil</span>
            </a>
          </li>
  
          <li>
            <a title="Listes utilisateurs" href="index.php?route=admin_users" class="active">
              <span class="icon"><i class="fas fa-user-friends"></i></span>
              <span class="item">Utilisateurs</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
      
      <!--PAGE CENTRALE-->
      <!--Tableau utilisateurs-->
      <div class="flexCenter flex tableAjust">
        <table class="tableAdminUsers tableAdminMain">
          <thead>
            <tr>
              <th colspan="7">Gestion des utilisateurs</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nom du joueur</td>
              <td>ID</td>
              <td>Persos</td>
        
              <td>Rôle</td>
              <td colspan="4">Action</td>
            </tr>
        
            <?php foreach($users as $user) : ?>
            <tr>
              <td>
                <?= htmlspecialchars($user['username'])  ?>
              </td>
              <td><?= htmlspecialchars($user['id']) ?></td>
        
              <td><?= htmlspecialchars($user['hasCharacter']) ?></td>
        
              <td><?= htmlspecialchars($user['role']) ?></td>
              <td>
                <a
                  title="Infos utilisateurs"
                  href="index.php?route=credentials&sessionKey=<?= htmlspecialchars($user['sessionKey']) ?>"
                  class="infoBtn">Infos
                </a>
              </td>
              <td>
                <a
                  title="Bouton update"
                  href="index.php?route=credential_update&id=<?= htmlspecialchars($user['id']) ?>&fromUpdate"
                  class="updateBtn">Modifier
                </a>
              </td>
              <td>
                <button data-id="<?= htmlspecialchars($user['id']) ?>" class="deleteBtn">Supprimer</button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot></tfoot>
        </table>
          
          <!--Pagination bas de page-->
          <div class="flex"> 
           <?php 
              for ($i=1 ; $i<=$TotalPages ; $i++)
              {
                  echo '<div class="pagination"><a title="redirection" href="index.php?route=admin_users&page='.$i.'">'.$i.'</a></div>';
              }
           ?>
          </div>
      </div>
  </div>
</div> 
