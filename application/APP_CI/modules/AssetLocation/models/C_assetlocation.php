<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_assetlocation extends CI_Model {

function insertDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'LocName' => $dtrows['LocName'],
                        'LocDescription' => $dtrows['LocDescription']
                );

                if ( ! $this->db->insert('mlocation', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['LocName'] . ' Insert Successfuly'
                    );
                }
                
                return json_encode($error); 
            }
    
}
