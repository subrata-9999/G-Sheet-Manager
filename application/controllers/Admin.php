<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('Task_model');
        $this->load->library('session');
        $this->load->helper('time_helper');
    }
    public function index()
    {
        $this->load->library('session');
        // $user_data = $this->session->userdata('user_data');
        // $user_id = $user_data['id'];
        // $user_role = $user_data['role'];

        // Get tasks based on user role
        $data['user_id'] = $this->session->user_id;
        $data['username'] = $this->session->username;
        $data['user_designation'] = $this->session->role;
        $data['scope'] = $this->session->scope;
        $data['name'] = $this->session->name ? $this->session->name : "NO NAME Found";




        if ($this->session->role === "admin") {
        
            $data['tasks'] = $this->Task_model->show_task_to_manager($this->session->user_id);
            $this->load->view('dashboard', $data);
        } else {
            // echo "Savdasv"; exit;
            // $login_url = base_url('index.php/login');
            // header("Location: $login_url");
            redirect('task/accessDenied');
        }
    }

    public function getAllTasks()
    {
        $data['tasks'] = $this->Task_model->get_all_tasks();

        // Pass the data to a view or handle it as needed
        $this->load->view('admin_dashboard', $data);
    }
    public function getAllUser()
    {
        $data['user'] = $this->Task_model->get_all_users();

        // Pass the data to a view or handle it as needed
        $this->load->view('admin_dashboard', $data);
    }

    // public function addMember()
    // {
    //     check_access();

    //     $this->load->library('session');
    //     $this->load->helper('access_helper');

    //     // Assuming form submission and validation
    //     if (check_access()) {
    //         $data = array(
    //             'username' => $this->input->post('username'),
    //             'password' => $this->input->post('password'),
    //             'role' => $this->input->post('role'),
    //             'name' => $this->input->post('name'),
    //         );
    //         // Load the Task_model
    //         $this->load->model('Task_model');

    //         // Add Member
    //         $this->Task_model->addMember($data);

    //         // Redirect back to the admin dashboard
    //         redirect('admin/dashboard');
    //     }else{

    //         redirect('task/accessDenied');

    //     }
    // }


    // public function addTask()
    // {
    //     check_access();

    //     $this->load->library('session');
    //     $this->load->helper('access_helper');

    //     // Assuming form submission and validation
    //     if (check_access()) {
    //         $data = array(

    //             'title' => $this->input->post('title'),
    //             'description' => $this->input->post('description'),
    //             'link' => $this->input->post('sheet_link'),
    //             'assigned_by' => $this->input->post('assigned_by'),
    //             'assigned_date' => date('Y-m-d H:i:s'),
    //             'deadline' => $this->input->post('deadline'),
    //             'assigned_to' => $this->input->post('assigned_to_employees'),
    //         );

    //         // Load the Task_model
    //         $this->load->model('Task_model');

    //         // Add task
    //         $this->Task_model->addTask($data);

    //         // Redirect back to the employee dashboard
    //         redirect('admin/dashboard');
    //     } else {
    //         redirect('task/accessDenied');
    //     }
    // }
}
