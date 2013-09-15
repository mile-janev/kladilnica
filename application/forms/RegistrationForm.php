<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Form_RegistrationForm extends Zend_Form
{
    public function init()
    {
        $name = $this
                ->createElement("text", "name")
                ->setLabel("Name: *")
                ->setRequired(TRUE);
        
        $username = $this
                ->createElement("text", "username")
                ->setLabel("Username: *")
                ->setRequired(TRUE);
        
        $password = $this
                ->createElement("password", "password")
                ->setLabel("Password: *")
                ->setRequired(TRUE);
        
        $confirmPassword = $this
                ->createElement("password", "confirmPassword")
                ->setLabel("Confirm Password: *")
                ->setRequired(TRUE);
        
        $registerButton = $this
                ->createElement("submit", "register")
                ->setLabel("Register")
                ->setIgnore(TRUE);
        
        $this->addElements(array(
            $name,
            $username,
            $password,
            $confirmPassword,
            $registerButton
        ));
    }
}