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
        $cliente_id->setLabel('Cliente: ');
        $cliente_id->setMultiOptions($this->getClientes());
        $cliente_id->setRequired();
        
        // senha_tipo_id
        $senha_tipo_id = new Zend_Form_Element_Select('senha_tipo_id');
        $senha_tipo_id->setLabel('Tipo Senha: ');
        $senha_tipo_id->setMultiOptions($this->getSenhasTipo());
        $senha_tipo_id->setRequired();
        
        // senha_host
        $senha_host = new Zend_Form_Element_Text('senha_host');
        $senha_host->setLabel('Host: ');
        $senha_host->setRequired();
        
        // senha_usuario
        $senha_usuario = new Zend_Form_Element_Text('senha_usuario');
        $senha_usuario->setLabel('Usuário: ');
        $senha_usuario->setRequired();
        
        // senha_senha
        $senha_senha = new Zend_Form_Element_Text('senha_senha');
        $senha_senha->setLabel('Senha: ');
        $senha_senha->setRequired();
        
        // senha_observacao
        $senha_observacao = new Zend_Form_Element_Textarea('senha_observacao');
        $senha_observacao->setLabel('Observações: ');
        $senha_observacao->setAttrib('rows', 10);
        
        // submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Cadastrar');
        $submit->setAttribs(array(
            'id' => 'btn-nova-senha',
            'class' => 'btn btn-sm btn-info form-control'
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
        
        // set defaults form attribs 
        $this->setDefaultAttribs();
                                
    }
    
    private function setDefaultAttribs(array $attribs = null) {
        
        // default attribs
        $attribs['class'] = 'form-control';
        
        foreach ($this->getElements() as $element) {
            if (!$element instanceof Zend_Form_Element_Submit) {
                $element->setAttribs($attribs);
            }            
        }
        
    }

    protected function getClientes() {
        $options = array('' => 'Selecione...');
        
        $modelCliente = new Model_Cliente();
        $clientes = $modelCliente->fetchAll("cliente_ativo = 1");
        
        foreach ($clientes as $cliente) {
            $options[$cliente->cliente_id] = $cliente->cliente_nome;
        }
        
        return $options;
    }
    
    protected function getSenhasTipo() {
        $options = array('' => 'Selecione...');
        
        $modelSenhaTipo = new Model_SenhaTipo();
        $tipos = $modelSenhaTipo->fetchAll("senha_tipo_ativo = 1");
        
        foreach ($tipos as $tipo) {
            $options[$tipo->senha_tipo_id] = $tipo->senha_tipo_nome;
        }
        
        return $options;
    }
    
}
