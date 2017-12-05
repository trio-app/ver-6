<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stobycostcenter extends MX_Controller {

    public function index()
    {
       $this->load->view('V_stobycostcenter');
    }
    
    public function read(){
        $this->load->model('R_stobycostcenter');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_stobycostcenter->load_default($start,$limit,$filter));
        
    }
    
    public function exportExcel(){
        $this->load->model('R_stobycostcenter');
        $data['query'] = $this->R_stobycostcenter->exportData();
        $this->load->view('vexcel', $data);
    }
            
}
