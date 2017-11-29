<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_assetcost extends CI_Model {

function insertDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'CostName' => $dtrows['CostName'],
                        'CostDescription' => $dtrows['CostDescription']
                );

                if ( ! $this->db->insert('mcostcenter', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['CostName'] . ' Insert Successfuly'
                    );
                }
                
                return json_encode($error); 
            }
    
}
