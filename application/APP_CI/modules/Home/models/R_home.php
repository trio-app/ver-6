<?php

class R_home extends CI_Model {

    function menujs(){
         
                $this->load->database();
                $this->db->select(' cpmenu.*
				',FALSE);
                $this->db->from('cpmenu');
                $this->db->order_by('cpmenu.menuShort','ASC');
                $query = $this->db->get();
                $rows = $query->result_array();
                
                $parrent = array();
                $hasbol = false;
                foreach ($rows as $key => $value) {
                    if($value["menuExpand"]=='true')
                            {
                            $hasbol =  true;
                            
                        }else{
                            $hasbol = false;
                            }; // ,
                    $parrent[]= array(
                        "text"=>$value["menuName"],
                        'expanded'=>$hasbol,
                        'children' => $this->menuchild($value["menuName"])
                    );
                }
               
                
                return json_encode($parrent);   
        //return str_replace('"', "'", $this->sample2());   

    }
    function menuchild($menuparrent){
        $this->load->database();
        $this->db->select(' cpmenudetail.*
                        ',FALSE);
        $this->db->from('cpmenudetail');
        $this->db->order_by('cpmenudetail.menuShort','ASC');
        $this->db->where('menuParrent',$menuparrent);
        $query = $this->db->get();
        $rows = $query->result_array();
        
        $arrchild = array();
        foreach ($rows as $key => $value) {
                    $arrchild[]= array(
                        "text"=>$value["menuDisplay"],
                        'id' => $value["menuControl"],
                        'leaf' => $value["menuLeaf"]
                    );
                }
        return $arrchild; 
    }

}