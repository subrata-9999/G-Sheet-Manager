<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Expenses_model extends CI_Model
{

    public function add_budget($data)
    {
        $this->db->insert('budget', $data);
    }
    public function show_exp_category()
    {
        $query = $this->db->get_where('option_for', array('option_name' => 'expenses'));

        // Check if the query was successful
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // Return an empty array or any other indication that the record was not found
            return array();
        }
    }
    public function add_category($data)
    {
        $this->db->where('option_name', 'expenses');
        $this->db->update('option_for', $data);
    }
    public function all_expenses_category_name()
    {
        $this->db->select('options_list');
        $this->db->where('option_name', 'expenses');
        $query = $this->db->get('option_for');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function all_expenses_data()
    {
        $this->db->where('bud_stat', 1); 
        $query = $this->db->get('budget');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function all_expenses_data_in_range($fromDate, $toDate)
    {
        // Add a WHERE clause to filter results based on date range
        $this->db->where('bud_date >=', $fromDate);
        $this->db->where('bud_date <=', $toDate);
        $this->db->where('bud_stat', 1); 
        $query = $this->db->get('budget');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    private $totalExpensesByCategory = array(); //initial array to store the amount by category
    public function total_expenses_by_category()
    {
        $all_expenses_data = $this->all_expenses_data();
        $total_expenses_by_category = array();

        foreach ($all_expenses_data as $expense) {
            $bud_type = $expense['bud_type'];
            if (!isset($total_expenses_by_category[$bud_type])) {
                $total_expenses_by_category[$bud_type] = 0;
            }
            $total_expenses_by_category[$bud_type] += $expense['bud_amount'];
        }

        asort($total_expenses_by_category);
        $this->totalExpensesByCategory = $total_expenses_by_category;

        return $this->totalExpensesByCategory;
    }

    private $totalExpensesByCategoryInRange = array();
    public function total_expenses_by_category_in_range($fromDate, $toDate)
    {
        $all_expenses_data = $this->all_expenses_data_in_range($fromDate, $toDate);
        $total_expenses_by_category = array();

        foreach ($all_expenses_data as $expense) {
            $bud_type = $expense['bud_type'];
            if (!isset($total_expenses_by_category[$bud_type])) {
                $total_expenses_by_category[$bud_type] = 0;
            }
            $total_expenses_by_category[$bud_type] += $expense['bud_amount'];
        }

        asort($total_expenses_by_category);
        $this->totalExpensesByCategoryInRange = $total_expenses_by_category;

        return $this->totalExpensesByCategoryInRange;
    }


    private $percentageByCategory = array();
    public function calculate_percentage_by_category()
    {
        $this->total_expenses_by_category();
        $total_expenses_by_category = $this->totalExpensesByCategory;
        $maxAmount = max($total_expenses_by_category);

        // Initialize an array to store percentages
        $percentage_By_Category = array();

        // Calculate the percentage for each category
        foreach ($total_expenses_by_category as $category => $totalAmount) {
            $percentage = round(($totalAmount / $maxAmount) * 100, 2);
            $percentage_By_Category[$category] = $percentage;
        }

        $this->percentageByCategory = $percentage_By_Category;

        return $this->percentageByCategory;
    }

    private $percentageByCategoryInRange = array();
    public function calculate_percentage_by_category_in_range($fromDate, $toDate)
    {
        $this->total_expenses_by_category_in_range($fromDate, $toDate);
        $total_expenses_by_category = $this->totalExpensesByCategoryInRange;
        if($total_expenses_by_category){
        $maxAmount = max($total_expenses_by_category);
        }else{
            $maxAmount = null;
        }

        // Initialize an array to store percentages
        $percentage_By_Category = array();

        // Calculate the percentage for each category
        foreach ($total_expenses_by_category as $category => $totalAmount) {
            $percentage = round(($totalAmount / $maxAmount) * 100, 2);
            $percentage_By_Category[$category] = $percentage;
        }

        $this->percentageByCategoryInRange = $percentage_By_Category;

        return $this->percentageByCategoryInRange;
    }


    public function maximum_expenses()
    {
        $this->total_expenses_by_category();
        $total_expenses_by_category = $this->totalExpensesByCategory;
        $max_expenses_bud_type = null;
        $max_expenses = 0;
        foreach ($total_expenses_by_category as $bud_type => $total) {
            if ($total > $max_expenses) {
                $max_expenses = $total; //max expenses amount
                $max_expenses_bud_type = $bud_type; //max expenses category
            }
        }
        return [
            'maximum_expenses_type' => $max_expenses_bud_type,
            'maximum_expenses_amount' => $max_expenses,
        ];
    }

    public function maximum_expenses_in_range($fromDate, $toDate)
    {
        $this->total_expenses_by_category_in_range($fromDate, $toDate);
        $total_expenses_by_category = $this->totalExpensesByCategoryInRange;
        $max_expenses_bud_type = null;
        $max_expenses = 0;
        foreach ($total_expenses_by_category as $bud_type => $total) {
            if ($total > $max_expenses) {
                $max_expenses = $total; //max expenses amount
                $max_expenses_bud_type = $bud_type; //max expenses category
            }
        }
        return [
            'maximum_expenses_type' => $max_expenses_bud_type,
            'maximum_expenses_amount' => $max_expenses,
        ];
    }
    public function expenses_of_month()
    {
        $all_expenses_data = $this->all_expenses_data();
        $currentMonth = date('Y-m');
        $lastMonth = date('Y-m', strtotime('-1 month'));
        $sevenDaysAgo = date('Y-m-d', strtotime('-7 days'));

        $totalExpensesThisMonth = 0;
        $totalLastMonthExpenses = 0;
        $totalLastSevenDaysExpenses = 0;

        foreach ($all_expenses_data as $expense) {
            $expenseDate = date('Y-m', strtotime($expense['bud_date']));
            $expenseDateDay = date('Y-m-d', strtotime($expense['bud_date']));

            if ($expenseDate == $currentMonth) {
                $totalExpensesThisMonth += $expense['bud_amount'];
            }
            if ($expenseDate === $lastMonth) {
                $totalLastMonthExpenses += $expense['bud_amount'];
            }
            if ($expenseDateDay >= $sevenDaysAgo) {
                $totalLastSevenDaysExpenses += $expense['bud_amount'];
                // echo $expense['bud_date'];
            }
        }

        return [
            'total_expenses_this_month' => $totalExpensesThisMonth,
            'total_expenses_last_month' => $totalLastMonthExpenses,
            'total_expenses_last_seven_days' => $totalLastSevenDaysExpenses,
        ];
    }
    // Expenses_model.php



    // Expenses_model.php


    public function all_expenses_data_with_stat()
    {
        $query = $this->db->get('budget');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function total_expenses_by_category_with_stat() {
        $all_expenses_data = $this->all_expenses_data_with_stat();
        $total_expenses_by_category = array();

        foreach ($all_expenses_data as $expense) {
            $bud_type = $expense['bud_type'];
            if (!isset($total_expenses_by_category[$bud_type])) {
                $total_expenses_by_category[$bud_type] = array(
                    'bud_amount' => 0,
                    'bud_stat' => 0,
                );
            }
            $total_expenses_by_category[$bud_type]['bud_amount'] += $expense['bud_amount'];
            $total_expenses_by_category[$bud_type]['bud_stat'] = $expense['bud_stat'];
        }

        asort($total_expenses_by_category);

        return $total_expenses_by_category;
    }





    public function updateCategoryTypeName($categoryValueFix, $categoryValue) {
        $this->db->where('bud_type', $categoryValueFix);
        $this->db->update('budget', array('bud_type' => $categoryValue));

        // Update 'option_for' table
        $this->db->where('option_name', 'expenses');
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
                $this->db->where('option_name', 'expenses');
                $this->db->update('option_for', array('options_list' => implode(',', $optionsList)));
            }
        }

        // Return the number of affected rows (optional)
        return $this->db->affected_rows();
    }

    public function deleteCategory($categoryValue) {

        $this->db->where('bud_type', $categoryValue);
        $this->db->update('budget', array('bud_stat' => 0));
        return $this->db->affected_rows();
    }
    public function restoreCategory($categoryValue) {

        $this->db->where('bud_type', $categoryValue);
        $this->db->update('budget', array('bud_stat' => 1));
        return $this->db->affected_rows();
    }

}
