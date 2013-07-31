<?php
class SimpleCMS_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{
  public function preDispatch(Zend_Controller_Request_Abstract $request)
  {
    $acl = new Zend_Acl;
    // dodajemy role
    $acl->addRole(new Zend_Acl_Role('guest'));
    $acl->addRole(new Zend_Acl_Role('admin'));
    // dodajemy zasoby
    $acl->add(new Zend_Acl_Resource('index'));
    $acl->add(new Zend_Acl_Resource('contact-map'));
    $acl->add(new Zend_Acl_Resource('faq'));
    $acl->add(new Zend_Acl_Resource('error'));
    $acl->add(new Zend_Acl_Resource('login'));
    $acl->add(new Zend_Acl_Resource('managefaq'));
    $acl->add(new Zend_Acl_Resource('admin'));

    // przydzielamy prawa 
    $acl->allow('guest', 'index', null);
    $acl->allow('guest', 'contact-map', null);
    $acl->allow('guest', 'faq', null);
    $acl->allow('guest', 'login', null);
    $acl->allow('admin', null); // admin ma nieograniczone uprawnienia
    // rozpoczynamy sprawdzanie uprawnieñ
    $auth = Zend_Auth::getInstance();
    if ($auth->hasIdentity()) {
      $identity = $auth->getIdentity();
      $role = $identity->role;
    } else {
      $role = 'guest';
    }
    $controller = $request->controller;
    $action = $request->action;
    if (!$acl->isAllowed($role, $controller, $action)) {
      if ($role == 'guest') {
          $r = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
          $r->gotoUrl('/index')->redirectAndExit();
      } else {
        $request->setControllerName('error');
        $request->setActionName('brak-dostepu');
      }
    }
  }
}
