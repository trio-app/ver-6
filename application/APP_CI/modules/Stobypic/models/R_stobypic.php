<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_stobypic extends CI_Model {

    function load_default($start,$limit,$filter){
    $keyfilter = array();
    if (is_array($filter)){
        foreach($filter as $obj){
            $keyfilter[$obj["field"]]= $obj["data"]["value"];
        }   
    }
    
        $this->load->database();
        $this->db->select(" SQL_CALC_FOUND_ROWS AssetPic,
            format(totalasset,0) as TotalAsset,
            format(assetscan,0) as AssetScanned,
            format((totalasset - assetscan),0) as AssetNotScan ",FALSE);
        $this->db->from("(
            select 
            masset.AssetPic ,
            count(*) as totalasset,
            if (hasilopname.qty is null ,'0',hasilopname.qty) as assetscan
            from masset 
            LEFT JOIN (select AssetPic,count(*) as qty from assetopname GROUP BY AssetPic) as hasilopname
            on masset.AssetPic = hasilopname.AssetPic
            GROUP BY masset.AssetPic ASC
            )as bylocation");
        $this->db->like($keyfilter);  
        $this->db->limit($limit,$start);
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
        $this->db->select(" SQL_CALC_FOUND_ROWS AssetPic,
            format(totalasset,0) as TotalAsset,
            format(assetscan,0) as AssetScanned,
            format((totalasset - assetscan),0) as AssetNotScan ",FALSE);
        $this->db->from("(
            select 
            masset.AssetPic ,
            count(*) as totalasset,
            if (hasilopname.qty is null ,'0',hasilopname.qty) as assetscan
            from masset 
            LEFT JOIN (select AssetPic,count(*) as qty from assetopname GROUP BY AssetPic) as hasilopname
            on masset.AssetPic = hasilopname.AssetPic
            GROUP BY masset.AssetPic ASC
            )as bylocation");
        $query = $this->db->get();
                        //return $db->last_query();
         return $query->result_array();     

    } 
}
