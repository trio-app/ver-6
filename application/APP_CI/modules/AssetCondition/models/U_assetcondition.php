<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_assetcondition extends CI_Model {

function updateDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'conName' => $dtrows['conName'],
                        'conDescription' => $dtrows['conDescription']
                );
                $this->db->where('conID', $dtrows['conID']);
                
                if ( ! $this->db->update('m_condition', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['conName'] . ' Update Successfuly'
                    );
                }
                
                return json_encode($error);                 
                
            }
    
}
