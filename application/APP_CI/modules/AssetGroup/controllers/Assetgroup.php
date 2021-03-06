<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assetgroup extends MX_Controller {

    public function index()
    {
       $this->load->view('V_assetgroup');
    }
    
    public function read(){
        $this->load->model('R_assetgroup');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_assetgroup->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_assetgroup');
        $hasil = $this->C_assetgroup->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_assetgroup');
        $hasil =  $this->U_assetgroup->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_assetgroup');
        $hasil =  $this->D_assetgroup->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_assetgroup');
        header('Content-type: application/json');
        print_r($this->R_assetgroup->cbolist());
    }
            
}
