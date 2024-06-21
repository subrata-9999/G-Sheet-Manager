<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('session');
        $this->load->helper('access_helper');
        $this->load->helper('time_helper');
        $this->load->model('Course_model');
        $this->load->model('Batch_model');
        $this->load->model('Student_model');
    }

    public function Addstudent()
    {
        $data = [
            'course' => $this->Course_model->allcourse(),
            'all_batch' => $this->Batch_model->all_batch(),
            'payment_method' => $this->Student_model->payment_method(),
        ];

        $this->load->view('add_student_p1', $data);
    }
    public function mbcheck()
    {

        // Get the mobile number from the POST request
        $mobileNumber = $this->input->post('mobileNumber');

        // Query the database to check if the mobile number exists
        $exists = $this->Student_model->checkMobileNumberExists($mobileNumber);

        // Return a JSON response
        $this->output->set_content_type('application/json')->set_output(json_encode(['exists' => $exists]));
    }

    public function mailcheck()
    {

        // Get the mobile number from the POST request
        $mail = $this->input->post('mail');

        // Query the database to check if the mobile number exists
        $exists = $this->Student_model->checkMailExists($mail);

        // Return a JSON response
        $this->output->set_content_type('application/json')->set_output(json_encode(['exists' => $exists]));
    }

    public function add_student()
    {

        $studentid = $this->input->post('studentid');


        $studentcourse = $this->input->post('student_course');
        $studentbatch = $this->input->post('student_batch');
        $studentname = $this->input->post('studentname');
        $studentmobile = $this->input->post('studentmobile');
        $studentemail = $this->input->post('studentemail');
        $studentfathersName = $this->input->post('studentfathersname');
        $studentfeesFinal = $this->input->post('studentfeesfinal');


        //|||||||||||||||||||||||||
        $studentdob = $this->input->post('studentdob'); /////////
        $dob = new DateTime($studentdob);
        $currentDate = new DateTime();
        $interval = $currentDate->diff($dob);
        $studentage = $interval->y; /////////
        $visitdate = date('Y-m-d'); ///////////
        $academic = $this->input->post('studentacademic'); ///////////
        $tokenPaid = $this->input->post('studenttokenpaid'); ///////////
        $referral = $this->input->post('studentreferral'); ///////////
        $studentAddedByData = array(
            'MEMBER_NAME' => $this->session->name,
            'MEMBER_ROLE' => $this->session->role,
            'MEMBER_ID' => $this->session->user_id,
        );
        $serializedData = json_encode($studentAddedByData);
        $studentinfo = array(
            'DOB' => $studentdob,
            'Age' => $studentage,
            'VISIT_DATE' => $visitdate,
            'ACADEMIC' => $academic,
            'TOKEN_PAID' => $tokenPaid,
            'REFERRAL' => $referral,
            'STUDENT_ADDED_BY' => $serializedData,

        );
        $studentaddedby = $serializedData;
        $studentotherinformation = json_encode($studentinfo);
        //||||||||||||||||||||||||||



        //\\\\\\\\\\\\\\\\\\\
        $dateOfPayment = $this->input->post('studentdateofpayment'); //-------//
        $todayPaid = $this->input->post('studenttokenpaid'); //-------//
        $payment_method = $this->input->post('payment_method');
        $currentdateandtime = date('Y-m-d H:i:s', time());
        $studentAddedByData = array(
            'MEMBER_NAME' => $this->session->name,
            'MEMBER_ROLE' => $this->session->role,
            'MEMBER_ID' => $this->session->user_id,
        );
        $serializedData = json_encode($studentAddedByData);
        $paymentistory = array(
            'TIME' => $currentdateandtime,
            'Amount' => $todayPaid,
            'Payment_Method' => $payment_method,
            'PAYMENT_ADDED_BY' => $serializedData,
        );
        $studentpaymenthistory = json_encode([$paymentistory]);
        //\\\\\\\\\\\\\\\\\\\

        $totalPaid = $this->input->post('studenttokenpaid');
        $totaldue = $studentfeesFinal - $totalPaid;


        $this->load->model('Income_model');
        if (!isset($studentid)) {
            $data = [
                'student_course' => $studentcourse,
                'student_batch' => $studentbatch,
                'student_name' => $studentname,
                'student_father' => $studentfathersName,
                'student_mobile' => $studentmobile,
                'student_email' => $studentemail,
                'student_other_info' => $studentotherinformation,
                'student_fees_final' => $studentfeesFinal,
                'student_payment_history' => $studentpaymenthistory,
                'total_paid' => $totalPaid,
                'total_due' => $totaldue,
                'student_added_by' => $studentaddedby,
            ];
            if($tokenPaid>0){
                $incomedata = [
                    'inc_name' => 'Token payment of '.$studentname,
                    'inc_type' => 'course_fee',
                    'inc_amount' => $totalPaid,
                    'inc_remark' => 'Student Name: '.$studentname.'####Course Name: '.$studentcourse.',####Batch Name: '.$studentbatch.'####PAYMENT ADDED BY'.$this->session->name,
                    'inc_date' => date('Y-m-d'),
                ];
                $this->Income_model->add_income($incomedata);
            }
            $this->Student_model->add_student($data);
            echo '<script>
            $(document).ready(function() {
                $(".toast").toast({ delay: 3000 });
                $(".toast-body").text("Student added successfully!");
                $(".toast").toast("show");
            });
          </script>';
        } else {
            if (!$this->Student_model->is_student_id_exists($studentid)) {
                $data = [
                    'student_id' => $studentid,
                    'student_course' => $studentcourse,
                    'student_batch' => $studentbatch,
                    'student_name' => $studentname,
                    'student_father' => $studentfathersName,
                    'student_mobile' => $studentmobile,
                    'student_email' => $studentemail,
                    'student_other_info' => $studentotherinformation,
                    'student_fees_final' => $studentfeesFinal,
                    'student_payment_history' => $studentpaymenthistory,
                    'total_paid' => $totalPaid,
                    'total_due' => $totaldue,
                    'student_added_by' => $studentaddedby,
                ];
                if($tokenPaid>0){
                    $incomedata = [
                        'inc_name' => 'Token payment of '.$studentname,
                        'inc_type' => 'course_fee',
                        'inc_amount' => $totalPaid,
                        'inc_remark' => 'Student Name: '.$studentname.'####Course Name: '.$studentcourse.',####Batch Name: '.$studentbatch.'####PAYMENT ADDED BY'.$this->session->name,
                        'inc_date' => date('Y-m-d'),
                    ];
                    $this->Income_model->add_income($incomedata);
                }
                $this->Student_model->add_student($data);
                redirect($this->session->role . '/Addstudent');
            } else {
                echo '<script>
                        window.history.back();
                      </script>';
            }
        }
    }


    public function Addpayment()
    {
        // Load necessary models and helpers if not autoloaded
        $data = [
            'payment_method' => $this->Student_model->payment_method(),
        ];

        // Load the view
        $this->load->view('addpayment', $data);
    }

    public function getStudentDetails()
    {
        // Load necessary models and helpers if not autoloaded

        // Get the search term
        $searchTerm = $this->input->post('searchTerm');

        // Call the model function to get student details
        $studentDetails = $this->Student_model->getStudentDetails($searchTerm);

        // Return the result as JSON
        echo json_encode($studentDetails);
    }

    public function add_payment_money()
    {
        $s_id = $this->input->post('foundedStudentsDropdown');
        $finalfees = $this->input->post('feesFinal');
        $total_previous_payment_amount = $this->input->post('feesPaid');


        $current_d_and_t = date('Y-m-d H:i:s', time());
        $current_payment_amount = $this->input->post('currentPayment');
        $payment_methode = $this->input->post('payment_method');
        $studentAddedByData = array(
            'MEMBER_NAME' => $this->session->name,
            'MEMBER_ROLE' => $this->session->role,
            'MEMBER_ID' => $this->session->user_id,
        );
        $payment_by = json_encode($studentAddedByData);


        $previous_data = $this->Student_model->getstudentbyid($s_id);


        $newPaymentHistory = array(
            'TIME' => $current_d_and_t,
            'AMOUNT' => $current_payment_amount,
            'PAYMENT METHODE' => $payment_methode,
            'PAYMENT_ADDED_BY' => $payment_by,
        );

        foreach ($previous_data as $student) {
            $paymentHistory = json_decode($student->student_payment_history, true);
            $newPaymentHistory = array_merge($paymentHistory, array($newPaymentHistory));
            $student->student_payment_history = json_encode($newPaymentHistory);
            $student->total_paid += $current_payment_amount;
            $student->total_due -= $current_payment_amount;
        }
        $data = [
            'student_payment_history' => $previous_data[0]->student_payment_history,
            'total_paid' => $previous_data[0]->total_paid,
            'total_due' => $previous_data[0]->total_due,
        ];

        $incomedata = [
            'inc_name' => 'Course fees payment of '.$previous_data[0]->student_name,
            'inc_type' => 'course_fee',
            'inc_amount' => $current_payment_amount,
            'inc_remark' => 'Student Name: '.$previous_data[0]->student_name.'####Course Name: '.$previous_data[0]->student_course.'####Batch Name: '.$previous_data[0]->student_batch,
            'inc_date' => date('Y-m-d'),
        ];
        $this->load->model('Income_model');
        $this->Income_model->add_income($incomedata);
        $this->Student_model->updatestudent($s_id, $data);

        $this->session->set_flashdata('success', 'Payment added successfully');

        redirect($this->session->role . '/Addpayment');
    }
}
