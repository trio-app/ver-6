<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_reportsto extends CI_Model {

function load_default(){
    $keyfilter = array();
    if (is_array($filter)){
        foreach($filter as $obj){
            $keyfilter[$obj["field"]]= $obj["data"]["value"];
        }   
    }
    //print_r($keyfilter);
    $this->load->database();
    $this->db->select(" SQL_CALC_FOUND_ROWS masset.AssetNo,
                            masset.AssetNoRegDept,
                            masset.AssetName,
                            masset.AssetLocation,
                            masset.AssetSublocation,
                            masset.AssetKey,
                            masset.AssetGroup,
                            masset.AssetCategory,
                            hasilopname.chlocation as AssetLocationNew,
                            masset.AssetCondition,
                            hasilopname.chcondition as AssetConditionNew,
                            hasilopname.AssetRemark as AssetRemark,
                            hasilopname.AssetScanUser as AssetScanUser,
                            cpuser.userName as AssetUsername,
                            hasilopname.ScanDate as ScanDate,
                            masset.AssetPic,
                            hasilopname.SystemDate as SystemDate,
                            masset.AssetInfo ",FALSE);
    $this->db->from('masset');
    $this->db->join("(SELECT
                        assetopname.AssetNo,
                        assetopname.AssetLocation AS chlocation,
                        assetopname.AssetCondition AS chcondition,
                        assetopname.AssetRemark,
                        assetopname.AssetScanUser,
                        DATE_FORMAT(assetopname.AssetScanDate,'%Y-%m-%d') as ScanDate,
                        DATE_FORMAT(assetopname.AssetDate,'%Y-%m-%d') as SystemDate

                        FROM
                        assetopname) as hasilopname", 'masset.AssetNO = hasilopname.AssetNo', 'LEFT');
    $this->db->join("cpuser","cpuser.user_nik = hasilopname.AssetScanUser",'LEFT');
    $this->db->where("masset.AssetInfo", "ASSET");
    $this->db->like($keyfilter);   
    $this->db->limit($limit,$start);
    $this->db->order_by("masset.AssetID","DESC");
     $query = $this->db->get();
                    //return $db->last_query();
    $rows = $query->result_array();

    $query2 = $this->db->query('SELECT FOUND_ROWS() AS hasil');
    $count = $query2->row('hasil');

    $data = array(
                'TotalRows' => $count,
                    'Rows' => $rows
                 );
    return json_encode($data);   

    }
   
    function exportData(){
    $this->load->database();
    $this->db->select(" SQL_CALC_FOUND_ROWS masset.AssetNo,
                            masset.AssetNoRegDept,
                            masset.AssetName,
                            masset.AssetLocation,
                            masset.AssetSublocation,
                            masset.AssetKey,
                            masset.AssetGroup,
                            masset.AssetCategory,
                            hasilopname.chlocation as AssetLocationNew,
                            masset.AssetCondition,
                            hasilopname.chcondition as AssetConditionNew,
                            hasilopname.AssetRemark as AssetRemark,
                            hasilopname.AssetScanUser as AssetScanUser,
                            cpuser.userName as AssetUsername,
                            hasilopname.ScanDate as ScanDate,
                            masset.AssetPic,
                            hasilopname.SystemDate as SystemDate,
                            masset.AssetInfo ",FALSE);
    $this->db->from('masset');
    $this->db->join("(SELECT
                        assetopname.AssetNo,
                        assetopname.AssetLocation AS chlocation,
                        assetopname.AssetCondition AS chcondition,
                        assetopname.AssetRemark,
                        assetopname.AssetScanUser,
                        DATE_FORMAT(assetopname.AssetScanDate,'%Y-%m-%d') as ScanDate,
                        DATE_FORMAT(assetopname.AssetDate,'%Y-%m-%d') as SystemDate

                        FROM
                        assetopname) as hasilopname", 'masset.AssetNO = hasilopname.AssetNo', 'LEFT');
    $this->db->join("cpuser","cpuser.user_nik = hasilopname.AssetScanUser",'LEFT');
    $this->db->where("masset.AssetInfo", "ASSET");
    $this->db->order_by("masset.AssetID","DESC");
    $query = $this->db->get();
                    //return $this->db->last_query();
    return $query->result_array();

        }
    
}
