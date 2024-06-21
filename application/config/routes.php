<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login/logout'] = 'login/logout';
$route['login'] = 'Login';
$route['employee/dashboard'] = 'employee/index';
$route['manager/dashboard'] = 'manager/index';
$route['admin/dashboard'] = 'admin/index';

$route['admin/Allsheet'] = 'admin/index';
$route['admin/Addtask'] = 'task/addTask';
$route['admin/Addmember'] = 'task/addMember';
$route['admin/Allemployee'] = 'task/allEmployee';
$route['admin/Allmanager'] = 'task/allManager';

$route['manager/Assignedsheetstoyou'] = 'manager/index';
$route['manager/Assignedsheettoemployee'] = 'task/Assignedsheettoemployee';
$route['manager/Addtask'] = 'task/addTask';

$route['task/(:num)'] = 'task/view/$1';
$route['task/edit/(:num)'] = 'task/editTask/$1';
$route['task/edit/(:num)'] = 'task/editTask/$1';
$route['manager/update/(:num)'] = 'task/updateTask/$1';

$route['user/editMember/(:num)'] = 'task/editMember/$1';
$route['user/deleteMember/(:num)'] = 'task/deleteMember/$1';


$route['admin/Addexpenses'] = 'expenses/Addexpenses';
$route['admin/Expensesdashboard'] = 'expenses/expenses_dashboard';
$route['admin/Allexpensescategory'] = 'expenses/Allexpensescategory';
// $route['admin/Expensesdashboard'] = 'expenses/expenses_details';
// $route['admin/Expensesdashboard'] = 'expenses/calculate_percentage_by_category';

$route['admin/Addincome'] = 'income/Addincome';
$route['admin/Incomedashboard'] = 'income/income_dashboard';
$route['admin/Allincomecategory'] = 'income/Allincomecategory';



$route['Passbook/index'] = 'passbook/passbook_dashboard';



$route['admin/Allbatch'] = 'batch/Allbatch';
$route['admin/Addbatch'] = 'batch/Addbatch';
$route['admin/Allcourse'] = 'course/Allcourse';
$route['admin/Addcourse'] = 'course/Addcourse';


$route['admin/Addstudent'] = 'student/Addstudent';
$route['manager/Addstudent'] = 'student/Addstudent';
$route['employee/Addstudent'] = 'student/Addstudent';


$route['admin/Addpayment'] = 'student/Addpayment';
$route['manager/Addpayment'] = 'student/Addpayment';
$route['employee/Addpayment'] = 'student/Addpayment';