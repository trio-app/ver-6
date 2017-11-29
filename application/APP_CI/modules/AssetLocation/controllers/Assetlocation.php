<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assetlocation extends MX_Controller {

    public function index()
    {
       $this->load->view('V_assetlocation');
    }
    
    public function read(){
        $this->load->model('R_assetlocation');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_assetlocation->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_assetlocation');
        $hasil = $this->C_assetlocation->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_assetlocation');
        $hasil =  $this->U_assetlocation->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_assetlocation');
        $hasil =  $this->D_assetlocation->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_assetlocation');
        header('Content-type: application/json');
        print_r($this->R_assetlocation->cbolist());
    }
            
}
