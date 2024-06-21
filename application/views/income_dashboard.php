<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->session->username; ?></title>


    <!-- for download -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
</head>




<style>
    ::-webkit-scrollbar {
        display: none;
    }

    * {
        box-sizing: border-box;
    }

    a {
        text-decoration: none;

    }

    .clickable-card {
        cursor: pointer;
    }
</style>


<body>




    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">




                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->name; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/library/stint/media/Frame.png') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <form action="<?= base_url('index.php/login/logout'); ?>" method="post">
                                    <center><button style="border: 0; margin: 0; padding: 0; background-color: white;" type="submit" value="">Logout</button></center>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <?php

                // echo '<pre>';
                // print_r($all_category);
                // print_r($all_income_data);
                // exit;
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a style="display: none;" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></a> -->
                        <h3 class="h6 mb-0 text-gray-800"><?php
                                                            if (isset($start_date) && isset($end_date)) {
                                                                $formatted_start_date = date('jS M Y', strtotime($start_date));
                                                                $formatted_end_date = date('jS M Y', strtotime($end_date));

                                                                echo $formatted_start_date . ' to ' . $formatted_end_date;
                                                            }
                                                            ?></h3>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Maximum Income<?php echo '<br>' . $maximum_income_type; ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i><?php echo '   ' . $maximum_income_amount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                This Month income</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i><?php echo '   ' . $total_income_this_month; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Last Month Income</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i><?php echo '   ' . $total_income_last_month; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Last 7 Days Income</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-rupee-sign"></i><?php echo '   ' . $total_income_last_seven_days; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!--End Content Row -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Of Income</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTablepp" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Income Name</th>
                                            <th>Income Category</th>
                                            <th>Income Date</th>
                                            <th>Income Amount</th>
                                            <th>Income Remark</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Income Name</th>
                                            <th>Income Category</th>
                                            <th>Income Date</th>
                                            <th>Income Amount</th>
                                            <th>Income Remark</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $all_enpenses_reverse = array_reverse($all_income_data);
                                        foreach ($all_enpenses_reverse as $income) : ?>
                                            <tr>
                                                <td><?php echo $income['inc_name']; ?></td>
                                                <td><?php echo $income['inc_type']; ?></td>
                                                <td><?php echo date('jS M Y', strtotime($income['inc_date'])); ?></td>
                                                <td><?php echo $income['inc_amount']; ?></td>
                                                <td><?php echo $income['inc_remark']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                                </div>
                                <div class="card-body">
                                    <?php foreach ($percentage_by_category as $category => $percentage) : ?>
                                        <h4 class="small font-weight-bold"><?= $category ?> <span class="float-right"><?= $percentage ?>%</span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $percentage ?>%" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Color System -->
                            <!-- <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-primary text-white shadow">
                                            <div class="card-body">
                                                Primary
                                                <div class="text-white-50 small">#4e73df</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-success text-white shadow">
                                            <div class="card-body">
                                                Success
                                                <div class="text-white-50 small">#1cc88a</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-info text-white shadow">
                                            <div class="card-body">
                                                Info
                                                <div class="text-white-50 small">#36b9cc</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-warning text-white shadow">
                                            <div class="card-body">
                                                Warning
                                                <div class="text-white-50 small">#f6c23e</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-danger text-white shadow">
                                            <div class="card-body">
                                                Danger
                                                <div class="text-white-50 small">#e74a3b</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-secondary text-white shadow">
                                            <div class="card-body">
                                                Secondary
                                                <div class="text-white-50 small">#858796</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-light text-black shadow">
                                            <div class="card-body">
                                                Light
                                                <div class="text-black-50 small">#f8f9fc</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-dark text-white shadow">
                                            <div class="card-body">
                                                Dark
                                                <div class="text-white-50 small">#5a5c69</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <!-- <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <a href="<?= base_url('index.php/admin/Incomedashboard') ?>" class="card-link">
                                            <div class="card bg-primary text-white shadow">
                                                <div class="card-body">
                                                    OverAll
                                                    <div class="text-white-50 small">income</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 mb-4 clickable-card" onclick="document.getElementById('filterFormThisMonth').submit();">
                                        <div class="card bg-success text-white shadow">
                                            <div class="card-body">
                                                This Month
                                                <div class="text-white-50 small">income</div>
                                                <form method="post" action="<?= base_url('index.php/admin/Incomedashboard') ?>" id="filterFormThisMonth" style="display: none;">
                                                    <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-01') ?>">
                                                    <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-t') ?>">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <a href="<?= base_url('index.php/admin/Incomedashboard') ?>" class="card-link">
                                        <div class="card bg-primary text-white shadow">
                                            <div class="card-body">
                                                OverAll
                                                <div class="text-white-50 small">income</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 mb-4 clickable-card" onclick="document.getElementById('filterFormThisMonth').submit();">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            This Month
                                            <div class="text-white-50 small">income</div>
                                            <form method="post" action="<?= base_url('index.php/admin/Incomedashboard') ?>" id="filterFormThisMonth" style="display: none;">
                                                <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-01') ?>">
                                                <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-t') ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 clickable-card" onclick="document.getElementById('filterFormLastMonth').submit();">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Last Month
                                            <div class="text-white-50 small">income</div>
                                            <form method="post" action="<?= base_url('index.php/admin/Incomedashboard') ?>" id="filterFormLastMonth" style="display: none;">
                                                <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-01', strtotime('first day of last month')) ?>">
                                                <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-t', strtotime('last day of last month')) ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 clickable-card" onclick="document.getElementById('filterFormLastThirtyDays').submit();">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Last 30 Days
                                            <div class="text-white-50 small">income</div>
                                            <form method="post" action="<?= base_url('index.php/admin/Incomedashboard') ?>" id="filterFormLastThirtyDays" style="display: none;">
                                                <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-d', strtotime('-30 days')) ?>">
                                                <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-d') ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 clickable-card" onclick="document.getElementById('filterFormLastSevenDays').submit();">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Last 7 Days
                                            <div class="text-black-50 small">income</div>
                                            <form method="post" action="<?= base_url('index.php/admin/Incomedashboard') ?>" id="filterFormLastSevenDays" style="display: none;">
                                                <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-d', strtotime('-7 days')) ?>">
                                                <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-d') ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 clickable-card" onclick="document.getElementById('filterFormThisWeek').submit();">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            This Week
                                            <div class="text-white-50 small">income</div>
                                            <form method="post" action="<?= base_url('index.php/admin/Incomedashboard') ?>" id="filterFormThisWeek" style="display: none;">
                                                <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-m-d', strtotime('monday this week')) ?>">
                                                <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-d') ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 clickable-card" onclick="document.getElementById('filterFormThisYear').submit();">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            This Year
                                            <div class="text-white-50 small">income</div>
                                            <form method="post" action="<?= base_url('index.php/admin/Incomedashboard') ?>" id="filterFormThisYear" style="display: none;">
                                                <input type="hidden" id="startDate" name="startDate" value="<?= date('Y-01-01'); ?>">
                                                <input type="hidden" id="endDate" name="endDate" value="<?= date('Y-m-d') ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            <form method="post" action="<?= base_url('index.php/admin/Incomedashboard') ?>" id="filterForm">
                                                <div class="form-group">
                                                    <label for="startDate" class="text-white">From:</label>
                                                    <input type="date" class="form-control" id="startDate" name="startDate">
                                                </div>
                                                <div class="form-group">
                                                    <label for="endDate" class="text-white">To:</label>
                                                    <input type="date" class="form-control" id="endDate" name="endDate">
                                                </div>
                                                <button type="submit" class="btn btn-primary" id="filterButton">Filter</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>











                </div>
                <!--end of page content-->











            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Sheet Management System</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->























    <script src="<?= base_url('assets/library/jquery/jquery.min.js" rel="stylesheet') ?>"></script>
    <script src="<?= base_url('assets/library/bootstrap/js/bootstrap.bundle.min.js" rel="stylesheet') ?>"></script>
    <script src="<?= base_url('assets/library/jquery-easing/jquery.easing.min.js" rel="stylesheet') ?>"></script>
    <script src="<?= base_url('assets/library/js/sb-admin-2.min.js" rel="stylesheet') ?>"></script>
    <script src="<?= base_url('assets/library/datatables/jquery.dataTables.min.js" rel="stylesheet') ?>"></script>
    <script src="<?= base_url('assets/library/datatables/dataTables.bootstrap4.min.js" rel="stylesheet') ?>"></script>
    <script src="<?= base_url('assets/library/js/demo/datatables-demo.js" rel="stylesheet') ?>"></script>



    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTablepp').DataTable({
                lengthMenu: [10, 25, 50],
                dom: 'Blfrtip',
                buttons: [
                    'excelHtml5',
                ]
            });
        });
    </script>



</body>

</html>