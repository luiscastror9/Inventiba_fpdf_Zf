<?php
class Inventiba_Auth {
    protected static $_instance = null;
    private static $_user = null;
    private $_auth;

    public static function getInstance ()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return (self::$_instance);
    }
    
    public function __construct() {
        $this->_auth = Zend_Auth::getInstance();
    }

    public function login($params){
        
        if(!$this->_auth->hasIdentity()){
        
            require_once('Zend/Session.php');
 
            $seconds = 60 * 60 * 24 * 7; // 7 days
            Zend_Session::rememberMe($seconds);
            $authAdapter = Zend_Registry::get('authAdapter');
            $authAdapter->setIdentity($params['user']);
            $authAdapter->setCredential(sha1($params['password']));

            $result = $this->_auth->authenticate($authAdapter);
            $isValid = $result->isValid();
			//Added by Luis Castro 25/06/2016  use a Zend Session for store User param
			$session = new Zend_Session_Namespace('user_session');
			$session->username=$params['user'];
			setcookie('username', $params['user'],$seconds);

			//////////////////////////////////
            return $isValid;
        }
        return true;
    }
    
    public function loginByUser($user){
        require_once('Zend/Session.php');
        $seconds = 60 * 60 * 24 * 7; // 7 days
        Zend_Session::rememberMe($seconds);
        $this->_auth->getStorage()->write($user->email);
        $this->_user = $user;
    }
    
    public function logout(){
        $this->_auth->clearIdentity();
        self::$_user = null;
    }
    
    public function getUser (){
        self::$_user = $this->_auth->hasIdentity() ? Tables_Users::getInstance()->findByEmail($this->_auth->getIdentity()) : null;
        return self::$_user;
    }
    
    public static function encryptPassword($email, $password){
        return hash_hmac('md5', $email, $password);
    }
}