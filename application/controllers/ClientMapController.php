<?php

class ClientMapController Extends Zend_Controller_Action
{
     public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $citiesCoordinates = new Application_Model_DbTable_CitiesCoordinates();
        $this->view->allClientsCoordinates = $citiesCoordinates->fetchAll("type=0", "city_name ASC");
    }
}

