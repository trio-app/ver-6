<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_cpgroup extends CI_Model {

function deleteDT($dtrows)
            {
                $this->load->database();
                $this->db->where('GroupID', $dtrows['GroupID']);
                
                if ( ! $this->db->delete('cpgroup'))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['GroupName'] . ' Delete Successfuly'
                    );
                }
                
                return json_encode($error);
                
            }
    
}
