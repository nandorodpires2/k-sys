<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Fernando Rodrigues
 */
class Model_Cliente extends Zend_Db_Table_Abstract {
    
    protected $_name = "cliente";
    protected $_primary = "cliente_id";
    
}
