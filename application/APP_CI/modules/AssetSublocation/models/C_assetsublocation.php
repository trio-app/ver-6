<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_assetsublocation extends CI_Model {

function insertDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'LocName' => $dtrows['LocName'],
                        'SubLocname' => $dtrows['SubLocname'],
                        'SubDescription' => $dtrows['SubDescription']
                );

                if ( ! $this->db->insert('msublocation', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['SubLocname'] . ' Insert Successfuly'
                    );
                }
                
                return json_encode($error); 
            }
    
}
