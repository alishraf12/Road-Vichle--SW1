<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author omar
 */
include_once '../Classes/Admin.php';

include_once '../Classes/Mechanics.php';
include_once '../Classes/User_parent.php';
include_once '../Database/User_Actor_Queries.php';
class User_Actor extends User_parent {
    private $request;
    private $User_Actot_queries;

    public  function __construct() {
        $this->User_Actot_queries=new User_Actor_Queries();
     
}
    public function set_sendfeedback($data){
        $this->sendfeedback=$data;
    }
    public function get_feedback(){
        return $this->sendfeedback;
    }
    
    public function Send_feedback($id,$feedback){
        $r=$this->User_Actot_queries->Send_feedback($id, $feedback);
        if($r){
            return TRUE;
        }
        else
            return false;
    }
    
    function setRequest($request) {
        $this->request = $request;
    }

    function getRequest() {
        return $this->request;
    }
    public function sendRequest($user,$mechanic){
        $result= $this->User_Actot_queries->Send_Request($user, $mechanic);
        if($result){
            return true;
        } else {
            return false;    
        }
    }
    
    
}

$user=new User_Actor();
$user->set_username("KOKO90");
$user->setRequest("Iwanna fix my car");



$user2=new Mechanics();
$user2->set_username("MOMO1000");
$user->sendRequest($user,$user2);

echo '<br>';
//$user=new User_parent($id="");
//$user->set_fname("jack");
//$user->set_lname("karly");
//$user->set_email("jack.com");
//$user->set_password("0000");
//$user->set_username("JackNN");
//$user->set_user_type(2);

