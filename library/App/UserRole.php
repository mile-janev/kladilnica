<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class for defining users roles
 *
 * @author mile
 */
class App_UserRole {
    
    const DEMO_USER = "demo";
    const REAL_USER = "real";
    const MANAGER_USER = "manager";
    const ADMINISTRATOR_USER = "administrator";
    
    //Da se napisat funkciite. Iminjata  kazuvat so treba da sodrze sekoja od niv
    public function get_user_role_by_id($id=0)
    {
        
    }
    
    public function get_user_role_by_username($username="")
    {
        
    }
    
    //Prima niza od ulogi i user id i proveruva dali userot ima nekoa od tie ulogi
    public function user_roles($id, $array)
    {
        $is_role = FALSE;//Ako pripagja na nekoja uloga od array da se stave TRUE
        
        return $is_role;
    }
}
