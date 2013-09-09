<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $bla = new Application_Model_DbTable_Users();
        $test = $bla->fetchAll();
        $da = new App_UserRole();
//        var_dump(Application_Model_DbTable_Users::bre);
//        var_dump(App_UserRole::DEMO_USER);
//        exit();
        $this->view->poraka = "Здраво Slave";
//        $this->view->odBaza = $test[1]->username;
    }


}

