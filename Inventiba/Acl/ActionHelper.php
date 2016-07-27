<?php

/** Zend_Controller_Action_Helper_Abstract */
require_once 'Zend/Controller/Action/Helper/Abstract.php';

class Inventiba_Acl_ActionHelper extends Zend_Controller_Action_Helper_Abstract {

   protected $_action;

   /**
    * Enter description here...
    *
    * @var Zend_Auth
    */
   protected $_root;
   protected $_controller;
   protected $_module;
   protected $auth;
   protected $_view;

   public function __construct($root) {
      $this->auth = Zend_Auth::getInstance();
      $this->_root = $root;
   }

   /**
    * Hook into action controller initialization
    * @return void
    */
   public function init() {
      $this->_action = $this->getActionController();
      $this->_controller = $this->_action->getRequest()
              ->getControllerName();
      $this->_module = $this->_action->getRequest()
              ->getModuleName();
      $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
      $testimonials = Tables_Testimonials::getInstance()->getAll();
      $this->view = $viewRenderer->view;
      $info_page = Tables_Fields::getInstance()->findPage(1);
      $this->view->info_page = $info_page;
      $this->view->testimonials = $testimonials;
      $this->view->isLogged = $this->auth->hasIdentity();
   }

   public function preDispatch() {
      $request = $this->_action->getRequest();
      $controller = $request->getControllerName();
      $action = $request->getActionName();
      $module = $request->getModuleName();
      $helper = $this->_action->getHelper("Redirector");
      $config = Zend_Registry::get('Config');

      $view = $this->view;

      $view->action = $action;
      $view->module = $module;
      $view->controller = $controller;
      $version = $config->restoreserv->version;
      if ($config->restoreserv->debug) {
         $view->version = $version;
      } else {
         $view->version = time();
      }
      if ($module == "admin" || $module == "client") {
         Zend_Layout::startMvc(array('layoutPath' => $this->_root . '/application/views/scripts', 'layout' => 'admin-layout'));
      } elseif ($module == "othermodule") {
         Zend_Layout::startMvc(array('layoutPath' => $this->_root . '/application/views/scripts', 'layout' => 'othermodule-layout'));
      }
      if ($view->isLogged) {
         $type_user = $this->getLogin();
         switch ($type_user) {
            case 1:
               if ($module == "client" || $controller == "login") {
                  $helper->direct("index", "index", "admin");
               }
               break;
            case 2:
               if ($module == "admin" || $controller == "login") {
                  $helper->direct("index", "index", "client");
               }
               break;
         }
      } else {

         if ($module == "admin" || $module == "client") {
            $helper->direct("index", "index", "login");
         }
      }
   }

   public function getLogin() {
      $auth = Zend_Auth::getInstance();
      $identy = $auth->getIdentity();
      if ($identy) {
         $user = Tables_Users::getInstance()->findByUsername($identy);
         return $user->type_user;
      }
   }

}
