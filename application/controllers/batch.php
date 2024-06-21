<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Batch extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('Task_model');
        $this->load->model('Expenses_model');
        $this->load->library('session');
        $this->load->helper('access_helper');
        $this->load->helper('time_helper');
    }
    public function Allbatch()
    {
        $this->load->model('Batch_model');
        $data['batch'] = $this->Batch_model->all_batch();
        $this->load->view('allbatch', $data);
    }

    public function Addbatch()
    {
        $this->load->model('Batch_model');
        $this->load->model('Course_model');
        $data['course'] = $this->Course_model->allcourse();
        $this->load->view('addbatch',$data);
    }
    public function add_batch()
    {
        $this->load->model('Batch_model');


        $current_batch_array = $this->Batch_model->all_batch();
        
        //$batchid = $this->input->post('batchid');
        $batchName = $this->input->post('batchname');
        $startDate = $this->input->post('startdate');
        $batchCourse = $this->input->post('batchcourse');
        $batchstart = $this->input->post('batchstart');
        $batchend = $this->input->post('batchend');


        $new_batch_data = [$batchName => [$batchName, $batchCourse, $startDate,$batchstart,$batchend]];

        $updated_batch_array = array_merge($current_batch_array, $new_batch_data);

        $updated_json = json_encode($updated_batch_array);
        
        $this->Batch_model->updatebatch($updated_json);

        redirect('admin/Allbatch');
    }
}
