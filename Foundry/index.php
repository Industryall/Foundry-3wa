<?php

// Inclue automatiquement le fichier de class dès qu'on instancie une class
spl_autoload_register(function ($class){
    require_once lcfirst(str_replace('\\', '/', $class)) . '.php';
});

session_start();

// Router avec switch

if( array_key_exists( 'route', $_GET ) ) // $_GET['route']
    switch( $_GET['route'] ) // On vérifie la valeur de $_GET['route']
    {
        case 'home':
            
            $controller = new \Controllers\HomeController();
            $controller->home();
            
            break;
            
        case 'races':
            
            if(isset($_SESSION['role']))
            {
            $controller = new \Controllers\HomeController();
            $controller->races();
            }
            else 
            {
            $controller = new \Controllers\HomeController();
            $controller->connexion();
            }
         
            break;    
            
    
         case 'about':
            
            $controller = new \Controllers\HomeController();
            $controller->about();
            
            break;
    
    
         case 'connexion':
            
            $controller = new \Controllers\HomeController();
            $controller->connexion();
            
            break;
            
        case 'register':
            
            $controller = new \Controllers\HomeController();
            $controller->register();
            
            break;
            
        case 'logUser':
            
            $controller = new \Controllers\SessionController();
            $controller->login($_POST);
            
            break;
            
        case 'registerUser':
            
            $controller = new \Controllers\SessionController();
            $controller->registerUser($_POST);
            
            break;
            
         case 'logout':
            if(isset($_SESSION['role']))
            {
                $controller = new \Controllers\SessionController();
                $controller->logout();
            }
            else
            {
                $controller = new \Controllers\SessionController();
                $controller->connexion();  // To check -> probleme quand session expirée et que logout
            }
            
            break;
            
        case 'dashboard': 
            /* Si on est connecté et qu'on a le rôle admin, on accède a la page, sinon */
            if(isset($_SESSION['role']) && $_SESSION['role']==='admin')
            {
                $controller = new \Controllers\HomeController();
                $controller->dashboard();
            } 
            else 
            {
                $controller = new \Controllers\HomeController();
                $controller->home();
            }
            
            break;
             
             
        case 'admin_users':
            
            if(isset($_SESSION['role']) && $_SESSION['role']==='admin')
            {
                $controller = new \Controllers\AdminController();
                $controller->admin_users();
            }
            else 
            {
                $controller = new \Controllers\HomeController();
                $controller->home();
            }
            
            break;
            
        case 'delete_user':
            
            if(isset($_SESSION['role']) && $_SESSION['role']==='admin')
            {
                $controller = new \Controllers\AdminController();
                $controller->admin_delete( $_GET['id'] );
            }
            else 
            {
                $controller = new \Controllers\HomeController();
                $controller->home();
            }
            
            break;
        
        case 'deleteCharacter':
            if(isset($_SESSION['role']))
            {
                $controller = new \Controllers\HomeController();
                $controller ->deleteCharacter($_GET['id']); 
            }
            else 
            {
                $controller = new \Controllers\HomeController();
                $controller->home();
            }
            break;
            
        case 'credentials':
            
            if(isset($_SESSION['role']))
            {
                $controller = new \Controllers\AdminController();
                $controller->credentials( $_GET['sessionKey'] );
            }
            else 
            {
                $controller = new \Controllers\HomeController();
                $controller->connexion();
            }
            
            break;
            
          case 'credential_update':
            
                $controller = new \Controllers\HomeController();
                $controller->credential_update( $_GET['id'] );
         
            break;   
            
         case 'updateUser':
            
                $controller = new \Controllers\SessionController();
                $controller->updateUser( $_POST );
         
            break;
   
        case 'final_stats':
                $controller = new \Controllers\HomeController();
                $controller->final_stats();
                
            break;
            
        case 'final_character':
                $controller = new \Controllers\HomeController();
                $controller->final_character();
            
            break;
        
          case 'updateCharacter':
              if(isset($_SESSION['role']))
            {
                $controller = new \Controllers\HomeController();
                $controller->updateCharacter();
            }
            else 
            {
                $controller = new \Controllers\HomeController();
                $controller->home();
            }
            
            break;
            
        default:
            
            header ('Location: index.php?route=home#menu');
            
            break;
    }

else
{
    header( 'Location: index.php?route=home' );
    exit;
}