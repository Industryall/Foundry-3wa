<?php

namespace Models;

class User extends Database
{
    public function getUserByMail (string $email)
    {
       return $this->getOne('users', 'email' , $email);
    }
    
    public function getUserByUsername (string $username)
    {
       return $this->getOne('users', 'username' , $username);
    }
    
    public function getUserByID (int $id)
    {
       return $this->getOne('users', 'id' , $id);
    }
    
    /* pas de return sur Add et Update */
    public function addUser (mixed $data)
    {
        /* $table, $columns, $values, array $data  -> pour le paramètre, lié à Database */
        $this->addOne('users', 'username , password , email , role, hasCharacter', '?,?,?,?,?' , $data );
    }
    
    public function getAllUsers()
    {
        return $this->getAll('users');
    }
    
    public function deleteOneUser(int $id)
    {
        return $this->deleteOne('users','id', $id);
    }
    
    public function updateUser($data, int $id)
    {
        return $this->updateOne('users', $data, 'id', $id);
    }
    
    public function updateOneSession($data, int $id)
    {
        $this->updateOneKey('users', 'sessionKey' , $data, 'id', $id);
    }
    
    public function getUserBySessionKey(mixed $session)
    {
        return $this-> getOne('users', 'sessionKey', $session);
    }
    public function getCountUser()
    { 
       return $this-> getCount();
    }
   
    public function getUserLimit(int $start)
    {
       return $this->getAllLimit('users', $start);
    }
   
}  
 


