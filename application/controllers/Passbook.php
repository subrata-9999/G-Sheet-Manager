<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Passbook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('Task_model');
        $this->load->model('Passbook_model');
        $this->load->library('session');
        $this->load->helper('access_helper');
        $this->load->helper('time_helper');
    }

    public function passbook_dashboard()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        check_access();
        
        $maximum_record = $this->Passbook_model->maximum_income_and_expenses();
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');



        if (!empty($startDate) && !empty($endDate)) {
            $maximum_record_in_range = $this->Passbook_model->maximum_income_and_expenses_in_range($startDate, $endDate);

            $data = [
                'all_expenses_data' => $this->Passbook_model->all_expenses_data_in_range($startDate, $endDate),
                'all_income_data' => $this->Passbook_model->all_income_data_in_range($startDate, $endDate),
                'all_expenses_and_income' => $this->Passbook_model->all_expenses_and_income_in_range($startDate, $endDate),
                'maximum_income_amount' => $maximum_record_in_range['maximum_income_amount'],
                'maximum_income_type' => $maximum_record_in_range['maximum_income_type'],
                'maximum_expenses_amount' => $maximum_record_in_range['maximum_expenses_amount'],
                'maximum_expenses_type' => $maximum_record_in_range['maximum_expenses_type'],
                'total_income' => $maximum_record_in_range['total_income'],
                'total_expenses' => $maximum_record_in_range['total_expenses'],
                'start_date' => $startDate,
                'end_date' => $endDate,

            ];


        } else {

            $data = [
                'all_expenses_data' => $this->Passbook_model->all_expenses_data(),
                'all_income_data' => $this->Passbook_model->all_income_data(),
                'all_expenses_and_income' => $this->Passbook_model->all_expenses_and_income(),
                'maximum_income_amount' => $maximum_record['maximum_income_amount'],
                'maximum_income_type' => $maximum_record['maximum_income_type'],
                'maximum_expenses_amount' => $maximum_record['maximum_expenses_amount'],
                'maximum_expenses_type' => $maximum_record['maximum_expenses_type'],
                'total_income' => $maximum_record['total_income'],
                'total_expenses' => $maximum_record['total_expenses'],



            ];
        }


        $this->load->view('passbook', $data);
    }
}
