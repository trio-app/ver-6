<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_stobygroup extends CI_Model {

    function load_default($start,$limit,$filter){
        
    $keyfilter = array();
    if (is_array($filter)){
        foreach($filter as $obj){
            $keyfilter[$obj["field"]]= $obj["data"]["value"];
        }   
    }
    
        $this->load->database();
        $query = $this->db->query(" SELECT SQL_CALC_FOUND_ROWS
                    mgroup.GroupName AS AssetGroup,
                    FORMAT(IFNULL(hasil.total, 0),0) AS TotalAsset,
                    FORMAT(IFNULL(hasil.scan, 0),0) AS AssetScanned,
                    IFNULL((total - scan),0) AS AssetNotScan
            FROM mgroup
            LEFT JOIN 
                    (SELECT 
                    AssetGroup,
                    masset.AssetNo,
                    COUNT(*) AS total,
                    COUNT(assetopname.Assetno) AS scan
                    FROM masset
                    LEFT JOIN assetopname
                            ON assetopname.Assetno = masset.AssetNo
                    GROUP BY AssetGroup
                    ) AS hasil
                    ON hasil.AssetGroup = mgroup.GroupName

            GROUP BY mgroup.GroupName
            LIMIT ". $start ."," .$limit);
            //$this->db->like($keyfilter);  
            //$this->db->limit($limit,$start);
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
        $query = $this->db->query(" SELECT SQL_CALC_FOUND_ROWS
                    mgroup.GroupName AS AssetGroup,
                    FORMAT(IFNULL(hasil.total, 0),0) AS TotalAsset,
                    FORMAT(IFNULL(hasil.scan, 0),0) AS AssetScanned,
                    IFNULL((total - scan),0) AS AssetNotScan
            FROM mgroup
            LEFT JOIN 
                    (SELECT 
                    AssetGroup,
                    masset.AssetNo,
                    COUNT(*) AS total,
                    COUNT(assetopname.Assetno) AS scan
                    FROM masset
                    LEFT JOIN assetopname
                            ON assetopname.Assetno = masset.AssetNo
                    GROUP BY AssetGroup
                    ) AS hasil
                    ON hasil.AssetGroup = mgroup.GroupName

            GROUP BY mgroup.GroupName");
        
                        //return $db->last_query();
        
                        //return $db->last_query();
         return $query->result_array();     

    } 
}
