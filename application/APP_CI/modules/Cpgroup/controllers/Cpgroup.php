<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpgroup extends MX_Controller {

    public function index()
    {
       $this->load->view('V_cpgroup');
    }
    
    public function read(){
        $this->load->model('R_cpgroup');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_cpgroup->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_cpgroup');
        $hasil = $this->C_cpgroup->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_cpgroup');
        $hasil =  $this->U_cpgroup->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_cpgroup');
        $hasil =  $this->D_cpgroup->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_cpgroup');
        header('Content-type: application/json');
        print_r($this->R_cpgroup->cbolist());
    }
            
}
