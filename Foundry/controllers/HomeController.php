<?php

namespace Controllers;

class HomeController
{
    public function home()
    {
        $view = 'front/home.php';
        include_once 'views/template.php';
    }  
     
      public function races()
    {
        $view = 'front/races.php';
        include_once 'views/template.php';
    }
    
    public function inventory()
    {
        $view = 'front/inventory.php';
        include_once 'views/template.php';
    }
    
    public function about()
    {
        $view = 'front/about.php';
        include_once 'views/template.php';
    }
    
    public function connexion()
    {
        $view = 'front/connexion.php';
        include_once 'views/template.php';
    }
    
    public function register()
    {
        $view = 'front/register.php';
        include_once 'views/template.php';
    }
    
    public function dashboard()
    {
        $view = 'dashboard/dashboard.php';
        include_once 'views/template.php'; 
     
    }
        
    public function credential_update($id)
    {
        $userModel = new \Models\User();
        $user = $userModel->getUserByID($id);
        // $user = $userModel->getUserByID($_GET['id']);
        $characterModel = new \Models\Character();
        $characters = $characterModel->getAllCharacterByID($user['id']);
        $view = 'dashboard/admin_update.php';
        include_once 'views/template.php'; 
    }
    
    public function final_stats()
    {
        $characterModel = new \Models\Character();
        $userModel = new \Models\User();
        $user = $userModel ->getUserBySessionKey($_SESSION['sessionKey']);
        $newCharacterData=[
            // $user['username'],
            $_POST['nickname'],
            $_POST['hp'],
            $_POST['strength'],
            $_POST['dexterity'],
            $_POST['intelligence'],
            $_POST['wisdom'],
            $_POST['charism'],
            $_POST['constitution'],
            $user['id'], 
            $_POST['race'],
            $_POST['classe']
            ];
            
        $characterModel->addCharacter($newCharacterData);
     
        echo json_encode($newCharacterData);
        exit();
        
    }
    
    public function final_character()
    {

        $characterModel = new \Models\Character();
        $character = $characterModel -> getCharacterByName($_GET['name']);
        $race = $characterModel -> getRaceByID($character['race_id']);
        $classe = $characterModel -> getClasseByID($character['classe_id']);
        $view = 'front/final_character.php';
        include_once 'views/template.php';  
        
    }
    
      public function updateCharacter()
    {
        $userModel = new \Models\User();
        $user = $userModel->getUserByID($_SESSION['id']);
        $characterModel = new \Models\Character();
        $character = $characterModel -> getCharacterByID($_GET['id']);
        $race = $characterModel -> getRaceByID($character['race_id']);
        $classe = $characterModel -> getClasseByID($character['classe_id']);
        $view = 'front/updateCharacter.php';
        include_once 'views/template.php'; 
    }
    
    public function deleteCharacter($id)
    {
        $characterModel = new \Models\Character();
        $characterModel ->deleteOneCharacter($id);
        $character = $characterModel -> getAllCharacter();
        header ('Location: index.php?route=credentials&sessionKey='.$_SESSION['sessionKey'] .'&fromMenu');
        exit();
    }

} 

