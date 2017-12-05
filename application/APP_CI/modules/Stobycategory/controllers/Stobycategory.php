<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stobycategory extends MX_Controller {

    public function index()
    {
       $this->load->view('V_stobycategory');
    }
    
    public function read(){
        $this->load->model('R_stobycategory');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = array();
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_stobycategory->load_default($start,$limit,$filter));
        
    }
    
    public function exportExcel(){
        $this->load->model('R_stobycategory');
        $data['query'] = $this->R_stobycategory->exportData();
        $this->load->view('vexcel', $data);
    }
            
}
