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
//        var_dump(Application_Model_DbTable_Users::bre);
//        var_dump($test[0]->ofaman);
//        exit();
        $this->view->poraka = "Здраво Slave";
        $this->view->odBaza = $test[0]->username;
    }


}

