<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_assetcategory extends CI_Model {

function deleteDT($dtrows)
            {
                $this->load->database();
                $this->db->where('CategoryID', $dtrows['CategoryID']);
                
                if ( ! $this->db->delete('mcategory'))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['CategoryName'] . ' Delete Successfuly'
                    );
                }
                
                return json_encode($error);
                
            }
    
}
