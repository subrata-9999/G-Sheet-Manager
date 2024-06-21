<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Batch_model extends CI_Model
{
    public function all_batch()
    {

        $query = $this->db->select('*')
            ->from('option_for')
            ->where('option_name', 'batch')
            ->get();

        $all_batch = $query->row();
        // echo '<pre>';
        // print_r($all_batch);
        if ($all_batch) {
            $batch = json_decode($all_batch->options_list, true);
            return $batch;
        } else {
            return;
        }
    }
    public function updatebatch($updated_json){
        $this->db
            ->set('options_list', $updated_json)
            ->where('option_name', 'batch')
            ->update('option_for');
    }
}
