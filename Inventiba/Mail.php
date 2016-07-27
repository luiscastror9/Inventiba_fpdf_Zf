<?php

class Inventiba_Mail {

    protected static $_instance = null;
    private $_mail;

    public static function getInstance($params) {
        if (null === self::$_instance) {
            self::$_instance = new self($params);
        }
        return (self::$_instance);
    }

    public function __construct($params = array()) {
        $this->_mail = new Zend_Mail("UTF-8");
        $subject = isset($params["subject"])? $params["subject"] :"";
        $toEmail = isset($params["toEmail"])? $params["toEmail"] :"";
        $toName = isset($params["toName"])? $params["toName"] :"";
        $fromName = isset($params["fromName"])? $params["fromName"] :"";
        $fromEmail = isset($params["fromEmail"])? $params["fromEmail"] :"";
        $bodyHtml=isset($params["bodyHtml"])? $params["bodyHtml"] :"";
        $bodyText=isset($params["bodyText"])? $params["bodyText"] :"";
                        
        $this->_mail->setFrom($fromEmail, $fromName) //Cuenta de correo del remitente y nombre del remitente amostrar
                ->setSubject($subject) //Asunto
                ->setBodyHtml($bodyHtml) //Cuerpo del mensaje indicando que será HTML y no texto plano. Usaríamos setBodyText() para texto plano
                ->setBodyText($bodyText) 
                ->addTo($toEmail,$toName);
        
    }
    public function send() {
        $res = null;
        try {
            $res = $this->_mail->send();
        } catch (Zend_Exception $e) {
            echo $e->getMessage();
        }
        return $res;
    }

}