<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    
    //Da se napisat metodite. Iminjata kazuvat so treba da sodrze sekoja od niv
    public function get_username_by_id($id)
    {
        
        return $username;
    }
    
    public function get_id_by_username($username)
    {
        
        return $id;
    }
}

