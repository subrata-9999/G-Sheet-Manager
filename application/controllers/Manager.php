<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('login_model');
        $this->load->library('session');
        $this->load->model('Task_model');
        $this->load->helper('access_helper');
        $this->load->helper('time_helper');
    }
    public function index() // default allowed method
    {
        $this->load->library('session');
        // $user_data = $this->session->userdata('user_data');
        // $user_id = $user_data['id'];
        // $user_role = $user_data['role'];

        // Get tasks based on user role
        $data['user_id'] = $this->session->user_id;
        $data['username'] = $this->session->username;
        $data['user_designation'] = $this->session->role;
        $data['name'] = $this->session->name ? $this->session->name : "NO NAME Found";

        if ($this->session->role === "manager") {
            $data['tasks'] = $this->Task_model->show_task_to_manager($this->session->user_id);
            $data['tasks_to_you'] = $this->Task_model->show_task_to_employee($this->session->user_id);
            $this->load->view('dashboard', $data);
        } else {
            // echo "dsvdsb d"; exit;
            // $login_url = base_url('index.php/login');
            // header("Location: $login_url");
            redirect('task/accessDenied');
        }
    }

    public function edit_task($task_id)
    {
        // Load the Task_model
        $this->load->model('Task_model');

        // Get task details
        $data['task'] = $this->Task_model->get_task_by_id($task_id);

        // Load the edit task form
        $this->load->view('employee_edit_task', $data);
    }

    public function updateTask($task_id)
    {
        // Assuming form submission and validation
        $data = array(
            'title' => $this->input->post('edittitle'),
            'description' => $this->input->post('editdescription'),
            'link' => $this->input->post('editsheet_link'),
            'deadline' => $this->input->post('editdeadline'),
        );

        // Load the Task_model
        $this->load->model('Task_model');

        // Edit task
        $this->Task_model->edit_task($task_id, $data);

        // Redirect back to the employee dashboard
        redirect('manager/dashboard');
    }

    public function deleteTask($task_id)
    {

        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            // Load the Task_model
            $this->load->model('Task_model');

            // Delete task
            $this->Task_model->deleteTask($task_id);

            // Redirect back to the employee dashboard
            redirect('manager/index');
        } else {
            // echo "accessDenied";
            // exit;
            // redirect('manager/dashboard');
            redirect('task/accessDenied');
        }
    }
}
