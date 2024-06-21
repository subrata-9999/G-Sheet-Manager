<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Income_model extends CI_Model
{

    public function add_income($data)
    {
        $this->db->insert('income', $data);
    }
    public function show_income_category()
    {
        $query = $this->db->get_where('option_for', array('option_name' => 'income'));
        // Check if the query was successful
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // Return an empty array or any other indication that the record was not found
            return array();
        }
    }
    public function add_income_category($data)
    {
        $this->db->where('option_name', 'income');
        $this->db->update('option_for', $data);
    }
    public function all_income_category_name()
    {
        $this->db->select('options_list');
        $this->db->where('option_name', 'income');
        $query = $this->db->get('option_for');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function all_income_data()
    {
        $this->db->where('inc_stat', 1); 
        $query = $this->db->get('income');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function all_income_data_in_range($fromDate, $toDate)
    {
        // Add a WHERE clause to filter results based on date range
        $this->db->where('inc_date >=', $fromDate);
        $this->db->where('inc_date <=', $toDate);
        $this->db->where('inc_stat', 1); 
        $query = $this->db->get('income');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    private $totalincomeByCategory = array(); //initial array to store the amount by category
    public function total_income_by_category()
    {
        $all_income_data = $this->all_income_data();
        $total_income_by_category = array();

        foreach ($all_income_data as $expense) {
            $inc_type = $expense['inc_type'];
            if (!isset($total_income_by_category[$inc_type])) {
                $total_income_by_category[$inc_type] = 0;
            }
            $total_income_by_category[$inc_type] += $expense['inc_amount'];
        }

        asort($total_income_by_category);
        $this->totalincomeByCategory = $total_income_by_category;

        return $this->totalincomeByCategory;
    }

    private $totalincomeByCategoryInRange = array();
    public function total_income_by_category_in_range($fromDate, $toDate)
    {
        $all_income_data = $this->all_income_data_in_range($fromDate, $toDate);
        $total_income_by_category = array();

        foreach ($all_income_data as $expense) {
            $inc_type = $expense['inc_type'];
            if (!isset($total_income_by_category[$inc_type])) {
                $total_income_by_category[$inc_type] = 0;
            }
            $total_income_by_category[$inc_type] += $expense['inc_amount'];
        }

        asort($total_income_by_category);
        $this->totalincomeByCategoryInRange = $total_income_by_category;

        return $this->totalincomeByCategoryInRange;
    }


    private $percentageByCategory = array();
    public function calculate_percentage_by_category()
    {
        $this->total_income_by_category();
        $total_income_by_category = $this->totalincomeByCategory;
        $maxAmount = max($total_income_by_category);

        // Initialize an array to store percentages
        $percentage_By_Category = array();

        // Calculate the percentage for each category
        foreach ($total_income_by_category as $category => $totalAmount) {
            $percentage = round(($totalAmount / $maxAmount) * 100, 2);
            $percentage_By_Category[$category] = $percentage;
        }

        $this->percentageByCategory = $percentage_By_Category;

        return $this->percentageByCategory;
    }

    private $percentageByCategoryInRange = array();
    public function calculate_percentage_by_category_in_range($fromDate, $toDate)
    {
        $this->total_income_by_category_in_range($fromDate, $toDate);
        $total_income_by_category = $this->totalincomeByCategoryInRange;
        if($total_income_by_category){
        $maxAmount = max($total_income_by_category);
        }else{
            $maxAmount = null;
        }

        // Initialize an array to store percentages
        $percentage_By_Category = array();

        // Calculate the percentage for each category
        foreach ($total_income_by_category as $category => $totalAmount) {
            $percentage = round(($totalAmount / $maxAmount) * 100, 2);
            $percentage_By_Category[$category] = $percentage;
        }

        $this->percentageByCategoryInRange = $percentage_By_Category;

        return $this->percentageByCategoryInRange;
    }


    public function maximum_income()
    {
        $this->total_income_by_category();
        $total_income_by_category = $this->totalincomeByCategory;
        $max_income_inc_type = null;
        $max_income = 0;
        foreach ($total_income_by_category as $inc_type => $total) {
            if ($total > $max_income) {
                $max_income = $total; //max income amount
                $max_income_inc_type = $inc_type; //max income category
            }
        }
        return [
            'maximum_income_type' => $max_income_inc_type,
            'maximum_income_amount' => $max_income,
        ];
    }

    public function maximum_income_in_range($fromDate, $toDate)
    {
        $this->total_income_by_category_in_range($fromDate, $toDate);
        $total_income_by_category = $this->totalincomeByCategoryInRange;
        $max_income_inc_type = null;
        $max_income = 0;
        foreach ($total_income_by_category as $inc_type => $total) {
            if ($total > $max_income) {
                $max_income = $total; //max income amount
                $max_income_inc_type = $inc_type; //max income category
            }
        }
        return [
            'maximum_income_type' => $max_income_inc_type,
            'maximum_income_amount' => $max_income,
        ];
    }
    public function income_of_month()
    {
        $all_income_data = $this->all_income_data();
        $currentMonth = date('Y-m');
        $lastMonth = date('Y-m', strtotime('-1 month'));
        $sevenDaysAgo = date('Y-m-d', strtotime('-7 days'));

        $totalincomeThisMonth = 0;
        $totalLastMonthincome = 0;
        $totalLastSevenDaysincome = 0;

        foreach ($all_income_data as $expense) {
            $expenseDate = date('Y-m', strtotime($expense['inc_date']));
            $expenseDateDay = date('Y-m-d', strtotime($expense['inc_date']));

            if ($expenseDate == $currentMonth) {
                $totalincomeThisMonth += $expense['inc_amount'];
            }
            if ($expenseDate === $lastMonth) {
                $totalLastMonthincome += $expense['inc_amount'];
            }
            if ($expenseDateDay >= $sevenDaysAgo) {
                $totalLastSevenDaysincome += $expense['inc_amount'];
                // echo $expense['inc_date'];
            }
        }

        return [
            'total_income_this_month' => $totalincomeThisMonth,
            'total_income_last_month' => $totalLastMonthincome,
            'total_income_last_seven_days' => $totalLastSevenDaysincome,
        ];
    }
    // income_model.php



    // income_model.php


    public function all_income_data_with_stat()
    {
        $query = $this->db->get('income');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function total_income_by_category_with_stat() {
        $all_income_data = $this->all_income_data_with_stat();
        $total_income_by_category = array();

        foreach ($all_income_data as $expense) {
            $inc_type = $expense['inc_type'];
            if (!isset($total_income_by_category[$inc_type])) {
                $total_income_by_category[$inc_type] = array(
                    'inc_amount' => 0,
                    'inc_stat' => 0,
                );
            }
            $total_income_by_category[$inc_type]['inc_amount'] += $expense['inc_amount'];
            $total_income_by_category[$inc_type]['inc_stat'] = $expense['inc_stat'];
        }

        asort($total_income_by_category);

        return $total_income_by_category;
    }





    public function updateincomeCategoryTypeName($categoryValueFix, $categoryValue) {
        $this->db->where('inc_type', $categoryValueFix);
        $this->db->update('income', array('inc_type' => $categoryValue));

        // Update 'option_for' table
        $this->db->where('option_name', 'income');
        $optionsRow = $this->db->get('option_for')->row();

        if ($optionsRow) {
            // If the row is found
            $optionsList = explode(',', $optionsRow->options_list);

            // Check if $categoryValueFix is present in the options list
            $key = array_search($categoryValueFix, $optionsList);
            if ($key !== false) {
                // Replace $categoryValueFix with $categoryValue
                $optionsList[$key] = $categoryValue;

                // Update the options_list column in 'option_for' table
                $this->db->where('option_name', 'income');
                $this->db->update('option_for', array('options_list' => implode(',', $optionsList)));
            }
        }

        // Return the number of affected rows (optional)
        return $this->db->affected_rows();
    }

    public function deleteincomeCategory($categoryValue) {

        $this->db->where('inc_type', $categoryValue);
        $this->db->update('income', array('inc_stat' => 0));
        return $this->db->affected_rows();
    }
    public function restoreincomeCategory($categoryValue) {

        $this->db->where('inc_type', $categoryValue);
        $this->db->update('income', array('inc_stat' => 1));
        return $this->db->affected_rows();
    }

}
