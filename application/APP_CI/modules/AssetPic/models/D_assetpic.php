<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_assetpic extends CI_Model {

function deleteDT($dtrows)
            {
                $this->load->database();
                $this->db->where('PicID', $dtrows['PicID']);
                
                if ( ! $this->db->delete('mpic'))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['PicName'] . ' Delete Successfuly'
                    );
                }
                
                return json_encode($error);
                
            }
    
}
