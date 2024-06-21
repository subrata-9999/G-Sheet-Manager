<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Student_model extends CI_Model
{

    // Model method to check if a mobile number exists
    public function checkMobileNumberExists($mobileNumber)
    {
        // Assuming you have a database table named 'students'
        $query = $this->db->get_where('student', ['student_mobile' => $mobileNumber]);

        // Return true if the mobile number exists, false otherwise
        return ($query->num_rows() > 0);
    }

    public function checkMailExists($mail)
    {
        // Assuming you have a database table named 'students'
        $query = $this->db->get_where('student', ['student_email' => $mail]);

        // Return true if the mobile number exists, false otherwise
        return ($query->num_rows() > 0);
    }

    public function is_student_id_exists($student_id)
    {
        $this->db->select('student_id');
        $this->db->from('student');
        $this->db->where('student_id', $student_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_student($data)
    {
        $this->db->insert('student', $data);
    }

    public function payment_method()
    {
        $query = $this->db->get_where('option_for', array('option_name' => 'payment_method'));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }


    public function getStudentDetails($searchTerm) {
        // Query the database to get student details based on search term
        $this->db->select('*');
        $this->db->like('student_id', $searchTerm);
        $this->db->or_like('student_name', $searchTerm);
        $this->db->or_like('student_email', $searchTerm);
        $this->db->or_like('student_mobile', $searchTerm);

        

        $query = $this->db->get('student');

        return $query->result(); // Assuming you expect only one result
    }

    public function getstudentbyid($s_id){
        $this->db->select('*');
        $this->db->where('student_id',$s_id);
        $query = $this->db->get('student');

        return $query->result();

    }
    public function updatestudent($s_id, $data){
        $this->db->where('student_id', $s_id);
        $this->db->update('student', $data);

        return $this->db->affected_rows() > 0;
    }
}
