<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author Fernando Rodrigues
 */
class Plugin_Auth extends Zend_Controller_Plugin_Abstract {
    
    private $_hasIdentity;

    public function preDispatch(\Zend_Controller_Request_Abstract $request) {
        
        $this->hasIdentity();
        
        if (!$this->_hasIdentity) {
            $request->setControllerName('auth');
            $request->setActionName('login');
            $request->setDispatched();
        }
        
        parent::preDispatch($request);
    }
    
    public function hasIdentity() {
        $this->_hasIdentity = Zend_Auth::getInstance()->hasIdentity();
        return $this->_hasIdentity;
    }
    
}
