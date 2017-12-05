<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_stobycostcenter extends CI_Model {

    function load_default($start,$limit,$filter){
        
    $keyfilter = array();
    if (is_array($filter)){
        foreach($filter as $obj){
            $keyfilter[$obj["field"]]= $obj["data"]["value"];
        }   
    }
    
    $this->load->database();
    $query = $this->db->query(" SELECT SQL_CALC_FOUND_ROWS
                    mcostcenter.CostName AS AssetCostcenter,
                    FORMAT(IFNULL(hasil.total, 0),0) AS TotalAsset,
                    FORMAT(IFNULL(hasil.scan, 0),0) AS AssetScanned,
                    IFNULL((total - scan),0) AS AssetNotScan
            FROM mcostcenter
            LEFT JOIN 
                    (SELECT 
                    AssetCostcenter,
                    masset.AssetNo,
                    COUNT(*) AS total,
                    COUNT(assetopname.Assetno) AS scan
                    FROM masset
                    LEFT JOIN assetopname
                            ON assetopname.Assetno = masset.AssetNo
                    GROUP BY AssetCostcenter
                    ) AS hasil
                    ON hasil.AssetCostcenter = mcostcenter.CostName

            GROUP BY mcostcenter.CostName
            LIMIT ". $start ."," .$limit);
        
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
                    mcostcenter.CostName AS AssetCostcenter,
                    FORMAT(IFNULL(hasil.total, 0),0) AS TotalAsset,
                    FORMAT(IFNULL(hasil.scan, 0),0) AS AssetScanned,
                    IFNULL((total - scan),0) AS AssetNotScan
            FROM mcostcenter
            LEFT JOIN 
                    (SELECT 
                    AssetCostcenter,
                    masset.AssetNo,
                    COUNT(*) AS total,
                    COUNT(assetopname.Assetno) AS scan
                    FROM masset
                    LEFT JOIN assetopname
                            ON assetopname.Assetno = masset.AssetNo
                    GROUP BY AssetCostcenter
                    ) AS hasil
                    ON hasil.AssetCostcenter = mcostcenter.CostName

            GROUP BY mcostcenter.CostName");
        
                        //return $db->last_query();
        
                        //return $db->last_query();
         return $query->result_array();     

    } 
}
