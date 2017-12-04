<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rassetdata extends CI_Model {
    
    function insertDT($dtrows){
        
            $this->load->database();
            $data = array(
                    '' => $dtrows[''],
                    '' => $dtrows[''],
                    '' => $dtrows[''],
                    '' => $dtrows[''],
            );
            
            if ( ! $this->db->insert('',$data))
            {
                    $error=  $this->db->error();
            }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['GroupName'] . ' Insert Successfuly'
                    );
                }
                
                return json_encode($error); 
    }
}