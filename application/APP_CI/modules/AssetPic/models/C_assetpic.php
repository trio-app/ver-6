<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_assetpic extends CI_Model {

function insertDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'PicName' => $dtrows['PicName'],
                        'PicDescription' => $dtrows['PicDescription']
                );

                if ( ! $this->db->insert('mpic', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['PicName'] . ' Insert Successfuly'
                    );
                }
                
                return json_encode($error); 
            }
    
}
