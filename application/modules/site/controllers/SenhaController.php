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
                
            }
        }
        
    }
    
}
