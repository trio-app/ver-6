<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_assetcost extends CI_Model {

function deleteDT($dtrows)
            {
                $this->load->database();
                $this->db->where('CostID', $dtrows['CostID']);
                
                if ( ! $this->db->delete('mcostcenter'))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['CostName'] . ' Delete Successfuly'
                    );
                }
                
                return json_encode($error);
                
            }
    
}
