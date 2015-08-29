<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SenhaController
 *
 * @author Fernando Rodrigues
 */
class Site_SenhaController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function addAction() {
        
        $formSenhaAdd = new Form_Senha_Add();
        $this->view->form = $formSenhaAdd;
        
        if ($this->getRequest()->isPost()) {
            if ($formSenhaAdd->isValid($this->getRequest()->getPost())) {
                
                $data = $formSenhaAdd->getValues();
                
                $modelSenha = new Model_Senha();
                
                try {
                    $modelSenha->insert($data);
                } catch (Exception $ex) {
                    
                }
                
                /**
                 * @todo Criar mensagens de sucesso e erro
                 */
                
                $this->_redirect('/index');
                
            }
        }
        
    }
    
    public function editAction() {
        
        $senha_id = $this->getRequest()->getParam('senha_id');
        
        $modelSenha = new Model_Senha();
        $senha = $modelSenha->fetchRow("senha_id = {$senha_id}");
        
        $formSenha = new Form_Senha_Add();
        $formSenha->submit->setLabel("Editar");
        $formSenha->populate($senha->toArray());
        
        $this->view->form = $formSenha;
        
        if ($this->getRequest()->isPost()) {
            if ($formSenha->isValid($this->getRequest()->getPost())) {
                $data = $formSenha->getValues();
                
                try {
                    $modelSenha = new Model_Senha();
                    $modelSenha->update($data, $senha_id);
                } catch (Exception $ex) {

                }
                
                $this->_redirect('index/');
                
            }
        }
        
    }
    
    public function deleteAction() {
        
        $this->_helper->viewRenderer->setNoRender();
        $senha_id = $this->getRequest()->getParam('senha_id');
        
        try {
            $modelSenha = new Model_Senha();
            $modelSenha->setDisable($senha_id);            
        } catch (Exception $ex) {

        }
        
        $this->_redirect("index/");
        
    }
    
}
