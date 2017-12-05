<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_cpuser extends CI_Model {

function updateDT($dtrows)
            {
                $this->load->database();
                $data = array(
                        'userLogin' => $dtrows['userLogin'],
                        'user_nik' => $dtrows['user_nik'],
                        'userName' => $dtrows['userName'],
                        'userGroup' => $dtrows['userGroup'],
                        'userPassword' => md5($dtrows['userPassword']),
                        'sysUpdateuser' => $this->session->userdata('userLogin'),
                        'sysUpdateDate' => mdate('%Y-%m-%d %H:%i:%s', time())
                );
                $this->db->where('userID', $dtrows['userID']);
                //$this->db->update('muser', $data);
                
                if ( ! $this->db->update('cpuser', $data))
                {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                }else{
                    $error = array(
                        'code'=>'Success',
                        'message'=>$dtrows['userName'] . ' Update Successfuly'
                    );
                }
                
                return json_encode($error);                 
                
            }
    
}
