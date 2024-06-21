<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Course extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('access_helper');
        $this->load->helper('time_helper');
        $this->load->model('Course_model');
    }

    public function Allcourse(){
        $data['course'] = $this->Course_model->allcourse();
        // echo '<pre>';
        // print_r($course);
        // echo exit;
        $this->load->view('allcourse', $data);
    }

    public function Addcourse(){
        $data['course'] = $this->Course_model->allcourse();
        $this->load->view('addcourse', $data);
    }
    
    public function add_course(){
        $data = array(
            'course_name' => $this->input->post('coursename'),
            'course_fees' => $this->input->post('coursefees'),
        );
        $this->Course_model->add_course($data);
        redirect('admin/Allcourse');
    }
}