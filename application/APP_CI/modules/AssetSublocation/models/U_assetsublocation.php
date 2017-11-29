<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_assetsublocation extends CI_Model {

function updateDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'LocName' => $dtrows['LocName'],
                        'SubLocname' => $dtrows['SubLocname'],
                        'SubDescription' => $dtrows['SubDescription']
                );
                $this->db->where('SublocID', $dtrows['SublocID']);
                //$this->db->update('msublocation', $data);
                
                if ( ! $this->db->update('msublocation', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['SubLocname'] . ' Update Successfuly'
                    );
                }
                
                return json_encode($error);                 
                
            }
    
}
