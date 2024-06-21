<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Course_model extends CI_Model
{
    public function allcourse(){
        $query = $this->db->get('course');
        return $query->result_array();
    }

    public function add_course($data){
        $this->db->insert('course', $data);
    }

}