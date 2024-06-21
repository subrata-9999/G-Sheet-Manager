<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Task_model extends CI_Model
{
    public function show_task_to_employee($user_id)
    {
        // return $this->db->get_where('tasks', ['assigned_to' => $user_id])->result_array();
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->where("FIND_IN_SET('$user_id', assigned_to) > 0");
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function show_task_to_manager($user_id)
    {
        return $this->db->get_where('tasks', ['assigned_by' => $user_id])->result_array();
    }

    public function addTask($data)
    {
        $this->db->insert('tasks', $data);
    }

    public function get_all_tasks()
    {
        // Fetch all tasks from the 'tasks' table
        $query = $this->db->get('tasks');
        return $query->result_array();
    }

    public function get_all_users()
    {
        // Fetch all tasks from the 'tasks' table
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function addMember($data)
    {
        $this->db->insert('users', $data);
    }

    public function get_task_by_id($task_id)
    {

        return $this->db->get_where('tasks', ['id' => $task_id])->row_array();
    }
    public function get_member_by_id($user_id)
    {
        return $this->db->select('*')
            ->where('id', $user_id)
            ->get('users')
            ->row_array();
    }
    public function updateMember($user_id, $data)
    {
        $this->db->where('id', $user_id);
        if ($this->db->update('users', $data)) {
            // Update successful
            return true;
        } else {
            // Update failed
            echo $this->db->error(); // Display the database error
            return false;
        }
    }

    public function deleteMember($user_id){

        $data = array(
            'user_type' => '0'
        );
    
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);


    }

    // public function edit_task($task_id, $data) {
    //     $this->db->where('id', $task_id);
    //     $this->db->update('tasks', $data);
    // }

    public function deleteTask($task_id)
    {
        $this->db->delete('tasks', ['id' => $task_id]);
    }

    public function updateTask($task_id, $data)
    {
        $this->db->where('id', $task_id);
        if ($this->db->update('tasks', $data)) {
            // Update successful
            return true;
        } else {
            // Update failed
            echo $this->db->error(); // Display the database error
            return false;
        }
    }



    public function getEmployees()
    {
        return $this->db->select('*')
            ->where('role', 'employee')
            ->get('users')
            ->result_array();
    }

    public function getManagers()
    {
        return $this->db->select('*')
            ->where('role', 'manager')
            ->get('users')
            ->result_array();
    }

    public function getManagerEmployees()
    {
        return $this->db->select('*')
            ->where_in('role', ['employee', 'manager'])
            ->get('users')
            ->result_array();
    }


    public function getAllTasks($user_id)
    {
        return $this->db->select('*')
            ->where('assigned_by', $user_id)
            ->get('tasks')
            ->result_array();
    }



    // public function pagemapping(){
    //     return $this->db->select('options_list')
    //         ->where('option_name', 'shortcut')
    //         ->get('option_for')
    //         ->row_array();
    // }
    
}
