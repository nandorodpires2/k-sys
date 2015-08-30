<?php

class Site_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->headScript()->prependFile($this->view->baseUrl("views/js/site/index.js"), 'text/javascript' );
    }

    public function indexAction()
    {
        $modelSenha = new Model_Senha();
        $where = "senha_ativo = 1";
        $senhas = $modelSenha->fetchAll($where);
        $this->view->senhas = $senhas;
    }
    
    public function searchAction() {        
        
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        $value = $this->getRequest()->getParam('value');
        
        $modelSenha = new Model_Senha();
        $where = "senha_ativo = 1";
        $senhas = $modelSenha->fetchAll($where);
                
        $this->view->senhas = $senhas;
        
    }

}

