<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->poraka = "Здраво Slave";
    }

    public function testAction()
    {
        
        $bla = new Application_Model_DbTable_Users();
        $test = $bla->fetchAll();
        $da = new App_UserRole();
//        var_dump(Application_Model_DbTable_Users::bre);
//        var_dump(Application_Model_DbTable_Users::FREE_USER);
//        var_dump("da"); exit();
//        exit();
        
    }

}

