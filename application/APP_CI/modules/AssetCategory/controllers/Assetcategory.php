<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assetcategory extends MX_Controller {

    function __construct() {
        
    }
        
    public function index (){
        $this->load->view('V_assetcategory');
    }
    
        public function read(){
        $this->load->model('R_assetcategory');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_assetcategory->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_assetcategory');
        $hasil = $this->C_assetcategory->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_assetcategory');
        $hasil =  $this->U_assetcategory->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_assetcategory');
        $hasil =  $this->D_assetcategory->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_assetcategory');
        header('Content-type: application/json');
        print_r($this->R_assetcategory->cbolist());
    }

}