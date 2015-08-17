<?php

/**
 * ControleAcessoFilter
 **/ 
class ControleAcessoFilter extends CFilter{

    protected function preFilter($filterChain){
        return !(Yii::app()->user->isGuest);
    }
 
    protected function postFilter($filterChain){
        
    }
}

?>