<?php 
$session = new \Controllers\SessionController();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Foundry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./public/assets/css/style.css" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <!--Police-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&display=swap"
      rel="stylesheet"
    />
  </head>

<body>
    
    <header>
        <?php if(isset($_SESSION['role']) && $_SESSION['role']==='admin') : ?>
            <span class="yellow">admin</span>
        <?php elseif(isset($_SESSION['role']) && $_SESSION['role']==='user') : ?>
            <span class="green">connecté</span>
        <?php elseif(!isset($_SESSION['role']))  :?>
            <span class="red">déconnecté</span>
        <?php endif; ?>
        
        <a title="menu div" href="#menu" class="welcome"> <i class="fas fa-bars"></i> </a>
    </header> 
    
    <main> 
        <?php include_once $view; ?>
    </main>
    
    <footer>
        
    </footer>
    
    <div class="popover" id="menu">
      <div class="content flex">
        <a href="#" title="fermeture de la modale" class="close"></a>
        <div class="nav">
          <ul class="nav_list">
            
              <li class="nav_list_item"><a title="Accueil" href="index.php?route=home">Accueil</a></li>
            
    
            <?php if(isset($_SESSION['username'])) : ?>
            
              <li class="nav_list_item"><a title="Création" href="index.php?route=races">Création du personnage</a></li>
            
            <?php endif; ?>
    
            
              <li class="nav_list_item"><a title="About" href="index.php?route=about">A propos</a></li>
            
    
            <?php if(!isset($_SESSION['username'])) : ?>
            
              <li class="nav_list_item"><a title="Login" href="index.php?route=connexion">Connexion</a></li>
            
            <?php endif; ?>
    
            <?php if(isset($_SESSION['username'])) : ?>
            
              <li class="nav_list_item">
                <a
                  title="Account"
                  href="index.php?route=credentials&sessionKey=<?= $_SESSION['sessionKey'] ?>&fromMenu"
                  >Mon compte</a
                >
              </li>
           
           
              <li class="nav_list_item"><a title="Logout" href="index.php?route=logout">Deconnexion</a></li>
            
            <?php endif; ?>
    
            <?php if($session->isAdmin()) : ?>
            
              <li class="nav_list_item"> <a title="Admin" href="index.php?route=dashboard">Page Administrateur</a></li>
            
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    
    <script src="./public/assets/js/jquery360.js"></script>
    <script src="./public/assets/js/main.js"></script>
</body>
</html>