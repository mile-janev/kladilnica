<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Form_LoginForm extends Zend_Form
{
    public function init()
    {
        $username = $this
                ->createElement("text", "username")
                ->setLabel("Username: *")
                ->setRequired(TRUE);
        
        $password = $this
                ->createElement("password", "password")
                ->setLabel("Password: *")
                ->setRequired(TRUE);
        
        $loginButton = $this
                ->createElement("submit", "login")
                ->setLabel("Login")
                ->setIgnore(TRUE);
        
        $this->addElements(array(
            $username,
            $password,
            $loginButton
        ));
    }
}