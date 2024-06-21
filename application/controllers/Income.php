<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class income extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('Task_model');
        $this->load->model('income_model');
        $this->load->library('session');
        $this->load->helper('access_helper');
        $this->load->helper('time_helper');
    }
    public function Addincome()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            $this->load->library('session');
            $data['income_category'] = $this->income_model->show_income_category();
            $this->load->view('add_income', $data);
        } else {
            redirect('task/accessDenied');
        }
    }
    public function add_income()
    {
        $this->load->model('income_model');
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            if (!empty($this->input->post('custom_category'))) {

                $data = array(
                    'inc_name' => $this->input->post('budgetName'),
                    'inc_type' => strtolower($this->input->post('custom_category')),
                    'inc_amount' => $this->input->post('budgetAmount'),
                    'inc_remark' => $this->input->post('budgetRemarks'),
                    'inc_date' => $this->input->post('budgetDate'),
                );

                $a = $this->input->post('prevCategory');
                $b = strtolower($this->input->post('custom_category'));

                $arrayA = explode(',', $a);
                $arrayB = explode(',', $b);
                $elementsToAdd = array_diff($arrayB, $arrayA);
                $mergedArray = array_merge($arrayA, $elementsToAdd);
                $resultString = implode(',', $mergedArray);

                $data_cat = array(
                    'options_list' => $resultString,
                );
                $this->income_model->add_income_category($data_cat);
            } else {
                $data = array(
                    'inc_name' => $this->input->post('budgetName'),
                    'inc_type' => $this->input->post('budgetType'),
                    'inc_amount' => $this->input->post('budgetAmount'),
                    'inc_remark' => $this->input->post('budgetRemarks'),
                    'inc_date' => $this->input->post('budgetDate'),
                );
            }

            // Add task
            $this->income_model->add_income($data);

            // Redirect back to the employee dashboard
            redirect('admin/Incomedashboard');
        } else {

            redirect('task/accessDenied');
        }
    }

    public function income_dashboard()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            $this->load->model('income_model');
            $maximum_details = $this->income_model->maximum_income();
            $month_details = $this->income_model->income_of_month();

            // Retrieve POST data
            $startDate = $this->input->post('startDate');
            $endDate = $this->input->post('endDate');

            // Check if both startDate and endDate are present
            if (!empty($startDate) && !empty($endDate)) {
                // Print the values
                $maximum_details_in_range = $this->income_model->maximum_income_in_range($startDate, $endDate);

                $data = [
                    'all_category' => $this->income_model->all_income_category_name(),
                    'all_income_data' => $this->income_model->all_income_data_in_range($startDate, $endDate),
                    'total_income_by_category' => $this->income_model->total_income_by_category_in_range($startDate, $endDate),
                    'maximum_income_type' => $maximum_details_in_range['maximum_income_type'],
                    'maximum_income_amount' => $maximum_details_in_range['maximum_income_amount'],
                    'total_income_this_month' => $month_details['total_income_this_month'],
                    'total_income_last_month' => $month_details['total_income_last_month'],
                    'total_income_last_seven_days' => $month_details['total_income_last_seven_days'],
                    'percentage_by_category' => $this->income_model->calculate_percentage_by_category_in_range($startDate, $endDate),
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                ];
            } else {
                $data = [
                    'all_category' => $this->income_model->all_income_category_name(),
                    'all_income_data' => $this->income_model->all_income_data(),
                    'total_income_by_category' => $this->income_model->total_income_by_category(),
                    'maximum_income_type' => $maximum_details['maximum_income_type'],
                    'maximum_income_amount' => $maximum_details['maximum_income_amount'],
                    'total_income_this_month' => $month_details['total_income_this_month'],
                    'total_income_last_month' => $month_details['total_income_last_month'],
                    'total_income_last_seven_days' => $month_details['total_income_last_seven_days'],
                    'percentage_by_category' => $this->income_model->calculate_percentage_by_category(),
                ];
            }



            $this->load->view('income_dashboard', $data);
        } else {
            redirect('task/accessDenied');
        }
    }


    public function Allincomecategory()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {

            $data = [
                'all_category' => $this->income_model->all_income_category_name(),
                'all_income_data' => $this->income_model->all_income_data(),
                'total_income_by_category' => $this->income_model->total_income_by_category_with_stat(),
            ];
            $this->load->view('all_income_category', $data);
        } else {
            redirect('task/accessDenied');
        }
    }

    public function updateincomeCategoryType()
    {


        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {

            $categoryValue = $this->input->post('updateCategory');
            $categoryValueFix = $this->input->post('updateCategoryFix');

            // echo $categoryValue.''.$categoryValueFix;
            // exit;

            $this->income_model->updateincomeCategoryTypeName($categoryValueFix, $categoryValue);
            redirect('admin/Allincomecategory');
        } else {
            redirect('task/accessDenied');
        }
    }

    public function deleteincomeCategory()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {

            $categoryValue = $this->input->post('categoryValue');
            $this->income_model->deleteincomeCategory($categoryValue);
            redirect('admin/Allincomecategory');
        } else {
            redirect('task/accessDenied');
        }
    }
    public function restoreincomeCategory()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {

            $categoryValue = $this->input->post('categoryValue');
            $this->income_model->restoreincomeCategory($categoryValue);
            redirect('admin/Allincomecategory');
        } else {
            redirect('task/accessDenied');
        }
    }

}