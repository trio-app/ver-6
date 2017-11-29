<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_assetlocation extends CI_Model {

function updateDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'LocName' => $dtrows['LocName'],
                        'LocDescription' => $dtrows['LocDescription']
                );
                $this->db->where('LocID', $dtrows['LocID']);
                //$this->db->update('mlocation', $data);
                
                if ( ! $this->db->update('mlocation', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['LocName'] . ' Update Successfuly'
                    );
                }
                
                return json_encode($error);                 
                
            }
    
}
