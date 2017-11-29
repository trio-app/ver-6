<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_assetsublocation extends CI_Model {

function deleteDT($dtrows)
            {
                $this->load->database();
                $this->db->where('SublocID', $dtrows['SublocID']);
                
                if ( ! $this->db->delete('msublocation'))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['SubLocname'] . ' Delete Successfuly'
                    );
                }
                
                return json_encode($error);
                
            }
    
}
