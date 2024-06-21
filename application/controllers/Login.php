<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('login_model'); // Load the login_model
   }

   public function index()
   {
      if ($this->session->user_id) {
         redirect($this->session->role . '/dashboard');
      } else {
         $this->load->view('login');
      }
   }

   // public function process_login()
   // {


   //    $username = $this->input->post('username');
   //    $password = $this->input->post('password');

   //    // Call the login model to check user credentials
   //    $result = $this->login_model->validate_user($username, $password);


   //    if ($result) {
   //       $this->load->library('session');
   //       $this->session->set_userdata('user_id', $result['user_id']);
   //       $this->session->set_userdata('user_data', $result);
   //       $this->session->set_userdata('username', $username);

   //       $user_role = $result['role'];
   //       $this->session->set_userdata('role_of_member', $user_role);
   //       echo $user_role;
   //       $query = $this->db->select('*')
   //       ->from('scope')
   //       ->where('role', $user_role)
   //       ->get();

   //       $all_scope = $query->row();
   //       $allowed_methods = json_decode($all_scope->role_scope);
   //    //    Array (
   //    //       [manager] => Array (
   //    //           [0] => addTask
   //    //           [1] => deleteTask
   //    //           [2] => editTask
   //    //       )
   //    //       [task] => Array (
   //    //           [0] => viewTask
   //    //       )
   //    //   )

   //       $this->session->set_userdata('methods', $allowed_methods);



   //       $redirect_url = '';

   //       if ($user_role === "employee") {
   //          $redirect_url = 'employee/dashboard'; //employee/index
   //       }
   //       if ($user_role === "manager") {
   //          $redirect_url = 'manager/dashboard'; //manager/index
   //       }
   //       if ($user_role === "admin") {
   //          $redirect_url = 'admin/dashboard'; //
   //       }

   //       redirect($redirect_url);
   //    } else {
   //       // Failed login
   //       $this->session->set_flashdata('error_message', 'Invalid username or password');
   //       redirect('login');
   //    }
   // }

   public function process_login()
   {
      $this->load->model('Task_model');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $result = $this->login_model->validate_user($username, $password);

      if ($result) {
         $query = $this->db->select('*')
            ->from('scope')
            ->where('role', $result['role'])
            ->get();

         $all_scope = $query->row();
         $scope = json_decode($all_scope->role_scope, true);

         // $query1 = $this->db->select('*')
         //    ->from('option_for')
         //    ->where('option_name', 'shortcut')
         //    ->get();
         // $all_shortcut = $query1->row();
         // $shortcut = json_decode($all_shortcut->options_list, true);
         // echo "<pre>";
         // print_r($all_scope); exit;
         // echo "</pre>";
         $this->session->set_userdata([
            "user_id" => $result['id'],
            "name" => $result['name'],
            "username" => $result['username'],
            "role" => $result['role'],
            "scope" => $scope,
            // "shortcutOptions" => $shortcut,

         ]);

         // echo '<pre>';
         // print_r($_SESSION); exit;
         $redirect_url = '';

         if ($result['role'] === "employee") {
            $redirect_url = 'employee/dashboard'; //employee/index
         }
         if ($result['role'] === "manager") {
            $redirect_url = 'manager/dashboard'; //manager/index
         }
         if ($result['role'] === "admin") {
            $redirect_url = 'admin/dashboard'; //
         }
         // echo $redirect_url;
         // exit;
         redirect($redirect_url);

         // $user_id = $result['id'];
         // $username = $result['username'];
         // $name = $result['name'];
         // $role = $result['role'];
         // $this->session->set_userdata('role', $role);
         // $this->session->set_userdata('name', $name);
         // $this->session->set_userdata('username', $username);
         // $this->session->set_userdata('user_data', $result);


         // $allowed_methods = json_decode($all_scope->role_scope);
         // $this->session->set_userdata('methods', $allowed_methods);




      } else {
         // Failed login
         $this->session->set_flashdata('error_message', 'Invalid username or password');
         redirect('login');
      }
   }

   public function logout()
   {
      $this->load->library('session');
      $this->session->sess_destroy(); // Destroy the session

      // Redirect to the login page or any other page after logout
      redirect(base_url());
   }
}




// {"task":["viewTask"]}
// {"manager":["addTask","deleteTask","editTask"],"task":["viewTask"]}
// {"admin":["addTask","addEmployee","deleteTask","editTask"],"task":["viewTask"]}


