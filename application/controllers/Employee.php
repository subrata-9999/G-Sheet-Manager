<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
class Employee extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('session');
        $this->load->model('Task_model');
        $this->load->helper('time_helper');

     }
    public function index() {
        $this->load->library('session');
        // $user_data = $this->session->userdata('user_data');
        // $user_id = $user_data['id'];
        // $user_role = $user_data['role'];

        // Get tasks based on user role
        $data['user_id'] = $this->session->user_id;
        $data['username'] = $this->session->username;
        $data['user_designation'] = $this->session->role;
        $data['name'] = $this->session->name ? $this->session->name : "NO NAME Found";


        

        if($this->session->role === "employee"){
            $data['tasks_to_you'] = $this->Task_model->show_task_to_employee($this->session->user_id);
            $this->load->view('dashboard', $data);
        }
        else{
            // echo "Savdasv"; exit;
            $login_url = base_url('index.php/login');
            header("Location: $login_url");
        }
        

    }

}
