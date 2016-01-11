<?php
class Test extends CI_Controller {

    public function index()
    {
        echo 'Hello World!';
    }
    
    public function view()
    {
    	$this->load->model('test_model');
    	$data['test'] = $this->test_model->get_test();
    	//$this->load->view('testview',$data);
    }
}