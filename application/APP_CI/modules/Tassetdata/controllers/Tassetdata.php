<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tassetdata extends MX_Controller {

    public function index()
    {
       $this->load->view('V_tassetdata');
    }
    
    public function read(){
        $this->load->model('R_tassetdata');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_tassetdata->load_default($start,$limit,$filter));
        
    }
    public function create(){        
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('C_tassetdata');
        $this->C_tassetdata->insertDT(json_decode($jsonData,true));
            
    }
    public function update(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('U_tassetdata');
        $this->U_tassetdata->updateDT(json_decode($jsonData,true));
    }
    public function delete(){
        $jsonData =  file_get_contents("php://input");        
        $this->load->model('D_tassetdata');
        $this->D_tassetdata->deleteDT(json_decode($jsonData,true));
    }
            
}
