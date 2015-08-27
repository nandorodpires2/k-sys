<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Senha
 *
 * @author Fernando Rodrigues
 */
class Model_Senha extends Zend_Db_Table_Abstract {
    
    protected $_name = "senha";
    protected $_primary = "senha_id";
    
    protected function getQueryAll() {
        $select = $this->select()
                ->from(array($this->_name), '*')
                ->setIntegrityCheck(false)
                ->joinLeft('cliente', 'senha.cliente_id = cliente.cliente_id', array('*'))
                ->joinLeft('senha_tipo', 'senha.senha_tipo_id = senha_tipo.senha_tipo_id', array('*'));
        
        return $select;
    }
    
    public function fetchAll($where = null, $order = null, $count = null, $offset = null) {
        
        $select = $this->getQueryAll();
        
        if ($where) {
            $select->where($where);
        }
        
        return parent::fetchAll($select);
    }
    
}
