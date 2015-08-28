<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Fernando Rodrigues
 */
class Form_Auth_Login extends Zend_Form {
    
    public function init() {
        
        // administrador_email
        $administrador_email = new Zend_Form_Element_Text('administrador_email');
        $administrador_email->setLabel('E-mail: ');
        $administrador_email->setRequired();
        $administrador_email->setAttrib('class', 'form-control');
        $administrador_email->setDecorators(Form_Decorators::$simpleElementDecorators);
        
        // administrador_senha
        $administrador_senha = new Zend_Form_Element_Password('administrador_senha');
        $administrador_senha->setLabel('Senha: ');
        $administrador_senha->setRequired();
        $administrador_senha->setAttrib('class', 'form-control');
        $administrador_senha->setDecorators(Form_Decorators::$simpleElementDecorators);
        
        // submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Logar');
        $submit->setAttrib('class', 'form-control btn btn-info');
        
        // add elements
        $this->addElements(array(
            $administrador_email,
            $administrador_senha,
            $submit
        ));
        
    }
    
}
