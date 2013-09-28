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
    }

    public function fuelSuppliersMapAction(){
        $citiesCoordinates = new Application_Model_DbTable_CitiesCoordinates();
        $this->view->allClientsCoordinates = $citiesCoordinates->fetchAll("type=1", "city_name ASC");
    }


}

