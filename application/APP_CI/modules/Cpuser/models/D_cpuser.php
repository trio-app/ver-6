<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_cpuser extends CI_Model {

function deleteDT($dtrows)
            {
                $this->load->database();
                $this->db->where('userID', $dtrows['userID']);
                
                if ( ! $this->db->delete('cpuser'))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['userName'] . ' Delete Successfuly'
                    );
                }
                
                return json_encode($error);
                
            }
    
}
