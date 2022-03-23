<?php

namespace Models;

class Character extends Database
{
    public function getAllCharacter()
    {
        return $this->getAll('characters');
    }
    
    public function getCharacterByID (int $id)
    {
       return $this->getOne('characters', 'id' , $id);
    }
    
    public function addCharacter (mixed $data)
    {
        $this->addOne('characters', 'name , hp , strength , dexterity, intelligence, wisdom, charism, constitution, user_id, race_id, classe_id ',  '?,?,?,?,?,?,?,?,?,?,?' , $data );
    }
    
    public function deleteOneCharacter(int $id)
    {
        return $this->deleteOne('characters','id', $id);
    }

    public function getCharacterByName (string $value)
    {
       return $this->getOne('characters', 'name' , $value);
    }
    
    public function getRaceByID (string $value)
    {
       return $this->getOne('races', 'id' , $value);
    }
      public function getClasseByID (string $value)
    {
       return $this->getOne('classes', 'id' , $value);
    }
    
    public function getAllCharacterByID (string $value)
    {
        return $this-> getAllCharacters('characters','user_id', $value);
    }
}