<?php

/**
 * My new Zend Framework project
 * 
 * @author  
 * @version 
 */
require_once 'Zend/Controller/Plugin/Abstract.php';
require_once 'Zend/Controller/Front.php';
require_once 'Zend/Controller/Request/Abstract.php';
require_once 'Zend/Controller/Action/HelperBroker.php';
require_once "Zend/Loader.php";
//require_once "../library/recaptchalib.php";

/**
 * Initializes configuration depndeing on the type of environment 
 * (test, development, production, etc.)
 *  
 * This can be used to configure environment variables, databases, 
 * layouts, routers, helpers and more
 *   
 */
class Initializer extends Zend_Controller_Plugin_Abstract {

   /**
    * @var Zend_Config
    */
   protected static $_config;

   /**
    * @var string Current environment
    */
   protected $_env;

   /**
    * @var Zend_Controller_Front
    */
   protected $_front;

   /**
    * @var string Path to application root
    */
   protected $_root;

   /**
    * @var Zend_Log
    */
   protected $_log;

   /**
    * Constructor
    *
    * Initialize environment, root path, and configuration.
    * 
    * @param  string $env 
    * @param  string|null $root 
    * @return void
    */
   public function __construct($env, $root = null) {
      // setup autoloader
      require_once "Zend/Loader/Autoloader.php";
      $autoloader = Zend_Loader_Autoloader::getInstance();
      $autoloader->setFallbackAutoloader(true);
      $autoloader->suppressNotFoundWarnings(true);


      // root folder
      if (null === $root)
         $root = realpath(dirname(__FILE__)) . "/../..";
		
      $this->_root = $root;

      Zend_Registry::set("Root", $root);
      defined('ROOT') or define('ROOT', $root);
      // load environment
      $this->_setEnv($env);
      $this->initPhpConfig($env);

      // front controller
      $this->_front = Zend_Controller_Front::getInstance();

      // init routines        
      $this->initView();
      $this->initDb();
      $this->initAuth();
      $this->initHelpers();
//        $this->initPlugins();
      $this->initControllers();
      $this->initMail();
   }

   /**
    * Initialize environment
    * 
    * @param  string $env 
    * @return void
    */
   protected function _setEnv($env) {
      $this->_env = $env;
      date_default_timezone_set('America/New_York');
   }

   /**
    * Initialize Data bases
    * 
    * @return void
    */
   public function initPhpConfig($env) {
      Initializer::$_config = new Zend_Config_Ini($this->_root . '/application/configs/application.ini', $env);
   }

   /**
    * Route startup
    * 
    * @return void
    */
   public function routeStartup(Zend_Controller_Request_Abstract $request) {
      $router = $this->_front->getRouter();

      //front
      $licence_error = new Zend_Session_Namespace('licence_error');

      if (!$licence_error->active === NULL) {
         throw new Exception('Licence Error', 404);
      }
      $router->addRoute(
              'damage', new Zend_Controller_Router_Route('/damage', array('module' => 'public',
          'controller' => 'damage',
          'action' => 'index')));

      $router->addRoute(
              'firesmoke', new Zend_Controller_Router_Route('/firesmoke', array('module' => 'public',
          'controller' => 'firesmoke',
          'action' => 'index')));
      
           $router->addRoute(
              'roofing', new Zend_Controller_Router_Route('/roofing', array('module' => 'public',
          'controller' => 'roofing',
          'action' => 'index')));

      $router->addRoute(
              'remedation', new Zend_Controller_Router_Route('/remedation', array('module' => 'public',
          'controller' => 'remedation',
          'action' => 'index')));

      $router->addRoute(
              'news', new Zend_Controller_Router_Route('/news', array('module' => 'public',
          'controller' => 'news',
          'action' => 'index')));

      $router->addRoute(
              'news/new', new Zend_Controller_Router_Route('/news/new/:id', array('module' => 'public',
          'controller' => 'news',
          'action' => 'new')));


      $router->addRoute(
              'about', new Zend_Controller_Router_Route('/about', array('module' => 'public',
          'controller' => 'about',
          'action' => 'index')));

      $router->addRoute(
              'termsconditions', new Zend_Controller_Router_Route('/termsconditions', array('module' => 'public',
          'controller' => 'termsconditions',
          'action' => 'index')));

      $router->addRoute(
              'testimonials', new Zend_Controller_Router_Route('/testimonials', array('module' => 'public',
          'controller' => 'testimonials',
          'action' => 'index')));

      $router->addRoute(
              'contract', new Zend_Controller_Router_Route('/contract/:token', array('module' => 'public',
          'controller' => 'index',
          'action' => 'contract')));


      $router->addRoute(
              'becomeaffieliate', new Zend_Controller_Router_Route('/becomeaffieliate', array('module' => 'public',
          'controller' => 'becomeaffieliate',
          'action' => 'index')));

      $router->addRoute(
              'admin', new Zend_Controller_Router_Route('/admin', array('module' => 'admin',
          'controller' => 'index',
          'action' => 'index')));

      $router->addRoute(
              'admin-users', new Zend_Controller_Router_Route('something/somethingelse/:page', array('module' => 'public',
          'controller' => 'controllername',
          'action' => 'actionname',
          'page' => 1)));

      $router->addRoute('admin/users/page', new Zend_Controller_Router_Route('admin/users/page/:page', array('controller' => 'users',
          'action' => 'index',
          'module' => 'admin')));

      $router->addRoute('admin/orders/id_vendor', new Zend_Controller_Router_Route('admin/orders/:id_vendor', array('module' => 'admin',
          'controller' => 'orders',
          'action' => 'index')));
   }

   /**
    * Initialize data bases
    * 
    * @return void
    */
   public function initDb() {
      $config = Initializer::$_config;
      $dbAdapter = Zend_Db::factory($config->database);
      $dbAdapter->setFetchMode(Zend_Db::FETCH_OBJ);
      Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
      $registry = Zend_Registry::getInstance();
      $registry->configuration = $config;
      Zend_Registry::set('Config', $config);
      $registry->dbAdapter = $dbAdapter;
      Zend_Registry::set('dbAdapter', $dbAdapter);
   }

   /**
    * Initialize action helpers
    * 
    * @return void
    */
   public function initHelpers() {
      $aclHelper = new Inventiba_Acl_ActionHelper($this->_root);
      Zend_Controller_Action_HelperBroker::addHelper($aclHelper);

      $prefix = 'Inventiba_Helper';
      $dir = $this->_root . '/application/views/helpers';
      $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
      $viewRenderer->init();
      $view = $viewRenderer->view;
      $view->addHelperPath($dir, $prefix);
   }

   /**
    * Initialize view 
    * 
    * @return void
    */
   public function initView() {
      // Bootstrap layouts
      //Zend_Layout::startMvc(array('layoutPath' => $this->_root . '/application/default/layouts' , 'layout' => 'main'));
      Zend_Layout::startMvc(array('layoutPath' => $this->_root . '/application/views/scripts', 'layout' => 'layout'));
      //$this->_front->registerPlugin(new ActionSetup);
      $config = Initializer::$_config;
      $base = $config->base->toArray();
      defined('BASE_URL') or define('BASE_URL', $base['url']);
      defined('IMG_URL') or define('IMG_URL', $base['url'] . 'public/img/');
      defined('IMG_PATH') or define('IMG_PATH', ROOT . 'public/img/');
   }

   /**
    * Initialize plugins 
    * 
    * @return void
    */
   public function initPlugins() {
      
   }

   /**
    * Initialize Controller paths 
    * 
    * @return void
    */
   public function initControllers() {
      $front = $this->_front;
      $front->throwExceptions(false);
      $front->addControllerDirectory($this->_root . '/application/modules/public/controllers', 'public');
      $front->addControllerDirectory($this->_root . '/application/modules/admin/controllers', 'admin');
      $front->addControllerDirectory($this->_root . '/application/modules/client/controllers', 'client');
      $front->setDefaultModule('public');
      $front->registerPlugin(new Zend_Controller_Plugin_ErrorHandler(array('controller' => 'error', 'action' => 'error', 'module' => 'public')));
   }

   public function initAuth() {
      $registry = Zend_Registry::getInstance();
      $dbAdapter = $registry->dbAdapter;
      $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
      $authAdapter->setTableName('users')
              ->setIdentityColumn('name')
              ->setCredentialColumn('password');

      Zend_Registry::set('authAdapter', $authAdapter);
   }

   public function initMail() {
      $config = self::$_config;
      $params = $config->mail->smtp;
      $smtp = $params->toArray();
      $mailTransport = new Zend_Mail_Transport_Smtp($smtp['smtp'], $smtp['params']);
      Zend_Mail::setDefaultTransport($mailTransport);
   }

   public function initSMS() {
      $config = self::$_config;
      $params = $config->sms;
      $sms = $params->toArray();
      Zend_Registry::set('smsAdapter', $sms);
   }

}
