<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_assetpic extends CI_Model {

function updateDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'PicName' => $dtrows['PicName'],
                        'PicDescription' => $dtrows['PicDescription']
                );
                $this->db->where('PicID', $dtrows['PicID']);
                //$this->db->update('mpic', $data);
                
                if ( ! $this->db->update('mpic', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['PicName'] . ' Update Successfuly'
                    );
                }
                
                return json_encode($error);                 
                
            }
    
}
