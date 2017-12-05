<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_stobylocation extends CI_Model {

    function load_default($start,$limit,$filter){
        
    $keyfilter = array();
    if (is_array($filter)){
        foreach($filter as $obj){
            $keyfilter[$obj["field"]]= $obj["data"]["value"];
        }   
    }
    
        $this->load->database();
        $this->db->select(" SQL_CALC_FOUND_ROWS AssetLocation,
            format(totalasset,0) as TotalAsset,
            format(assetscan,0) as AssetScanned,
            format((totalasset - assetscan),0) as AssetNotScan ",FALSE);
        $this->db->from("(
            select 
            masset.AssetLocation ,
            count(*) as totalasset,
            if (hasilopname.qty is null ,'0',hasilopname.qty) as assetscan
            from masset 
            LEFT JOIN (select AssetLocation,count(*) as qty from assetopname GROUP BY AssetLocation) as hasilopname
            on masset.AssetLocation = hasilopname.AssetLocation
            GROUP BY masset.AssetLocation ASC
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
        $this->db->select(" SQL_CALC_FOUND_ROWS AssetLocation,
            format(totalasset,0) as TotalAsset,
            format(assetscan,0) as AssetScanned,
            format((totalasset - assetscan),0) as AssetNotScan ",FALSE);
        $this->db->from("(
            select 
            masset.AssetLocation ,
            count(*) as totalasset,
            if (hasilopname.qty is null ,'0',hasilopname.qty) as assetscan
            from masset 
            LEFT JOIN (select AssetLocation,count(*) as qty from assetopname GROUP BY AssetLocation) as hasilopname
            on masset.AssetLocation = hasilopname.AssetLocation
            GROUP BY masset.AssetLocation ASC
            )as bylocation");
        $query = $this->db->get();
                        //return $db->last_query();
        return $query->result_array();
    }
}
