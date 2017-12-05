<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_tassetprint extends CI_Model {

function load_default($start,$limit,$filter){
    $dtfilter = json_decode($filter,true);
    //print_r($dtfilter[0]['value']);
    $this->load->database();
    $this->db->select(' SQL_CALC_FOUND_ROWS masset.*
                    ',FALSE);
    $this->db->from('masset');
    $this->db->where("masset.AssetID <>", 0);
    $this->db->like('masset.AssetInfo',$dtfilter[0]['value']['AssetInfo']); 
    $this->db->like('masset.AssetGroup',$dtfilter[0]['value']['AssetGroup']);
    $this->db->like('masset.AssetCategory',$dtfilter[0]['value']['AssetCategory']);
    $this->db->group_start();
    $this->db->or_like('masset.AssetName',$dtfilter[0]['value']['AssetKey']); 
    $this->db->or_like('masset.AssetNo',$dtfilter[0]['value']['AssetKey']);
    $this->db->or_like('masset.AssetKey',$dtfilter[0]['value']['AssetKey']);
    $this->db->group_end();
    $this->db->limit($limit,$start);
    $this->db->order_by("masset.AssetID","DESC");
    $query = $this->db->get();
                    //return $this->db->last_query();
    $rows = $query->result_array();


    $query2 = $this->db->query('SELECT FOUND_ROWS() AS hasil');
    $count = $query2->row('hasil');

    $data = array(
                'TotalRows' => $count,
                    'Rows' => $rows
                 );
    return json_encode($data);   

}

    
}
