<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stobygroup extends MX_Controller {

    public function index()
    {
       $this->load->view('V_stobygroup');
    }
    
    public function read(){
        $this->load->model('R_stobygroup');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_stobygroup->load_default($start,$limit,$filter));
        
    }
    
    public function exportExcel(){
        $this->load->model('R_stobygroup');
        $data['query'] = $this->R_stobygroup->exportData();
        $this->load->view('V_excel', $data);
    }
            
}
