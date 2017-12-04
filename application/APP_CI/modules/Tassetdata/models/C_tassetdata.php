<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tassetdata extends CI_Model {

function insertDT($dtrows)
            {
                $this->load->database();
                $data = array(
                    'AssetNo' => $dtrows['AssetNo'],
                    'AssetNoRegDept' => $dtrows['AssetNoRegDept'],
                    'AssetKey' => $dtrows['AssetKey'],
                    'AssetSAPNo' => $dtrows['AssetSAPNo'],
                    'AssetName' => $dtrows['AssetName'],
                    'AssetGroup' => $dtrows['AssetGroup'],
                    'AssetCategory' => $dtrows['AssetCategory'],
                    'AssetLocation' => $dtrows['AssetLocation'],
                    'AssetSublocation' => $dtrows['AssetSublocation'],
                    'AssetCostcenter' => $dtrows['AssetCostcenter'],
                    'AssetPic' => $dtrows['AssetPic'],
                    'AssetCondition' => $dtrows['AssetCondition'],
                    'AssetRemark' => $dtrows['AssetRemark'],
                    'AssetInfo' => $dtrows['AssetInfo'],
                    'AssetAquisitiondate' => $dtrows['AssetAquisitiondate'],
                    'AssetLabel' => $dtrows['AssetLabel']
                );

                $this->db->insert('masset', $data);
                
            }
    
}
