<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthController
 *
 * @author Fernando Rodrigues
 */
class Site_AuthController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function loginAction() {
        
        //$this->_helper->layout()->disableLayout();
        
        $formAuthLogin = new Form_Auth_Login();
        $this->view->form = $formAuthLogin;
        
        if ($this->getRequest()->isPost()) {
            if ($formAuthLogin->isValid($this->getRequest()->getPost())) {
                $dadosAutenticacao = $formAuthLogin->getValues();
                
                $db = Zend_Registry::get('db');               
                $authAdapter = new Zend_Auth_Adapter_DbTable($db);

                try {                
                    $authAdapter->setTableName('administrador')
                            ->setIdentityColumn('administrador_email')
                            ->setCredentialColumn('administrador_senha')
                            ->setIdentity($dadosAutenticacao['administrador_email'])
                            ->setCredential(md5($dadosAutenticacao['administrador_senha']));
                    $authAdapter->getDbSelect()->where("administrador_ativo = ?", 1);
                    
                    $auth = Zend_Auth::getInstance();                
                    $result = $auth->authenticate($authAdapter);

                    if ($result->isValid()) {                        
                        
                        $dadosAdministrador = array();
                        						
                        Zend_Auth::getInstance()->getStorage()->write($dadosAdministrador);
                        $this->_redirect("index/");
                    } else {
                        $this->_helper->flashMessenger->addMessage(array(
                            'class' => 'alert alert-danger',
                            'message' => 'Usuário e/ou senha inválidos!'
                        ));
                        Zend_Debug::dump($result); die();
                        $this->_redirect("admin/autenticacao/login");
                    }

                } catch (Exception $e) {
                    $this->_helper->flashMessenger->addMessage(array(
                        'class' => 'alert alert-danger',
                        'message' => 'Houve um erro na autenticação - ' . $e->getMessage()
                    ));
                    $this->_redirect("auth/login");
                }
                
            }
        }
        
    }
    
    public function logoutAction() {
        $this->_helper->layout->disableLayout(true);
        $this->_helper->viewRenderer->setNoRender(true);
        
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Session::destroy();
        
        $this->_redirect('index/');
    }
    
}
