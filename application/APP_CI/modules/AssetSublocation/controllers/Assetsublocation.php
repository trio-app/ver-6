<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssetC extends MX_Controller {

    public function index()
    {
       $this->load->view('V_assetsublocation');
    }
    
    public function read(){
        $this->load->model('R_assetsublocation');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_assetsublocation->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_assetsublocation');
        $hasil = $this->C_assetsublocation->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_assetsublocation');
        $hasil =  $this->U_assetsublocation->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_assetsublocation');
        $hasil =  $this->D_assetsublocation->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_assetsublocation');
        header('Content-type: application/json');
        print_r($this->R_assetsublocation->cbolist());
    }
            
}
