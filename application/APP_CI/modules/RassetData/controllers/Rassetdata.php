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
    public function exportAsset(){
        $this->load->model('Rreportasset');
        $data['query'] = $this->Rreportasset->load_default();
        $this->load->view('vexcel', $data);
    }

}