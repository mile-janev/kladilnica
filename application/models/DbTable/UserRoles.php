<?php

class Application_Model_DbTable_UserRoles extends Zend_Db_Table_Abstract
{

    protected $_name = 'user_roles';
    
    const FREE_USER = "free";
    const PRO_USER = "professional";
    const MANAGER_USER = "manager";
    const ADMIN_USER = "administrator";

    public function get_user_role_by_id($id=0)
    {
        $select = $this->_db->select();
        $select->from($this->_name);
        $select->where('user_id = ?', $id);
        $user_roles = $select->query()->fetchAll();
        $user_role = $user_roles[0]['role'];
        
        return $user_role;
    }
    
    public function get_user_role_by_username($username="")
    {
        $user = new Application_Model_DbTable_Users();
        $user_id = $user->get_id_by_username($username);
        
        $user_role = $this->get_user_role_by_id($user_id);
        
        return $user_role;
    }
    
}

