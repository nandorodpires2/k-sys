<?php

class Site_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        $modelSenha = new Model_Senha();
        $where = "senha_ativo = 1";
        $senhas = $modelSenha->fetchAll($where);
        $this->view->senhas = $senhas;
    }

}

