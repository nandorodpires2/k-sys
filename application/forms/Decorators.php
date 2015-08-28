<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Decorators
 *
 * @author Fernando Rodrigues
 */
class Form_Decorators {
    public static $simpleElementDecorators = array(
        array('ViewHelper'),
        array('Label', array('tag' => 'span', 'escape' => false, 'requiredPrefix' => '<span class="required">* </span>')),
        array('Description', array('tag' => 'div')),
        array('Errors', 
            array('class' => 'alert alert-danger'),
        ),
        array('HtmlTag', array('tag' => 'div'))
    );
}
