<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_assetgroup extends CI_Model {

function load_default($start,$limit,$filter){
    $keyfilter = array();
    if (is_array($filter)){
        foreach($filter as $obj){
            $keyfilter[$obj["field"]]= $obj["data"]["value"];
        }   
    }
    //print_r($keyfilter);
    $this->load->database();
    $this->db->select(' SQL_CALC_FOUND_ROWS masset.*
                    ',FALSE);
    $this->db->from('masset');
    $this->db->where("masset.AssetID <>", 0);
    $this->db->like($keyfilter);   
    $this->db->limit($limit,$start);
    $this->db->order_by("masset.AssetID","DESC");
     $query = $this->db->get();
                    //return $db->last_query();
    $rows = $query->result_array();

    return $rows;   

    }

    
}
