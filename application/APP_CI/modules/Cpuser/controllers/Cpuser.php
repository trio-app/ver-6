<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpuser extends MX_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('date');
    }
    
    public function index()
    {
       $this->load->view('V_cpuser');
    }
    
    public function read(){
        $this->load->model('R_cpuser');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_cpuser->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_cpuser');
        $hasil = $this->C_cpuser->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_cpuser');
        $hasil =  $this->U_cpuser->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_cpuser');
        $hasil =  $this->D_cpuser->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_cpuser');
        header('Content-type: application/json');
        print_r($this->R_cpuser->cbolist());
    }
            
}
