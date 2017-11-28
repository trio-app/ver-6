<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_assetgroup extends CI_Model {

function updateDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'GroupName' => $dtrows['GroupName'],
                        'GroupDescription' => $dtrows['GroupDescription']
                );
                $this->db->where('GroupID', $dtrows['GroupID']);
                //$this->db->update('mgroup', $data);
                
                if ( ! $this->db->update('mgroup', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['GroupName'] . ' Update Successfuly'
                    );
                }
                
                return json_encode($error);                 
                
            }
    
}
