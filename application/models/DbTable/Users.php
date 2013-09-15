<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    
    //Da se napisat metodite. Iminjata kazuvat so treba da sodrze sekoja od niv
    
    public function get_id_by_username($username)
    {
        $select = $this->_db->select();
        $select->from($this->_name);
        $select->where('username = ?', $username);
        $user = $select->query()->fetchAll();
        $id = $user[0]['id'];
        
        return $id;
    }
    
    public function get_username_by_id($id)
    {
        $user = $this->find($id);
        $username = $user[0]->username;
        
        return $username;
    }
    
    public function get_name_by_id($id)
    {
        $user = $this->find($id);
        $username = $user[0]->name;
        
        return $username;
    }
    
    //Hashing passwords function
    public static function passwordHash($password)
    {
        $newPassword = hash("sha256", $password);
        
        return $newPassword;
    }

    //If username is unique, return TRUE
    public function usernameUnique($username)
    {
        $bool = true;
        
        $select = $this->_db->select();
        $select->from($this->_name);
        $select->where('username = ?', $username);
        $hasUser = $select->query()->fetchAll();
        if($hasUser)
        {
            $bool = FALSE;
        }
        
        return $bool;
    }
    
    //If password length is at least 6 characters return TRUE
    public function passwordLength($password)
    {
        $bool = true;
        
        if(strlen($password) < 6)
        {
            $bool = FALSE;
        }
        
        return $bool;
    }
    
    public function saveUser($data)
    {
        $userRole = new Application_Model_DbTable_UserRoles();
        $role = Application_Model_DbTable_UserRoles::FREE_USER;
        
        $this->insert($data);
        $user_id = $this->get_id_by_username($data['username']);
        $user_role_data = array(
            "user_id" => $user_id,
            "role" => $role,
        );
        
        $userRole->insert($user_role_data);
    }
    
    public function deleteUser($id)
    {
        $row = $this->find($id)->current();
        $row->delete();
    }
    
}

