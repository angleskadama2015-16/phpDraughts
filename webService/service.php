<?php
    //funkcija za validiranje poteze,  ki prejme polje parametrov; trenutno samo placeholder
    function validateMove($parameters){
        $state=$parameters['state'];
        $move=$parameters['move'];
        $valid=true;
        $returnArr=array(
            'newState'=>$state,
            'validateResult'=>$valid
        );
        return $returnArr;
    }
?>