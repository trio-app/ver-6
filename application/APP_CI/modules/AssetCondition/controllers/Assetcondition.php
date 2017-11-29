<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assetcondition extends MX_Controller {

    public function index()
    {
       $this->load->view('V_assetcondition');
    }
    
    public function read(){
        $this->load->model('R_assetcondition');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_assetcondition->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_assetcondition');
        $hasil = $this->C_assetcondition->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_assetcondition');
        $hasil =  $this->U_assetcondition->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_assetcondition');
        $hasil =  $this->D_assetcondition->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_assetcondition');
        header('Content-type: application/json');
        print_r($this->R_assetcondition->cbolist());
    }
            
}
