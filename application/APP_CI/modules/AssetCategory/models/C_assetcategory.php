<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_assetcategory extends CI_Model {

function insertDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'CategoryName' => $dtrows['CategoryName'],
                        'CategoryDescription' => $dtrows['CategoryDescription']
                );

                if ( ! $this->db->insert('mcategory', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['CategoryName'] . ' Insert Successfuly'
                    );
                }
                
                return json_encode($error); 
            }
    
}
