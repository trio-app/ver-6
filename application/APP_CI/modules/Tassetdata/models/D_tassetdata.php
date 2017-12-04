<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_tassetdata extends CI_Model {

function deleteDT($dtrows)
            {
                $this->load->database();
                $this->db->where('AssetID', $dtrows['AssetID']);
                $this->db->delete('masset');
                
            }
    
}
