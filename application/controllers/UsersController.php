<?php

class UsersController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();
        
        if(!$data)
        {
            $this->_redirect("users/login");
        }
        $this->view->username = $data->username;
    }

    public function loginAction()
    {
        $users = new Application_Model_DbTable_Users();
        $form = new Application_Form_LoginForm();
        $this->view->form = $form;
        
        if($this->getRequest()->isPost())
        {
            if($form->isValid($_POST)){
                $data = $form->getValues();
                $username = $data['username'];
                $password = $data['password'];
                $encryptedPassword = $users->passwordHash($password);
                
                $auth = Zend_Auth::getInstance();
                $authAdapter = new Zend_Auth_Adapter_DbTable($users->getAdapter(),'users');
                $authAdapter->setIdentityColumn('username')
                            ->setCredentialColumn('password');
                $authAdapter->setIdentity($username)
                            ->setCredential($encryptedPassword);
                $result = $auth->authenticate($authAdapter);
                if($result->isValid()){
                    $storage = new Zend_Auth_Storage_Session();
                    $storage->write($authAdapter->getResultRowObject());
                    $this->_redirect('users/index');
                } else {
                    $this->view->errorMessage = "Invalid username or password. Please try again.";
                }         
            }
        }
        
    }
    
    public function registerAction()
    {
        $users = new Application_Model_DbTable_Users();
        $form = new Application_Form_RegistrationForm();
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            if($form->isValid($_POST)){
                $data = $form->getValues();
                if(!$users->usernameUnique($data['username'])){
                    $this->view->errorMessage = "Name already taken. Please choose another one.";
                    return;
                }
                if($data['password'] != $data['confirmPassword']){
                    $this->view->errorMessage = "Password and confirm password don't match.";
                    return;
                }
                if(!$users->passwordLength($data['password'])){
                    $this->view->errorMessage = "Password must be at least 6 characters.";
                    return;
                }
                unset($data['confirmPassword']);
                $data['password'] = $users->passwordHash($data['password']);
                $users->saveUser($data);
                $this->_redirect('users/login');
            }
        }
    }
    
    public function logoutAction()
    {
        $storage = new Zend_Auth_Storage_Session();
        $storage->clear();
        $this->_redirect('users/login');
    }
    
    public function testAction()
    {
        $user_roles = new Application_Model_DbTable_Users();
        $id=9;
        
        $test = $user_roles->deleteUser($id);
        var_dump($test); exit();
    }

}

