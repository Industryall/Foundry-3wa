<?php

namespace Controllers;

class AdminController
{
    public function admin_users()
    {
        $userModel = new \Models\User();
        $userTemps = $userModel->getAllUsers();
        
        foreach ($userTemps as $userTemp)
        {
            $characterModel = new \Models\Character();
            $characters = $characterModel -> getAllCharacterByID($userTemp['id']);
            
            $data = count($characters);
            $userModel-> updateUser(['hasCharacter' => $data],$userTemp['id']);
        };
        
        
        $total= $userModel->getCountUser();
        
        $userPerPage = 5;
        $TotalPages = ceil($total/$userPerPage);
        
        if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ) 
        {
            $_GET['page'] = intval($_GET['page']);
            $currentPage = $_GET['page'];
            
            if ($_GET['page']===1)
            {
                $start=0;
                $users=$userModel->getUserLimit($start);
            }
           
            elseif ($_GET['page']>1)
            {
                $start= ($currentPage-1)*$userPerPage;
                $users=$userModel->getUserLimit($start);
            }
        }
        else 
        {
            $currentPage = 1;
        }
        $view = 'dashboard/admin_users.php';
        include_once 'views/template.php'; 
        
    }
    
    public function admin_delete($id)
    {
        $userModel = new \Models\User();
        $userModel->deleteOneUser($id);
        $users = $userModel->getAllUsers();
        header ('Location: index.php?route=admin_users&page=1');
        exit();
    }
    
    public function credentials($sessionKey) //id
    {
        $userModel = new \Models\User();
        $user = $userModel->getUserBySessionKey($sessionKey);
        $characterModel = new \Models\Character();
        $characters = $characterModel -> getAllCharacterByID($user['id']);
        $data = count($characters);
        $userModel-> updateUser(['hasCharacter' => $data],$user['id']);
        $view = 'dashboard/credentials.php';
        include_once 'views/template.php'; 
    }
    
}
     
