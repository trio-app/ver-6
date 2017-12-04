<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_assetcategory extends CI_Model {

function load_default($start,$limit,$filter){
    $keyfilter = array();
    if (is_array($filter)){
        foreach($filter as $obj){
            $keyfilter[$obj["field"]]= $obj["data"]["value"];
        }   
    }
    //print_r($keyfilter);
    $this->load->database();
    $this->db->select(' SQL_CALC_FOUND_ROWS mcategory.*
                    ',FALSE);
    $this->db->from('mcategory');
    $this->db->where("mcategory.CategoryID <>", 0);
    $this->db->like($keyfilter);   
    $this->db->limit($limit,$start);
    $this->db->order_by("mcategory.CategoryID","DESC");
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
function cbolist(){
    $this->load->database();
    $this->db->select(' mcategory.*
                    ',FALSE);
    $this->db->from('mcategory');
    $this->db->where("mcategory.CategoryID <>", 0);
    $query = $this->db->get();
    $rows = $query->result_array();
    return json_encode($rows);   
    
}
    
}