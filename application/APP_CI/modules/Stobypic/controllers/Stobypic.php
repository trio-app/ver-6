<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stobypic extends MX_Controller {

    public function index()
    {
       $this->load->view('V_stobypic');
    }
    
    public function read(){
        $this->load->model('R_stobypic');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_stobypic->load_default($start,$limit,$filter));
        
    }
    
    public function exportExcel(){
        $this->load->model('R_stobypic');
        $data['query'] = $this->R_stobypic->exportData();
        $this->load->view('V_excel', $data);
    }
            
}
