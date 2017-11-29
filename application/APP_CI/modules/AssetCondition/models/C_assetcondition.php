<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_assetcondition extends CI_Model {

function insertDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'conName' => $dtrows['conName'],
                        'conDescription' => $dtrows['conDescription']
                );

                if ( ! $this->db->insert('m_condition', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['conName'] . ' Insert Successfuly'
                    );
                }
                
                return json_encode($error); 
            }
    
}
