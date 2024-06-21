<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Task extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('Task_model');
        $this->load->library('session');
        $this->load->helper('access_helper');
        $this->load->helper('time_helper');
    }
    public function view($sheetId)
    {
        // Load the sheet details based on $sheetId
        $data['user_data'] = $this->Task_model->get_all_users();
        $data['sheet'] = $this->Task_model->get_task_by_id($sheetId);
        $data['all_employees'] = $this->Task_model->getEmployees();
        $data['all_managers'] = $this->Task_model->getManagers();
        $data['manager_employees'] = $this->Task_model->getManagerEmployees();
        $data['tasks'] = $this->Task_model->getAllTasks($this->session->user_id);
        // Load the sheet_view with the data
        $this->load->view('sheet_view', $data);
    }


    public function addTask()
    {
        check_access();


        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
        $data['all_employees'] = $this->Task_model->getEmployees();
        $data['all_managers'] = $this->Task_model->getManagers();
        $data['manager_employees'] = $this->Task_model->getManagerEmployees();
        $data['tasks'] = $this->Task_model->getAllTasks($this->session->user_id);
        $this->load->view('add_sheet', $data);
        }else{
            redirect('task/accessDenied');
        }
    }
    public function add_Task()
    {
        check_access();


        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            $data = array(

                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'link' => $this->input->post('sheet_link'),
                'assigned_by' => $this->input->post('assigned_by'),
                'assigned_date' => date('Y-m-d H:i:s'),
                'deadline' => $this->input->post('deadline'),
                'assigned_to' => $this->input->post('assigned_to_employees'),
            );

            // Load the Task_model
            $this->load->model('Task_model');

            // Add task
            $this->Task_model->addTask($data);

            // Redirect back to the employee dashboard
            redirect($this->session->role . '/dashboard');
        } else {
            // echo "accessDenied";
            // exit;
            // redirect('manager/dashboard');
            redirect('task/accessDenied');
        }
    }

    public function addMember()
    {
        $this->load->library('session');
        $data['all_employees'] = $this->Task_model->getEmployees();
        $data['all_managers'] = $this->Task_model->getManagers();
        $data['manager_employees'] = $this->Task_model->getManagerEmployees();
        $data['tasks'] = $this->Task_model->getAllTasks($this->session->user_id);
        $this->load->view('add_Member', $data);
    }
    public function add_Member()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => $this->input->post('role'),
                'name' => $this->input->post('name'),
            );
            // Load the Task_model
            $this->load->model('Task_model');

            // Add Member
            $this->Task_model->addMember($data);

            // Redirect back to the admin dashboard
            redirect('admin/dashboard');
        } else {

            redirect('task/accessDenied');
        }
    }



    public function allEmployee()
    {
        check_access();
        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            $data['all_employees'] = $this->Task_model->getEmployees();
            $this->load->view('all_employee', $data);
        } else {
            redirect('task/accessDenied');
        }
    }
    public function allManager()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            $this->load->library('session');
            $data['all_managers'] = $this->Task_model->getManagers();
            $this->load->view('all_manager', $data);
        } else {
            redirect('task/accessDenied');
        }
    }





    public function editTask($sheetId)
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            // Load the sheet details based on $sheetId
            $data['user_data'] = $this->Task_model->get_all_users();
            $data['sheet'] = $this->Task_model->get_task_by_id($sheetId);
            $data['all_employees'] = $this->Task_model->getEmployees();
            $data['all_managers'] = $this->Task_model->getManagers();
            $data['manager_employees'] = $this->Task_model->getManagerEmployees();
            $data['tasks'] = $this->Task_model->getAllTasks($this->session->user_id);

            // Load the sheet_view with the data
            $this->load->view('edit_sheet', $data);
        } else {
            redirect('task/accessDenied');
        }
    }

    public function updateTask($task_id)
    {
        // Assuming form submission and validation

        $data = array(
            'title' => $this->input->post('edittitle'),
            'description' => $this->input->post('editdescription'),
            'link' => $this->input->post('editsheet_link'),
            'assigned_to' => $this->input->post('editassigned_to'),
            'deadline' => $this->input->post('editdeadline'),
        );

        // Load the Task_model
        $this->load->model('Task_model');

        // Edit task
        $this->Task_model->updateTask($task_id, $data);

        // Redirect back to the user dashboard
        if ($this->session->role == 'manager') {
            redirect('manager/dashboard');
        } else if ($this->session->role == 'admin') {
            redirect('admin/dashboard');
        }
    }

    public function Assignedsheettoemployee()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            $this->load->library('session');
            $data['all_employees'] = $this->Task_model->getEmployees();
            $data['all_managers'] = $this->Task_model->getManagers();
            $data['manager_employees'] = $this->Task_model->getManagerEmployees();
            $data['tasks'] = $this->Task_model->getAllTasks($this->session->user_id);
            $this->load->view('task_to_manager', $data);
        } else {
            redirect('task/accessDenied');
        }
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

            // Redirect back to the user dashboard
            if ($this->session->role == 'manager') {
                redirect('manager/Assignedsheettoemployee');
            } else if ($this->session->role == 'admin') {
                redirect('admin/dashboard');
            }
        } else {
            // echo "accessDenied";
            // exit;
            // redirect('manager/dashboard');
            redirect('task/accessDenied');
        }
    }


    public function editMember($member_id){
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
        $data['details_of_user'] = $this->Task_model->get_member_by_id($member_id);
        $this->load->view('edit_member', $data);
        }else{
            redirect('task/accessDenied');
        }
    }
    public function updateMember($user_id)
    {
        // Assuming form submission and validation
        if (!empty($this->input->post('editpassword'))) {
            $data = array(
                'name' => $this->input->post('editname'),
                'username' => $this->input->post('editusername'),
                'password' => md5($this->input->post('editpassword')),
                'role' => $this->input->post('editrole'),
            );
        }else{
            $data = array(
                'name' => $this->input->post('editname'),
                'username' => $this->input->post('editusername'),
                // 'password' => $this->input->post('editpassword'),
                'role' => $this->input->post('editrole'),
            );
        }

        

        // Load the Task_model
        $this->load->model('Task_model');

        // Edit task
        $this->Task_model->updateMember($user_id, $data);
        redirect('admin/dashboard');
    }
    public function deleteMember($user_id){
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
        $this->Task_model->deleteMember($user_id);
        redirect('admin/dashboard');
        }else{
            redirect('task/accessDenied');
        }
    }



    public function accessDenied()
    {
        $this->load->view('accessDenied');
    }

    
}
