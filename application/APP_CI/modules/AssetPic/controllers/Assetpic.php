<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assetpic extends MX_Controller {

    public function index()
    {
       $this->load->view('V_assetpic');
    }
    
    public function read(){
        $this->load->model('R_assetpic');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_assetpic->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_assetpic');
        $hasil = $this->C_assetpic->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_assetpic');
        $hasil =  $this->U_assetpic->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_assetpic');
        $hasil =  $this->D_assetpic->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_assetpic');
        header('Content-type: application/json');
        print_r($this->R_assetpic->cbolist());
    }
            
}
