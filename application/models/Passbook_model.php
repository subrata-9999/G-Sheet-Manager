<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Passbook_model extends CI_Model
{
    public function all_expenses_data()
    {
        $query = $this->db->get('budget');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function all_income_data()
    {
        $query = $this->db->get('income');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function all_expenses_and_income()
    {
        $all_income_data = $this->all_income_data();
        $all_expenses_data = $this->all_expenses_data();
        $merged_array = [];
        $merged_array_index = 0;
        foreach ($all_income_data as $data) {
            $merged_array[$merged_array_index] = [
                'ENI_name' => $data['inc_name'],
                'ENI_type' => "Income",
                'ENI_category' => $data['inc_type'],
                'ENI_amount' => $data['inc_amount'],
                'ENI_date' => $data['inc_date'],
                'ENI_remark' => $data['inc_remark'],
                'ENI_stat' => $data['inc_stat'],
            ];
            $merged_array_index++;
        }
        foreach ($all_expenses_data as $data) {
            $merged_array[$merged_array_index] = [
                'ENI_name' => $data['bud_name'],
                'ENI_type' => "Expenses",
                'ENI_category' => $data['bud_type'],
                'ENI_amount' => $data['bud_amount'],
                'ENI_date' => $data['bud_date'],
                'ENI_remark' => $data['bud_remark'],
                'ENI_stat' => $data['bud_stat'],
            ];
            $merged_array_index++;
        }

        // Extract 'new_date' column for sorting
        $merge_dates = array_column($merged_array, 'ENI_date');

        // Sort $new_array based on 'new_date'
        array_multisort($merge_dates, SORT_DESC, $merged_array);

        // usort($merged_array, function ($a, $b) {
        //     return strtotime($a['ENI_date']) - strtotime($b['ENI_date']);
        // });
        $counter = 1;
        foreach ($merged_array as &$data) {
            $data['ENI_id'] = $counter++;
        }

        return $merged_array;
    }


    

    public function all_expenses_data_in_range($fromDate, $toDate)
    {
        // Add a WHERE clause to filter results based on date range
        $this->db->where('bud_date >=', $fromDate);
        $this->db->where('bud_date <=', $toDate);
        $query = $this->db->get('budget');

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
        $query = $this->db->get('income');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function all_expenses_and_income_in_range($fromDate, $toDate)
    {
        $all_income_data = $this->all_income_data_in_range($fromDate, $toDate);
        $all_expenses_data = $this->all_expenses_data_in_range($fromDate, $toDate);
        $merged_array = [];
        $merged_array_index = 0;
        foreach ($all_income_data as $data) {
            $merged_array[$merged_array_index] = [
                'ENI_name' => $data['inc_name'],
                'ENI_type' => "Income",
                'ENI_category' => $data['inc_type'],
                'ENI_amount' => $data['inc_amount'],
                'ENI_date' => $data['inc_date'],
                'ENI_remark' => $data['inc_remark'],
                'ENI_stat' => $data['inc_stat'],
            ];
            $merged_array_index++;
        }
        foreach ($all_expenses_data as $data) {
            $merged_array[$merged_array_index] = [
                'ENI_name' => $data['bud_name'],
                'ENI_type' => "Expenses",
                'ENI_category' => $data['bud_type'],
                'ENI_amount' => $data['bud_amount'],
                'ENI_date' => $data['bud_date'],
                'ENI_remark' => $data['bud_remark'],
                'ENI_stat' => $data['bud_stat'],
            ];
            $merged_array_index++;
        }

        // Extract 'new_date' column for sorting
        $merge_dates = array_column($merged_array, 'ENI_date');

        // Sort $new_array based on 'new_date'
        array_multisort($merge_dates, SORT_DESC, $merged_array);

        // usort($merged_array, function ($a, $b) {
        //     return strtotime($a['ENI_date']) - strtotime($b['ENI_date']);
        // });
        $counter = 1;
        foreach ($merged_array as &$data) {
            $data['ENI_id'] = $counter++;
        }

        return $merged_array;
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

    public function maximum_income_and_expenses()
    {
        $this->total_income_by_category();
        $total_income_by_category = $this->totalincomeByCategory;
        $total_income = 0;
        $total_expenses = 0;
        $max_income_inc_type = null;
        $max_income = 0;
        foreach ($total_income_by_category as $inc_type => $total) {
            if ($total > $max_income) {
                $max_income = $total; //max income amount
                $max_income_inc_type = $inc_type; //max income category
            }
            $total_income = $total_income + $total;
        }

        $this->total_expenses_by_category();
        $total_expenses_by_category = $this->totalExpensesByCategory;
        $max_expenses_bud_type = null;
        $max_expenses = 0;
        foreach ($total_expenses_by_category as $bud_type => $total) {
            if ($total > $max_expenses) {
                $max_expenses = $total; //max expenses amount
                $max_expenses_bud_type = $bud_type; //max expenses category
            }
            $total_expenses = $total_expenses + $total;
        }


        return [
            'maximum_income_type' => $max_income_inc_type,
            'maximum_income_amount' => $max_income,
            'maximum_expenses_type' => $max_expenses_bud_type,
            'maximum_expenses_amount' => $max_expenses,
            'total_income' => $total_income,
            'total_expenses' => $total_expenses,
        ];
    }

    public function maximum_income_and_expenses_in_range($fromDate, $toDate)
    {
        $this->total_income_by_category_in_range($fromDate, $toDate);
        $total_income_by_category = $this->totalincomeByCategoryInRange;
        $total_income = 0;
        $total_expenses = 0;
        $max_income_inc_type = null;
        $max_income = 0;
        foreach ($total_income_by_category as $inc_type => $total) {
            if ($total > $max_income) {
                $max_income = $total; //max income amount
                $max_income_inc_type = $inc_type; //max income category
            }
            $total_income = $total_income + $total;
        }

        $this->total_expenses_by_category();
        $total_expenses_by_category = $this->totalExpensesByCategory;
        $max_expenses_bud_type = null;
        $max_expenses = 0;
        foreach ($total_expenses_by_category as $bud_type => $total) {
            if ($total > $max_expenses) {
                $max_expenses = $total; //max expenses amount
                $max_expenses_bud_type = $bud_type; //max expenses category
            }
            $total_expenses = $total_expenses + $total;
        }


        return [
            'maximum_income_type' => $max_income_inc_type,
            'maximum_income_amount' => $max_income,
            'maximum_expenses_type' => $max_expenses_bud_type,
            'maximum_expenses_amount' => $max_expenses,
            'total_income' => $total_income,
            'total_expenses' => $total_expenses,
        ];
    }

}
