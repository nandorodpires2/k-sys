<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Add
 *
 * @author Fernando Rodrigues
 */
class Form_Senha_Add extends Zend_Form {
    
    public function init() {
        
        // cliente_id
        $cliente_id = new Zend_Form_Element_Select('cliente_id');
        
        // senha_tipo_id
        $senha_tipo_id = new Zend_Form_Element_Select('senha_tipo_id');
        
        // senha_host
        $senha_host = new Zend_Form_Element_Text('senha_host');
        
        // senha_usuario
        $senha_usuario = new Zend_Form_Element_Text('senha_usuario');
        
        // senha_senha
        $senha_senha = new Zend_Form_Element_Text('senha_senha');
        
        // senha_observacao
        $senha_observacao = new Zend_Form_Element_Textarea('senha_observacao');
        
        // submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Cadastrar');
        $submit->setAttribs(array(
            'id' => 'btn-nova-senha',
            'class' => 'btn btn-sm btn-default'
        ));
        
        // add elements
        $this->addElements(array(
            $cliente_id,
            $senha_tipo_id,
            $senha_host,
            $senha_usuario,
            $senha_senha,
            $senha_observacao,
            $submit
        ));
                        
    }
    
}
