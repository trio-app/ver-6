<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_assetcategory extends CI_Model {

function updateDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'CategoryName' => $dtrows['CategoryName'],
                        'CategoryDescription' => $dtrows['CategoryDescription']
                );
                $this->db->where('CategoryID', $dtrows['CategoryID']);
                //$this->db->update('mgroup', $data);
                
                if ( ! $this->db->update('mcategory', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['CategoryName'] . ' Update Successfuly'
                    );
                }
                
                return json_encode($error);                 
                
            }
    
}
