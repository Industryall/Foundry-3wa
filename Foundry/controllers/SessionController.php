<?php

namespace Controllers;
class SessionController
{
    public function login ($data)
    {  
        try 
        {
                
            if( isset($data['username']) && !empty($data['username'] ) &&
                isset($data['password']) && !empty($data['password'] ) )
            {
                $userModel = new \Models\User();
                $userRole = new \controllers\SessionController();
                
                $user = $userModel->getUserByUsername( $data['username'] );
                if($user)
                {
                    if( password_verify( $data['password'], $user['password'] ) )
                    { 
                        $newID = session_create_id('id-session-');
                        session_commit();
                        session_id($newID);
                        session_start();
                        $_SESSION['sessionKey'] = $newID;
                        $userModel -> updateOneSession($_SESSION['sessionKey'],$user['id']);
                        
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['role'] = $user['role'];
                         header('Location: index.php?route=home#menu');
                         exit();
                    }
                    else
                    {
                        throw new \Exception ( "Nom d'utilisateur ou mot de passe incorrect") ;   
                    }
                }
                else
                {
                    throw new \Exception ( "Utilisateur non trouvé" );    
                }
               
            }
            
            else
            {
                throw new \Exception ( 'Veuillez remplir les deux champs'); 
            }
        }
    
        catch ( \Exception $heyho )
        {
            header('Location: index.php?route=connexion&error=' . $heyho->getMessage());
            exit();
        }
         
    }
    
    public function isAdmin()
    {
        if(isset($_SESSION['username']) && !empty($_SESSION['username']))
        {
            $userModel = new \Models\User();
            $user = $userModel->getUserByUsername($_SESSION['username']);
            
            if($user['role']==='admin')
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function isLogged()
    {
        return isset($_SESSION['username']) ? true : false ;
   
    }
    
    public function registerUser ($data)
    {
        try
        {
            if( isset($data['username']) && !empty($data['username'] ) &&
                isset($data['password']) && !empty($data['password'] ) &&
                isset($data['email']) && !empty($data['email'] ) &&
                isset($data['passwordConfirmed']) && !empty($data['passwordConfirmed'] ) )
            {
                $userModel = new \Models\User();
                
                /* verif username unique  d'apres le model*/
                if ( $userModel->getUserByUsername($data['username']) !==false )
                {
                    throw new \Exception ('Nom d\'utilisateur déjà utilisé');
                }
                
                /* verif email unique */
                 if ( $userModel->getUserByMail($data['email']) !==false )
                {
                    throw new \Exception ('Email déjà enregistré');
                }
                
                /*Verif Password */
                if ( $data['password'] !== $data['passwordConfirmed']  )
                {
                    throw new \Exception ("Les mots de passes ne sont pas identiques");
                }
                
                $newUser=[
                    $data['username'],
                    password_hash ( $data['password'], PASSWORD_BCRYPT ),
                    $data['email'],
                    'user',
                    0
                    ];
                    
                /*instancie un nouvel utilisateur avec les données du tableau ci-dessus, dans l'ordre */    
                $userModel->addUser($newUser);
                
                $log = [
                    'username' => $data['username'],
                    'password' => $data['password']
                    ];
                 
                $this->login($log); 
                header('Location: index.php?route=home#menu');
                exit();
            }
            else 
            {
                throw new \Exception ( "Veuillez remplir tous les champs") ;  
            }
        }
        
        catch( \Exception $e)
        {
            header('Location: index.php?route=register&error=' . $e->getMessage());
            exit();
        }
    }
    
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?route=home#menu');
        exit();
    }
    
    public function updateUser($data)
    {
        try
        {
            if (isset ($data['id']) && !empty($data['id']) &&
                isset ($data['username']) && !empty($data['username']) &&
                isset ($data['email']) && !empty($data['email']) &&
                isset ($data['role']) && !empty($data['role']) &&
                (empty ($data['password']) ||
                empty ($data['newPassword']) ||
                empty($data['passwordConfirmed']) ) )
            { 
                $newUser = new \Models\User();
                $user = $newUser->getUserByID($data['id']);
                
                $newUserData =[
                    'id'=>$data['id'],
                    'username' =>$data['username'],
                    'email' =>$data['email'],
                    'sessionKey' =>$data['sessionKey'],
                    'role' =>$data['role']
                    ];
                 
                $newUser ->updateUser($newUserData, $data['id']);  
                
                //Si quelqu'un update son propre rôle -> le change automatiquement sans deco/reco
                if ($_SESSION['id'] === $user['id'])
                {
                    $_SESSION['role'] = $data['role'];
                }
                 
                $success = "Votre compte à bien été modifié";
                header ('Location: index.php?route=credentials&id='.$data['id'].'&sessionKey='.$data['sessionKey'].'&success=' .$success);
                exit();
               
            }
            elseif (isset ($data['id']) && !empty($data['id']) &&
                    isset ($data['email']) && !empty($data['email']) &&
                    isset ($data['role']) && !empty($data['role']) &&
                    isset ($data['password']) && !empty ($data['password']) &&
                    isset ($data['newPassword']) && !empty ($data['newPassword']) &&
                    isset ($data['passwordConfirmed']) && !empty ($data['passwordConfirmed']) ) 
            {
                    $newUser = new \Models\User();
                    $user = $newUser->getUserByID($data['id']);
                     
            if( password_verify( $data['password'], $user['password'] ) )
            {
                    
                if($data['newPassword'] === $data['passwordConfirmed'])
                { 
                    $newUserData = [
                    'username' =>$data['username'],
                    'id'=>$data['id'],
                    'email'=>$data['email'],
                    'role'=>$data['role'],
                    'password'=>password_hash( $data['newPassword'], PASSWORD_BCRYPT )
                    ];
                        
                    $newUser->updateUser( $newUserData, $data['id'] );
                    $newConnexion = new \controllers\SessionController();
                    $newConnexion->login($user['username'], $user["password"]);
                        
                    $success = "Votre compte à bien été modifié !";
                    header ('Location: index.php?route=credentials&id='.$data['id'].'&sessionKey='.$data['sessionKey'].'&success=' .$success);
                    exit();
                }
                else 
                {
                    throw new \Exception('Les mots de passe ne correspondent pas');
                }
            }
            else 
            {
             throw new \Exception( 'Mauvais mot de passe' );
            }
            }
                
            else
            {
                throw new \Exception( 'Tous les champs doivent être remplis' );
            }
    }
    catch (\Exception $enfin)
    {
         header( "Location: index.php?route=credentials&id=" .$data['id'].'&sessionKey='.$data['sessionKey'] ."&error=" . $enfin->getMessage());
         exit();
    }
}
}