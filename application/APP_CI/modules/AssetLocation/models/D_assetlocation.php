<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_assetlocation extends CI_Model {

function deleteDT($dtrows)
            {
                $this->load->database();
                $this->db->where('LocID', $dtrows['LocID']);
                
                if ( ! $this->db->delete('mlocation'))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['LocName'] . ' Delete Successfuly'
                    );
                }
                
                return json_encode($error);
                
            }
    
}
