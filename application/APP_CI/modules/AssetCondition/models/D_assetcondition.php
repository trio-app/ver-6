<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_assetcondition extends CI_Model {

function deleteDT($dtrows)
            {
                $this->load->database();
                $this->db->where('conID', $dtrows['conID']);
                
                if ( ! $this->db->delete('m_condition'))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['conName'] . ' Delete Successfuly'
                    );
                }
                
                return json_encode($error);
                
            }
    
}
