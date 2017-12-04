<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cpgroup extends CI_Model {

function insertDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'GroupName' => $dtrows['GroupName'],
                        'GroupDescription' => $dtrows['GroupDescription']
                );

                if ( ! $this->db->insert('cpgroup', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['GroupName'] . ' Insert Successfuly'
                    );
                }
                
                return json_encode($error); 
            }
    
}
