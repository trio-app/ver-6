<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stobylocation extends MX_Controller {

    public function index()
    {
       $this->load->view('V_stobylocation');
    }
    
    public function read(){
        $this->load->model('R_stobylocation');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_stobylocation->load_default($start,$limit,$filter));
        
    }
    
    public function exportExcel(){
        $this->load->model('R_stobylocation');
        $data['query'] = $this->R_stobylocation->exportData();
        $this->load->view('V_excel', $data);
    }
            
}
