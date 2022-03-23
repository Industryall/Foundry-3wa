<?php

namespace Models;

abstract class Database 
{
    
    private static $_dbConnect;
    
    private static function setDb()
    {
        self::$_dbConnect = new \PDO( 'mysql:host=db.3wa.io;dbname=julienrebai_revisions;charset=utf8', 'julienrebai', '4b424bc755a84d3b026a6354f96243b1' );
        self::$_dbConnect->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
    }
    
    protected function getDb()
    {
        if( self::$_dbConnect == null )
        {
            self::setDb();
        }
        
        return self::$_dbConnect;
    }
    
    protected function getAll( string $table )
    {
        $sql = "SELECT * FROM $table";
        $query = $this->getDb()->prepare($sql);
        $query->execute();
        
        return $query->fetchAll( \PDO::FETCH_ASSOC );
    }
    
    protected function getOne( $table, $condition, $value )
    {
        $sql = "SELECT * FROM $table WHERE $condition = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute( [ $value ] );
        return $query->fetch( \PDO::FETCH_ASSOC );
    }
    
    protected function addOne( $table, $columns, $values, array $data )
    {
        $sql = "INSERT INTO $table ( $columns ) VALUES ( $values )";
        $query = $this->getDb()->prepare( $sql );
        $query->execute( $data );
    }
    
    protected function updateOne( $table, $newData, $condition, $uniq )
    {
       $sets = '';
        
        foreach( $newData as $key => $value )
        {
            $sets .= "$key = :$key,"; 
        }
     
        $sets = substr( $sets, 0, -1 );
        $sql = "UPDATE $table SET $sets WHERE $condition = :$condition";
        $query = $this->getDb()->prepare( $sql );
        
        foreach( $newData as $key => $value )
        {
            $query->bindvalue( ":$key", $value ); 
        }
        $query->bindvalue( ":$condition", $uniq ); 
        $query->execute();
    }
    
    // table -> users / condition -> colonne(ex:id)string / value -> variable de la colonne
    protected function deleteOne( $table, $condition, $value )
    {
        $sql = "DELETE FROM $table WHERE $condition = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute( [ $value ] );
        return $query->fetch( \PDO::FETCH_ASSOC ); 
    } 
    
    protected function updateOneKey ($table, $set, $value, $condition, $id)
    {
     $sql = "UPDATE " . $table . " SET " . $set . " = '$value' WHERE " . $condition . " = " . $id;
     $query = $this->getDb()->prepare( $sql );
     $query->execute();
    }
    
   protected function getCount ()
   {
    $sql = 'SELECT COUNT(*) AS total FROM `users`;';
    $query = $this->getDb()->prepare( $sql );
    $query->execute();
    
    $result = $query->fetch( \PDO::FETCH_ASSOC );
    return $total = (int) $result['total'];
   } 
   protected function getAllLimit( string $table, $start )
    {
        $sql = "SELECT * FROM $table LIMIT 5 OFFSET $start";
        $query = $this->getDb()->prepare($sql);
        $query->execute();
        
        return $query->fetchAll( \PDO::FETCH_ASSOC );
    }
    
    protected function getAllCharacters (string $table, $condition, $value)
    {
        $sql = "SELECT * FROM $table WHERE $condition = ?";
        $query = $this->getDb()->prepare($sql);
        $query->execute([$value]);
        return $query->fetchAll( \PDO::FETCH_ASSOC );
    }

} 
