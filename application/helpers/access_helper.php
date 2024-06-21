
<?php defined('BASEPATH') or exit('No direct script access allowed');

// if (!function_exists('check_access')) {
//     function check_access()
//     {
//         check_session();

//         $CI = &get_instance();
//         $currentMethod = $CI->router->fetch_method();
//         $allowedMethods = array();

//         $roleMethods = [
//             'manager' => ['viewTask', 'addTask', 'deleteTask', 'editTask'],
//             'employee' => ['viewTask'],
//         ];

//         $userRole = $CI->session->userdata('role');

//         if (isset($roleMethods[$userRole])) {
//             $allowedMethods = array_merge($allowedMethods, $roleMethods[$userRole]);
//         }

//         $allowedMethods[] = 'index';

//         if (in_array($currentMethod, $allowedMethods)) {
//             return true;
//         } else {
//             redirect('dizziboosteR/accessDenied');
//             exit;
//         }
//     }



if (!function_exists('check_access')) {
    function check_access()
    {
        check_session(); //is user logged in or not(is session start or not)
        $CI = &get_instance();
        $currentController = $CI->router->fetch_class();
        $currentMethod = $CI->router->fetch_method();
        // echo "<pre>";
        // print_r($CI->session->scope);
        // echo $currentMethod;
        // echo 'check';
        // exit;

        $scope = $CI->session->scope;
        // echo '<pre>';
        // print_r($scope);
        if (isset($scope[$currentController])) {
            $flag = false;
            // echo "initial flag false ||";//
            // exit;
            // echo '<pre>';
            // print_r($scope[$currentController]);


            foreach ($scope[$currentController] as $method => $value) {
                // print_r($method);
                // echo $currentMethod;
                // exit;
                if ($method == $currentMethod) {
                    $flag = true;
                    // echo "flag true____set ||";

                }
                // echo "function not matched ||";//
            }
            if ($flag) {
                // echo "true";
                // exit;
                return true;
            } else {
                // echo "access denied 403";
                // exit;
                return false;
            }
        } else if ($currentMethod == "index") {
            return true;
        } else {
            // echo "access denied";
            // exit;
            return false;
        }
    }






    function check_session()
    {
        $CI = &get_instance();

        // $user_id = $CI->session->user_id;
        // echo "<pre>";
        // print_r($_SESSION); exit;

        // echo $user_id;
        // exit;

        if (empty($CI->session->user_id)) {
            redirect('login');
            exit;
        }
        return true;
    }
}
