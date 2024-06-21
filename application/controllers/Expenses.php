<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Expenses extends CI_Controller
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
    public function Addexpenses()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            $this->load->library('session');
            $data['expenses_budget'] = $this->Expenses_model->show_exp_category();
            $this->load->view('add_budget', $data);
        } else {
            redirect('task/accessDenied');
        }
    }
    public function add_expenses()
    {
        $this->load->model('Expenses_model');
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            if (!empty($this->input->post('custom_category'))) {

                $data = array(
                    'bud_name' => $this->input->post('budgetName'),
                    'bud_type' => strtolower($this->input->post('custom_category')),
                    'bud_amount' => $this->input->post('budgetAmount'),
                    'bud_remark' => $this->input->post('budgetRemarks'),
                    'bud_date' => $this->input->post('budgetDate'),
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
                $this->Expenses_model->add_category($data_cat);
            } else {
                $data = array(
                    'bud_name' => $this->input->post('budgetName'),
                    'bud_type' => $this->input->post('budgetType'),
                    'bud_amount' => $this->input->post('budgetAmount'),
                    'bud_remark' => $this->input->post('budgetRemarks'),
                    'bud_date' => $this->input->post('budgetDate'),
                );
            }

            // Add task
            $this->Expenses_model->add_budget($data);

            // Redirect back to the employee dashboard
            redirect('admin/Expensesdashboard');
        } else {

            redirect('task/accessDenied');
        }
    }

    public function expenses_dashboard()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {
            $this->load->model('Expenses_model');
            $maximum_details = $this->Expenses_model->maximum_expenses();
            $month_details = $this->Expenses_model->expenses_of_month();

            // Retrieve POST data
            $startDate = $this->input->post('startDate');
            $endDate = $this->input->post('endDate');

            // Check if both startDate and endDate are present
            if (!empty($startDate) && !empty($endDate)) {
                // Print the values
                $maximum_details_in_range = $this->Expenses_model->maximum_expenses_in_range($startDate, $endDate);

                $data = [
                    'all_category' => $this->Expenses_model->all_expenses_category_name(),
                    'all_expenses_data' => $this->Expenses_model->all_expenses_data_in_range($startDate, $endDate),
                    'total_expenses_by_category' => $this->Expenses_model->total_expenses_by_category_in_range($startDate, $endDate),
                    'maximum_expenses_type' => $maximum_details_in_range['maximum_expenses_type'],
                    'maximum_expenses_amount' => $maximum_details_in_range['maximum_expenses_amount'],
                    'total_expenses_this_month' => $month_details['total_expenses_this_month'],
                    'total_expenses_last_month' => $month_details['total_expenses_last_month'],
                    'total_expenses_last_seven_days' => $month_details['total_expenses_last_seven_days'],
                    'percentage_by_category' => $this->Expenses_model->calculate_percentage_by_category_in_range($startDate, $endDate),
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                ];
            } else {
                $data = [
                    'all_category' => $this->Expenses_model->all_expenses_category_name(),
                    'all_expenses_data' => $this->Expenses_model->all_expenses_data(),
                    'total_expenses_by_category' => $this->Expenses_model->total_expenses_by_category(),
                    'maximum_expenses_type' => $maximum_details['maximum_expenses_type'],
                    'maximum_expenses_amount' => $maximum_details['maximum_expenses_amount'],
                    'total_expenses_this_month' => $month_details['total_expenses_this_month'],
                    'total_expenses_last_month' => $month_details['total_expenses_last_month'],
                    'total_expenses_last_seven_days' => $month_details['total_expenses_last_seven_days'],
                    'percentage_by_category' => $this->Expenses_model->calculate_percentage_by_category(),
                ];
            }



            $this->load->view('expenses_dashboard', $data);
        } else {
            redirect('task/accessDenied');
        }
    }


    public function Allexpensescategory()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {

            $data = [
                'all_category' => $this->Expenses_model->all_expenses_category_name(),
                'all_expenses_data' => $this->Expenses_model->all_expenses_data(),
                'total_expenses_by_category' => $this->Expenses_model->total_expenses_by_category_with_stat(),
            ];
            $this->load->view('all_category', $data);
        } else {
            redirect('task/accessDenied');
        }
    }

    public function updateCategoryType()
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

            $this->Expenses_model->updateCategoryTypeName($categoryValueFix, $categoryValue);
            redirect('admin/Allexpensescategory');
        } else {
            redirect('task/accessDenied');
        }
    }

    public function deleteCategory()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {

            $categoryValue = $this->input->post('categoryValue');
            $this->Expenses_model->deleteCategory($categoryValue);
            redirect('admin/Allexpensescategory');
        } else {
            redirect('task/accessDenied');
        }
    }
    public function restoreCategory()
    {
        check_access();

        $this->load->library('session');
        $this->load->helper('access_helper');

        // Assuming form submission and validation
        if (check_access()) {

            $categoryValue = $this->input->post('categoryValue');
            $this->Expenses_model->restoreCategory($categoryValue);
            redirect('admin/Allexpensescategory');
        } else {
            redirect('task/accessDenied');
        }
    }
}
