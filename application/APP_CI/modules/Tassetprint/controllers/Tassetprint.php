<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tassetprint extends MX_Controller {

    public function index()
    {
       $this->load->view('V_tassetprint');
    }
    
    public function read(){
        $this->load->model('R_tassetprint');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $filter = $this->input->post('filter');
        header('Content-type: application/json');
        print_r( $this->R_tassetprint->load_default($start,$limit,$filter));
        
    }
            
}
