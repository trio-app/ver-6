<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_assetcost extends CI_Model {

function updateDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'CostName' => $dtrows['CostName'],
                        'CostDescription' => $dtrows['CostDescription']
                );
                $this->db->where('CostID', $dtrows['CostID']);
                
                if ( ! $this->db->update('mcostcenter', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['CostName'] . ' Update Successfuly'
                    );
                }
                
                return json_encode($error);                 
                
            }
    
}
