<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rassetdata extends MX_Controller {

    function __construct() {
        
    }
        public function index (){
            $this->load->view('V_rassetdata');
        }
        public function read(){
        $this->load->model('R_rassetdata');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_rassetdata->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_rassetdata');
        $hasil = $this->C_rassetdata->insertDT(json_decode($jsonData,true));
        print($hasil);
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_rassetdata');
        $hasil =  $this->U_rassetdata->updateDT(json_decode($jsonData,true));
        print($hasil);
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_rassetdata');
        $hasil =  $this->D_rassetdata->deleteDT(json_decode($jsonData,true));
        print($hasil);
        //print (json_decode($jsonData.data,true));
    }
    public function cbolist(){
        $this->load->model('R_rassetdata');
        header('Content-type: application/json');
        print_r($this->R_rassetdata->cbolist());
    }

}