<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assetcost extends MX_Controller {

    public function index()
    {
       $this->load->view('V_assetcost');
    }
    
    public function read(){
        $this->load->model('R_assetcost');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_assetcost->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_assetcost');
        $hasil = $this->C_assetcost->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_assetcost');
        $hasil =  $this->U_assetcost->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_assetcost');
        $hasil =  $this->D_assetcost->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_assetcost');
        header('Content-type: application/json');
        print_r($this->R_assetcost->cbolist());
    }
            
}
