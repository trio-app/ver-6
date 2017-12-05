<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cpuser extends CI_Model {

function insertDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'userLogin' => $dtrows['userLogin'],
                        'user_nik' => $dtrows['user_nik'],
                        'userName' => $dtrows['userName'],
                        'userGroup' => $dtrows['userGroup'],
                        'userPassword' => md5($dtrows['userPassword']),
                        'sysCreateuser' => $this->session->userdata('userLogin'),
                        'sysCreateDate' => mdate('%Y-%m-%d %H:%i:%s', time()),
                        'sysStatus' => 2
                );

                if ( ! $this->db->insert('cpuser', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['userName'] . ' Insert Successfuly'
                    );
                }
                
                return json_encode($error); 
            }
    
}
