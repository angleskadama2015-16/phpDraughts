<?php
    header('Content-Type:application/json');
    require_once('service.php');
    //preveri, če so parametri podani, če so nadaljuje
    if(!empty($_GET['currentState']) && !empty($_GET['moveToMake'])){
        $parameters=array(
            'state'=>$_GET['currentState'],
            'move'=>$_GET['moveToMake']
        );
        $results=validateMove($parameters);
        
        if(empty($results)){
            deliver_response(400, 'Bad return results', NULL);
        }
        else{ 
            deliver_response(200, 'Request processed', $results);
        }
    }else{ 
        deliver_response(400, 'Missing parameters', NULL);
    }

    //funkcija za vračanje json odgovora
    function deliver_response($status, $status_message, $data){
        header('HTTP/1.1 $status $status_message');
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['data']=$data;
        $json_response=json_encode($response);
        //echo "Success";
        return $json_response;
    }
?>